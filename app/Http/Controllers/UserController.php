<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/user')
            ->json();
        
        $users = $response['data'];

        return view('users.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/role')
            ->json();
        
        $role = $response['data'];
                
        return view('users.create', compact('role'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post('http://127.0.0.1:8080/api/auth/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);
                
        // users::create($request->all());
    
        return redirect()->route('users.index')
                        ->with('success','Data user berhasil dibuat.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/user/'.' '.$id)->json();
        $user = $response['data'];

        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     return view('users.edit');
    // }
    
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,'.$id,
    //         'password' => 'same:confirm-password',
    //         'roles' => 'required'
    //     ]);
    
    //     $input = $request->all();
    //     if(!empty($input['password'])){ 
    //         $input['password'] = Hash::make($input['password']);
    //     }else{
    //         $input = Arr::except($input,array('password'));    
    //     }
    
    //     $user = User::find($id);
    //     $user->update($input);
    //     DB::table('model_has_roles')->where('model_id',$id)->delete();
    
    //     $user->assignRole($request->input('roles'));
    
    //     return redirect()->route('users.index')
    //                     ->with('success','User updated successfully');
    // }
    
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     User::find($id)->delete();
    //     return redirect()->route('users.index')
    //                     ->with('success','User deleted successfully');
    // }
}