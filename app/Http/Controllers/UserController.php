<?php

namespace App\Http\Controllers;


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
            return "El nombre de usuario o la contraseña no coinciden";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }

    }
    function register(Request $req){

       // return $req->input();
       $user = new User;
       $user->name = $req->name;
       $user->email = $req->email;
       $user->password =Hash::make($req->password);
       $user->save();
       return redirect('/login');
    }
     function admin_users()
    {
        $users= User::all();
       return view('admin_users',['users'=>$users]);
    }
    function admin_add_user(){
       
    return view('admin_add_user'); 
    }
    function admin_store_user(Request $request){
       $user = new User;

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->type = $request->type;
    $user->save();

    return redirect('admin_users'); 
    }
    function admin_edit_user($id){
      $user= User::find($id);
      return view('admin_edit_user',['user'=>$user]);
    }
    function admin_update_user(Request $request,$id){
      $user = User::findOrFail($id);
    
    $user->name = $request->name;
    $user->email = $request->email;
    if($request->password != ''){
    $user->password = Hash::make($request->password);
    } 
    $user->save();
    
    return redirect('admin_users'); 
    }
     function admin_delete_user($id){
      $user=User::find($id);
      $user->delete();
    
    return redirect('admin_users'); 
    }
    function excel(){
      
      return Excel::download(new UsersExport, 'usuarios.xlsx');
    }
    function PDF(){
      return Excel::download(new UsersExport, 'usuarios.pdf');
    }
}
