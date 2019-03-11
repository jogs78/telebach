<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\CreateDocentRequest;
use App\Models\Docent;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Hash;
use App\User;
use App\Role;
use App\Models\Group;
use App\Models\Matter;
use App\Models\Degree;
use App\Models\Report;
use App\DocentGroupClass;
use Auth;
use Mail;
use Alert;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Mail;

use DB;

class DocentController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		/*List*/

	$docents=User::usuarios1();
		return view('docents.index',array('user' => Auth::user()))
		//->with('usuarios',$usuarios)
		->with('docents', $docents);


	}

	/**
	 * Show the form for creating a new Docent.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('docents.create',array('user' => Auth::user()));
	}

	/**
	 * Store a newly created Docent in storage.
	 *
	 * @param CreateDocentRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDocentRequest $request)
	{

		$input = $request->all();

		$nombre = $request->input('nombre');
		$apellido_paterno = $request->input('apellido_paterno');
		$apellido_materno = $request->input('apellido_materno');
		$telefono=$request->input('telefono');
		$genero=$request->input('genero');
		$domicilio=$request->input('domicilio');
		$email = $request->input('email');
        // generar un password
		$password = $request->input('password');
		$datos['nombre'] = $nombre;
		$datos['apellido_paterno'] = $apellido_paterno;
		$datos['apellido_materno'] = $apellido_materno;
		$datos['telefono']=$telefono;
		$datos['genero']=$genero;
		$datos['domicilio']=$domicilio;
		$datos['email'] = $email;
		$datos['password'] = Hash::make($password);

			$result = User::where('email', $request->input('email'))->count();
		if ($result==0) {
			# code...

		$usuario = User::create($datos);
		$id = $usuario->id;
		$user = User::find($id);
		$docent = Role::find(2);
		$user->attachRole($docent);
		$input['usuario_id'] = $id;
		  $input['password'] = Hash::make($password);

		$docent = Docent::create($input);
/*
		Mail::send('mail.welcome', ['data' => $data], function($mail) use($data){
			$mail->subject('Te proporcionamos las credeciales de acceso al sistema');
			$mail->to($data['email'], $data['name'], $data['pass']);
		});
*/
		Alert::success('Docente dado de alta exitosamente!')->persistent("Cerrar");

		return redirect(route('docents.index'))->withInput();
	  } else{
	  	Alert::error('email duplicado ingrese otro por favor')->persistent("Cerrar");
		return Redirect(route('docents.create'))->withInput();
}}

	/**
	 * Display the specified Docent.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$docent = User::find($id);


		if(empty($docent))
		{
			Alert::error('Docente no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('docents.index'));
		}

		return view('docents.show')->with('docent', $docent);
	}

	/**
	 * Show the form for editing the specified Docent.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{
//$docent=User::usuarios1();
		$data =User::find($id);
	$docents= DB::table('usuarios')->join('docentes','docentes.usuario_id','=','usuarios.id')->select('usuarios.nombre','usuarios.id','usuarios.apellido_paterno','usuarios.apellido_materno','usuarios.email','usuarios.genero','usuarios.telefono','docentes.usuario_id','docentes.nivel_estudio')->where('docentes.usuario_id','=',$id)->first();

		if(empty($docents))
		{
			Alert::error('Docente no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('docents.index'));
		}

		return view('docents.edit',array('user' => Auth::user()))->with('docents', $docents);
	}

	/**
	 * Update the specified Docent in storage.
	 *
	 * @param  int    $id
	 * @param CreateDocentRequest $request
	 *
	 * @return Response
	 */
	public function update(CreateDocentRequest $request, $id)
	{
	$data =User::find($id);
	//dd($data);
	if(empty($data))
		{
			Alert::error('Docente no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('docents.index'));
		}


$data->fill($request->all());
//

		$password = $request['password'];
$data->password = Hash::make($password);
$data->save();
//dd($data);
$docent=Docent::where('usuario_id','=',$id)->first();

$docent->nivel_estudio = $request['nivel_estudio'];
$docent->save();


		Alert::info('Docente actualizado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('docents.index'));
	}

	/**
	 * Remove the specified Docent from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Docent $docent */
		$docent = User::Usuarios2();
		$docent=User::find($id);

		/*Delete User*/


		if(empty($docent))
		{
			Alert::error('Grupo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('docents.index'));
		}


		$docent_class=DB::table('docente_grupos_materias')->where([['docente_id', '=', $docent->id]])->get();
		if ($docent_class) {

			Alert::warning('El docente tiene asignado clases no podemos eliminarlo de nuestros registros!')->persistent("Cerrar");
			return redirect(route('docents.index'));
		}else{

		$docent->delete();

		Alert::info('Docente eliminado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('docents.index'));
	}}



	public function contra($id){
	$data =User::find($id);
	$docents= DB::table('usuarios')->join('docentes','docentes.usuario_id','=','usuarios.id')->select('usuarios.nombre','usuarios.id','usuarios.apellido_paterno','usuarios.apellido_materno','usuarios.email','usuarios.genero','usuarios.telefono','docentes.usuario_id','docentes.nivel_estudio')->where('docentes.usuario_id','=',$id)->first();

		if(empty($docents))
		{
			Alert::error('Docente no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('docents.index'));
		}

		return view('docents.contra',array('user' => Auth::user()))->with('docents', $docents);
	}
	}