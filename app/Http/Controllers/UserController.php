<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Hash;
use Alert;

class UserController extends Controller
{   
   public function __construct()
   {
    $this->middleware('auth');
}

public function profile()
{
   return view('profile', array('user' => Auth::user()));
}

public function update_avatar(Request $request)
{
   /*Handle the user upload avatar*/
   if ($request->hasFile('avatar')) {
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
      $user = Auth::user();
      $user->avatar = $filename;
      $user->save();
  }

  return view('profile', array('user' => Auth::user()));
}

/*Update Password*/
public function change(Request $request)
{   
    $user = Auth::user();
    $password = $request->input('newpassword');

    $user->password = Hash::make($password);
    $user->save();
    Alert::success('Contraseña actualizada exitosamenteee!')->persistent("Cerrar");
    return redirect()->back();
}

public function changee(Request $request)
{   
    $user = Auth::user();
    
    $email = $request->input('newemail');
    $user->email = ($email);
    $user->save();

    /*if ($user->hasRole(['admin'])) {
      
    }*/

    Alert::success('Correo actualizado corretamente!')->persistent("Cerrar");
    return redirect()->back();
    
}

public function changename(Request $request)
{   
    $user = Auth::user();

    $name = $request->input('newname');
    $user->name = ($name);

    $user->save();
    Alert::success('Nombre actualizado corretamente!')->persistent("Cerrar");
    return redirect()->back();
}

/*End Update Paswword*/
}
