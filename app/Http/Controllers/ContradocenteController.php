<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Hash;
use Alert;
class ContradocenteController extends Controller
{
    //
    public function edit($id){
 $do = User::find($id);




		if(empty($do))
		{
			Flash::error('Docente no encontrado');
			return redirect(route('docents.index'));
		}

		return view('docents.contra',array('user' => Auth::user()))->with('do', $do);


    }
    public function update(Request $request,$id)
    {
    	 $password = $request['password'];
        $user = User::find($id);


      //  $user->correo = $request['correo'];
        $user->password = Hash::make($password);
        $user->save();

        Alert::info('Contraseña Actualizado correctamente.');

        return redirect(route('docents.index'));

    }
}
