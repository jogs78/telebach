<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDegreeRequest;
use App\Models\Degree;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\Models\Matter;
use Auth;
use Alert;
use App\Models\Group;
use App\Models\Period;
use App\Models\Student;
use DB;
use App\Calification;
use App\User;
class DegreeController extends AppBaseController
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
            $degree = Degree::all();
            return view('degrees.index',array('user' => Auth::user()))
            ->with('degree',$degree);
	}

	/**
	 * Show the form for creating a new Degree.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('degrees.create',array('user' => Auth::user()));
	}

	/**
	 * Store a newly created Degree in storage.
	 *
	 * @param CreateDegreeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDegreeRequest $request)
	{
		/*
$input = $request->all();
		$name = $request->input('name');
		$result = Degree::where('name', $request->input('name'))->count();
		if ($result == 0) {
			$group = Group::create($input);
			Alert::success('Grupo dado de alta exitosamente!')->persistent("Cerrar");
			return redirect(route('degrees.index'));
		}else{
			Alert::error('Este Semestre ya existe!')->persistent("Cerrar");
			return redirect()->back();
		}
		*/

	# code...



       Degree::create($request->all());
      Alert::success('Semestre dada de alta exitosamente!')->persistent("Cerrar");

        return redirect()->route('degree.index');


        }


	/**
	 * Display the specified Degree.
	 *
	 * @param  int $id
	 *
	 * @return Response


	 */


	public function show($id)
	{
		$degree = Degree::find($id);

		if(empty($degree))
		{
			Alert::error('Carrera no encontrada en nuestros registros')->persistent('Cerrar');
			return redirect(route('degree.index'));
		}

		return view('degrees.show',array('user' => Auth::user()))->with('degree', $degree);
	}

	/**
	 * Show the form for editing the specified Degree.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//public function edit($id)
/*	{

		$degree = Degree::find($id);

		if(empty($degree))
		{
			Alert::error('Carrera no encontrada en nuestros registros')->persistent('Cerrar');
			return redirect(route('degrees.index'));
		}

		return view('degrees.edit',array('user' => Auth::user()))->with('degree', $degree);
	}*/

	/**
	 * Update the specified Degree in storage.
	 *
	 * @param  int    $id
	 * @param CreateDegreeRequest $request
	 *
	 * @return Response
	 */
	public function update(Request $request, $id)
	{


		  $degree=Degree::findOrFail($request->degree_id);
        $degree->update($request->all());
                Alert::info('Carrera actualizada de nuestros registros!')->persistent("Cerrar");

        return back();
	}

	/**
	 * Remove the specified Degree from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
 $degree=Degree::findOrFail($request->degree_id);
		 if (empty($degree)) {
Alert::error('Semestre no encontrada en nuestros registros')->persistent('Cerrar');
		 }
		 $matters=DB::table('materias')->where([['especialidad_id', '=', $degree->id]])->get();
		 if ($matters) {
		 	Alert::warning('Semestre vinculada con materias no podemos eliminarlo de nuestros registros')->persistent('Cerrar');
		 	return redirect(route('degree.index'));
		 }
		 else{
 $degree->delete();
                Alert::info('Semestre eliminado de nuestros registros!')->persistent("Cerrar");

        return back();
	}

}



}