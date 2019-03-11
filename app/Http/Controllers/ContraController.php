<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Hash;
use Alert;
class ContraController extends Controller
{
    //
    public function edit($id){
    $director = User::find($id);
    $contra=User::where('id','=',$id)->select('password')->get();


		if(empty($director))
		{
			Flash::error('Director no encontrado');
			return redirect(route('directors.index'));
		}

		return view('directors.contra',array('user' => Auth::user()))->with('director', $director)->with('contra',$contra);


    }
    public function update(Request $request,$id)
    {
    	 $password = $request['password'];
        $user = User::find($id);


      //  $user->correo = $request['correo'];
        $user->password = Hash::make($password);
        $user->save();

        Alert::info('Contraseña Actualizado correctamente.');

        return redirect(route('directors.index'));

    }
}
