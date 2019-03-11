<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePeriodRequest;
use App\Models\Period;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Auth;
use DB;
use Carbon\Carbon;
use Alert;

class PeriodController extends AppBaseController
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
		$periods = Period::all();
		return view('periods.index',array('user' => Auth::user()))
		->with('periods', $periods);
	}

	/**
	 * Show the form for creating a new Period.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*$activo = DB::select('select * from periods where status = ?', ['Activo']);
		if ($activo) {
			Flash::error('Ya existe un periodo Activo por favor desactivalo para continuar.');

			return redirect(route('periods.index'));
		}*/
		return view('periods.create',array('user' => Auth::user()));
	}

	/**
	 * Store a newly created Period in storage.
	 *
	 * @param CreatePeriodRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePeriodRequest $request)
	{
		$input = $request->all();
		$status = 'Inactivo';
		/*Obtener fechas para comparar*/
		$start = $request->input('inicio_periodo');
		$end   = $request->input('fin_periodo');
		$start_vacation = $request->input('inicio_vacacion');
		$end_vacation = $request->input('fin_vacacion');
		//$capture = $request->input('capture_rating');
		$input['estado'] = $status;
		$capture = new Carbon($end);
		$input['captura_calificacion'] = $capture->subDays(5);
		if (strtotime($start)< strtotime($end))
		{

			$period = Period::create($input);

			Alert::success('Periodo dado de alta exitosamente!')->persistent("Cerrar");

			return redirect(route('periods.index'));
		}
		else{
			Alert::error(' La fecha las demas fechas deben ser mayor ala fecha de inicio del periodo.')->persistent("Cerrar");
			return redirect(route('periods.index'));
		}
	}

	/**
	 * Display the specified Period.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$period = Period::find($id);

		if(empty($period))
		{
			Alert::error('Periodo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('periods.index'));
		}

		return view('periods.show',array('user' => Auth::user()))->with('period', $period);
	}

	/**
	 * Show the form for editing the specified Period.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$period = Period::find($id);

		if(empty($period))
		{
			Alert::error('Periodo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('periods.index'));
		}

		return view('periods.edit',array('user' => Auth::user()))->with('period', $period);
	}

	/**
	 * Update the specified Period in storage.
	 *
	 * @param  int    $id
	 * @param CreatePeriodRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatePeriodRequest $request)
	{
		/** @var Period $period */
		$period = Period::find($id);

		if(empty($period))
		{
			Alert::error('Periodo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('periods.index'));
		}

		$period->fill($request->all());
		$period->save();

		Alert::info('Periodo actualizado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('periods.index'));
	}

	/**
	 * Remove the specified Period from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Period $period */
		$period = Period::find($id);

		if(empty($period))
		{
			Alert::error('Periodo no encontrado en nuestros registros')->persistent('Cerrar');
			return redirect(route('periods.index'));
		}

		if ($period->estado === 'Activo') {
			Alert::warning('Periodo activo no podemos eliminarlo de nuestros registros!')->persistent("Cerrar");
			return redirect(route('periods.index'));
			# code...
		}
		 $materia=DB::table('docente_grupo_materias')->where([['periodo_id', '=', $period->id]])->get();
		if ($materia) {
			Alert::warning('periodo en uso no podemos eliminarlo de nuestros registros')->persistent('cerrar');
			return redirect(route('periods.index'));
		}
		/*
		 $estudiate=DB::table('student_inscription')->where([['period_id', '=', $period->id]])->get();
		if ($estudiate) {
			Alert::warning('periodo en uso  con estudiantes no podemos eliminarlo de nuestros registros')->persistent('cerrar');
			return redirect(route('periods.index'));
		}

		else{*/
		$period->delete();

		Alert::info('Periodo eliminado de nuestros registros!')->persistent("Cerrar");

		return redirect(route('periods.index'));

	}

	public function activate($id)
	{
		$activo = DB::select('select * from periodos where estado = ?', ['Activo']);
		if ($activo) {
			Alert::error('Ya existe un periodo Activo, no puedes tener dos activos.')->persistent('Cerrar');

			return redirect(route('periods.index'));
		}
		$activate = 'Activo';
		$period = Period::find($id);
		if ($period) {
			$period->estado = $activate;
			$period->save();
		}
		Alert::success('Periodo activado exitosamente.')->persistent("Cerrar");

		return redirect(route('periods.index'));
	}

	public function desactivate($id)
	{
		$desactivate = 'Inactivo';
		$period = Period::find($id);
		if ($period) {
			$period->estado = $desactivate;
			$period->save();
		}
		Alert::success('Periodo desactivado exitosamente.')->persistent("Cerrar");

		return redirect(route('periods.index'));
	}
}
