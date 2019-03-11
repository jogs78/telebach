<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\Models\Matter;
use App\Models\Degree;
use App\Models\Docent;
use App\Models\Period;
use App\GroupMatter;
use Auth;
use DB;
use Alert;

class GroupController extends AppBaseController
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

		 $groups = Group::all();

		return view('groups.index',array('user' => Auth::user()))

		->with('groups', $groups);
	}

	public function listall()
    {
        $groups = Group::all();

		return view('groups.listall',array('user' => Auth::user()))

		->with('groups', $groups);
    }



	/**
	 * Show the form for creating a new Group.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*List*/
		$matters = Matter::lists('nombre', 'id');
		$degrees = Degree::lists('nombre','id');

		$activos = Period::all();
		return view('groups.create',array('user' => Auth::user()))
		->with('matters', $matters)
		->with('degrees', $degrees)

		->with('activos', $activos);
	}

	/**
	 * Store a newly created Group in storage.
	 *
	 * @param CreateGroupRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateGroupRequest $request)
	{
		$input = $request->all();
		$name = $request->input('nombre');
		$result = Group::where('nombre', $request->input('nombre'))->where('turno', $request->input('turno'))->count();
		if ($result == 0) {
			$group = Group::create($input);
			Alert::success('Grupo dado de alta exitosamente!')->persistent("Cerrar");
			return redirect(route('groups.index'));
		}else{
			Alert::error('Este grupo ya existe!')->persistent("Cerrar");
			return redirect()->back();
		}
	}

	/**
	 * Display the specified Group.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$group = Group::find($id);

		if(empty($group))
		{
			Alert::error('Grupo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('groups.index'));
		}

		return view('groups.show',array('user' => Auth::user()))->with('group', $group);
	}

	/**
	 * Show the form for editing the specified Group.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/*Lis degrees*/
	//	$matters = Matter::lists('name', 'id');
	//	$degrees = Degree::lists('name','id');
	//	$docents = Docent::lists('name', 'id');
	//	$activos = Period::all();
		$group = Group::find($id);
		$grupos=Group::lists('nombre','id');

		if(empty($group))
		{
			Alert::error('Grupo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('groups.index'));
		}

		return view('groups.edit',array('user' => Auth::user()))->with('grupos', $grupos)
		->with('group', $group);
		//->with('matters', $matters)
		//->with('degrees', $degrees)

		//->with('activos', $activos);
	}

	/**
	 * Update the specified Group in storage.
	 *
	 * @param  int    $id
	 * @param CreateGroupRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateGroupRequest $request)
	{
		/** @var Group $group */
		$group = Group::find($id);

		if(empty($group))
		{
			Alert::error('Grupo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('groups.index'));
		}

		$group->fill($request->all());
		$name=$request->input('');
		$result=Group::where('nombre',$request->input('nombre'))->where('turno',$request->input('turno'))->count();
		if ($result==0) {
			# code...
			$group->save();
			Alert::info('Grupo actualizado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('groups.index'));
		}
		else{
			Alert::error('este grupo ya existe con el mismo turno!')->persistent("cerrar");


		return redirect()->back();
		}


	}

	/**
	 * Remove the specified Group from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Group $group */
		$group = Group::find($id);

		if(empty($group))
		{
			Alert::error('Grupo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('groups.index'));
		}


		$docent_class=DB::table('docente_grupos_materias')->where([['grupo_id', '=', $group->id]])->get();
		if ($docent_class) {

			Alert::warning('El Grupo esta en uso no podemos eliminarlo de nuestros registros!')->persistent("Cerrar");
			return redirect(route('groups.index'));
		}
		/*
		$Estudiante=DB::table('student_inscription')->where([['group_id', '=', $group->id]])->get();
		if ($Estudiante) {

			Alert::warning('El Grupo esta en uso con Estudiantes no podemos eliminarlo de nuestros registros!')->persistent("Cerrar");
			return redirect(route('groups.index'));*/

	//	else{

		$group->delete();

		Alert::info('Grupo eliminado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('groups.index'));



}}
