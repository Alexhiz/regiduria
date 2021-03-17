<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRegister\StoreRequest;
use App\Http\Requests\LoginRegister\UpdateRequest;


class LoginController extends Controller
{
    public function registrar(){
      return view('admin.auth.registrar');
    }

    public function editarperfil($id){
      $user = User::find($id);
      return view('admin.auth.editarperfil',compact('user'));
    }

    public function register(StoreRequest $request){
      $message = "Error al crear datos";
      $type="danger";
      if( $user = User::create([
            'name' => $request->name,
            'ap_paternp'=>$request->ap_paterno,
            'ap_materno'=>$request->ap_materno,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
             
        ])){
          $message = "creado correctamente";
            $type="success";
        }
      
        $user->assignRole('superadmin');
        
      return redirect()->route('admin.users')->with(['type'=>$type,'message'=>$message]);
    }

    public function updateperfil(UpdateRequest $request, $id){
      $message = "Error al editar datos";
      $type="danger";
      if($request->password == "" && $request->password_confirmation == ""){
        User::where('id',$id)->update([
            'name' => $request->name,
            'ap_paterno'=>$request->ap_paterno,
            'ap_materno'=>$request->ap_materno,
            'email' => $request->email,
            'email_verified_at' => now(),
            ]);
            $message = "Editado correctamente";
          $type="success";
      }else{
        User::where('id',$id)->update([
            'name' => $request->name,
            'ap_paterno'=>$request->ap_paterno,
            'ap_materno'=>$request->ap_materno,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password)]);
            $message = "Editado correctamente";
          $type="success";
      }
      return redirect()->route('admin.editarperfil',$id)->with(['type'=>$type,'message'=>$message]);
    }

    public function users(){
      $users = User::latest()->get();
      return view('admin.auth.index',compact('users'));
    }
}
