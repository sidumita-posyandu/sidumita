<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Http;


class RoleController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/role')->json();
        $roles = $response['data'];

        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create(Request $request)
    {
        return view('roles.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->post('http://127.0.0.1:8080/api/role', [
                'role' => $request->role,
            ]);
    
        return redirect()->route('roles.index')
                        ->with('success','Role berhasil dibuat');
    }
    
    public function edit($id)
    {
        return view('roles.edit');
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch('http://127.0.0.1:8080/api/role/'.' '.$id, [
            'role' => $request->role,
        ]);
    
        return redirect()->route('roles.index')
                        ->with('success','Role berhasil diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete('http://127.0.0.1:8080/api/role/'.' '.$id, [
            'role' => $request->role,
        ]);

        return redirect()->route('roles.index')
                        ->with('success','Role berhasil dihapus');
    }
}