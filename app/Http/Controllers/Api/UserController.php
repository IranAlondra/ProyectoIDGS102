<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
          return response(['errors' => 'El nombre de usuario o la contraseña no coinciden'], 403);  
        }
        else{
       
       return response(['user'=> $user],200);
   } 
        }

    function register(Request $req){

       $user = new User;
       $user->name = $req->name;
       $user->email = $req->email;
       $user->password =Hash::make($req->password);
       if($user->save()){
       return response(['user'=>$user],200);  
       }else{
       return response(['errors' => 'Algo salió mal'], 403);
       }
    }
      function index()
    {
        $users= User::all();
       //return $users;
       return collect(["movies"=>$users]);
    }
    function store(Request $request){
       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->type = 0;
       if($user->save()){
       return response(['message' => 'Usuario creado'], 200);  
       }else{
       return response(['errors' => 'Algo salió mal'], 403);
       } 
    }
    function show($id)
    {
        $user = User::find($id);
        //return $user;
        return response(['user'=>$user]);
    }
    function update(Request $request,$id){
      $user = User::findOrFail($id);
    
    $user->name = $request->name;
    $user->email = $request->email;
    $user->type = 0;
    if($request->password != ''){
    $user->password = Hash::make($request->password);
    } 
    if($user->save()){
       return response(['message' => 'Usuario actualizado'], 200);  
       }else{
       return response(['errors' => 'Algo salió mal'], 403);
       }  
    }
     function destroy($id){
      $user = User::find($id);
      if($user->delete()){
       return response(['message' => 'Usuario eliminado'], 200);  
       }else{
       return response(['errors' => 'Algo salió mal'], 403);
       } 
    }
}
    
