<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMatterRequest;
use App\Models\Matter;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use App\Models\Degree;
use App\Models\Docent;
use App\Models\Period;
use Auth;
use DB;
use Alert;

class MatterController extends AppBaseController
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
$iner = Matter::join('especialidades','materias.especialidad_id','=','especialidades.id')->select('materias.id as id','especialidades.nombre as especialidad_id','materias.nombre','materias.clave','materias.unidades','materias.descripcion')->get();


		$degrees = Degree::lists('nombre','id');
      //$matters = Matter::all();

        return view('matter.index',array('user' => Auth::user()))
        //  ->with('matters', $matters)
            	->with('iner', $iner)->with('degrees',$degrees);

	}

	/**
	 * Show the form for creating a new Matter.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*Lis degrees*/
		$degrees = Degree::lists('name','id');
		$docents = Docent::all();
		$periods = Period::lists('period', 'id');
		$activos = Period::where('status', '=', 'Activo')->get();
		return view('matter.create',array('user' => Auth::user()))
		->with('degrees', $degrees)
		->with('docents', $docents)
		->with('periods', $periods)
		->with('activos', $activos);
	}

	/**
	 * Store a newly created Matter in storage.
	 *
	 * @param CreateMatterRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMatterRequest $request)
	{
        $input = $request->all();

		$matter = Matter::create($input);
		Alert::success('Materia guardada exitosamente')->persistent('Cerrar');
		return redirect(route('matters.index'));

	}

	/**
	 * Display the specified Matter.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$matter = Matter::find($id);

		if(empty($matter))
		{
			Alert::error('Materia no encontrada en nuestros registros')->persistent('Cerrar');
			return redirect(route('matter.index'));
		}

		return view('matter.show')->with('matter', $matter);
	}

	/**
	 * Show the form for editing the specified Matter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/*Lis degrees*/
		$degrees = Degree::lists('name','id');
		$docents = Docent::lists('name', 'id');
		$periods = Period::lists('period', 'id');
		$activos = Period::all();
		$matter = Matter::find($id);

		if(empty($matter))
		{
			Alert::error('Materia no encontrada en nuestros registros')->persistent('Cerrar');
			return redirect(route('matters.index'));
		}

		return view('matters.edit',array('user' => Auth::user()))
		->with('matter', $matter)
		->with('degrees', $degrees)
		->with('docents', $docents)
		->with('periods', $periods)
		->with('activos', $activos);
	}

	public function update(Request $request, $id)
	{
		/** @var Matter $matter */
		 $matter=Matter::findOrFail($request->matter_id);

        $matter->update($request->all());
        Alert::info('Materia actualizada exitosamente')->persistent('Cerrar');


        return back();
	}

	/**
	 * Remove the specified Matter from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy(Request $request,$id)
	{


$matter = Matter::findOrFail($request->matter_id);

		if(empty($matter))
		{
			Alert::error('Materia no encontrada en nuestros registros')->persistent('Cerrar');
			return redirect(route('matters.index'));
		}



		$do=DB::table('docente_grupos_materias')->where([['materia_id', '=', $matter->id]])->get();
		if ($do) {

			Alert::warning('la materia esta haciendo impartida con docentes no podemos eliminarlo de nuestros registros!')->persistent("Cerrar");
			return redirect(route('matters.index'));
		}

		else{
		$matter->delete();

		Alert::info('Materia eliminada de nuestros registros!')->persistent("Cerrar");

		return redirect(route('matters.index'));
	}
}





	public function search($id)
	{
		$matter = Matter::find($id);
		return view('docents.show-matters')
		->with('matter', $matter);
	}

	public function view()
	{
		return 'Hola Mundo';
	}
}
