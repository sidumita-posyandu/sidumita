<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
            ->get(env('BASE_API_URL').'user')
            ->json();
        
        $users = $this->paginate($response['data'])->withPath('/admin/users');;

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
            ->get(env('BASE_API_URL').'role')
            ->json();
        $role = $response['data'];

        $response2 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'provinsi')
            ->json();
        $provinsi = $response2['data'];

        $token = $request->session()->get('token');
                
        return view('users.create', compact('role', 'provinsi', 'token'));
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
        ->post(env('BASE_API_URL').'auth/register-admin', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
            'kecamatan_id' => $request->kecamatan_id,
            'dusun_id' => $request->dusun_id
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
    public function show($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'user/'.' '.$id)->json();
        $user = $response['data'];

        return view('users.show',compact('user'));
    }

    // public function indexKeluarga(Request $request){
    //     $response = Http::accept('application/json')
    //         ->withToken($request->session()->get('token'))
    //         ->get(env('BASE_API_URL').'user')
    //         ->json();
        
    //     $users = $this->paginate($response['data'])->withPath('/admin/users');;

    //     return view('users.index', compact('users'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'user/'.' '.$id)->json();
        $user = $response['data'];

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'role')->json();
        $role = $response['data'];

        $token = $request->session()->get('token');

        return view('users.edit',compact('user', 'role', 'token'));
    }
    
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

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}