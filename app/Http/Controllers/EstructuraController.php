<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Alert;
use App\Calification;
use App\DocentGroupClass;
use App\Models\Docent;
use App\Models\Group;
use App\Models\Matter;
use App\Models\Period;
use App\Models\Student;
use App\Models\Degree;
use App\StudentInscription;
use Auth;
use App\User;
use DB;


use App\Http\Requests;

class EstructuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

$docents=User::usuarios1();

  $activos = Period::where('estado', '=', 'Activo')->get();


         $asignaciones = DocentGroupClass::join('periodos', 'docente_grupos_materias.periodo_id', '=', 'periodos.id')

            ->join('materias', 'docente_grupos_materias.materia_id', '=', 'materias.id')

            ->join('nombre_grupo', 'docente_grupos_materias.grupo_id', '=', 'nombre_grupo.id')->where('estado','=','Activo')

            ->select('docente_grupos_materias.id as id','periodos.id as idd','periodos.periodo as periodo_id','periodos.estado', 'materias.nombre as matter_id', 'nombre_grupo.nombre as grupo_id','nombre_grupo.turno as turno','nombre_grupo.id as pe')

            ->get();

           // dd($asignaciones);

        return view('estructura.index')->with('asignaciones',$asignaciones) ->with('docents', $docents)->with('activos',$activos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $docents = Docent::all();
        $degrees=Degree::all();
        $matters = Matter::all();
        $groups = Group::all();
        $activos = Period::where('estado', '=', 'Activo')->get();
         return view('estructura.create', array('user' => Auth::user()))

           ->with('degrees',$degrees)
            ->with('matters', $matters)
            ->with('groups', $groups)

            ->with('activos', $activos);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $consulta = DB::table('docente_grupos_materias')->where([
          ['materia_id', '=', $request->materia_id],
                ['grupo_id', '=', $request->grupo_id],
                  ['periodo_id', '=', $request->periodo_id],

            ])->get();

            if ($consulta) {
                Alert::success('Ya existe esta materia en este grupo con el mismo periodo')->persistent('Cerrar');
            return redirect(route('estructura.create'));
            } else {
                DB::beginTransaction();
                $asignacion = new DocentGroupClass();
                $asignacion->periodo_id = $request->periodo_id;

               $asignacion->materia_id = $request->materia_id;
                $asignacion->grupo_id = $request->grupo_id;
                $asignacion->docente_id=$request->docente_id;
                $asignacion->save();

               DB::commit();

                Alert::success('Asignación correcta')->persistent('Cerrar');
                return redirect(route('estructura.index'));
            }
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function crea(Request  $request){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $asignaciones=DocentGroupClass::find($id);
       //dd($asignaciones);
         $degrees=Degree::all();
        $matters = Matter::lists('nombre','id');

       //$groups=Group::all();
        $group=Group::lists('turno','id');
$grupos=Group::select('id', DB::raw("CONCAT(nombre, ' ', turno) as full"))
      ->lists('full','id')
      ->toArray();
     $groups = DB::table('nombre_grupo')->select('nombre_grupo.nombre as no','nombre_grupo.turno as to','nombre_grupo.id')->get();
       foreach ($groups as $groups) {
           # code...*/


       $data=Group::join('docente_grupos_materias','docente_grupos_materias.grupo_id','=','nombre_grupo.id')->select('nombre_grupo.id','nombre_grupo.nombre as n','nombre_grupo.turno as t','docente_grupos_materias.grupo_id as asi')->where('docente_grupos_materias.grupo_id','=',$id)->first();
       /* $groups = DocentGroupClass::join('nombre_grupo', 'docente_grupos_materias.grupo_id', '=', 'nombre_grupo.id')

            ->select('docente_grupos_materias.grupo_id','nombre_grupo.id as id', 'nombre_grupo.nombre as grupo_id','nombre_grupo.turno as turno')

            ->get();*/

        $activos = Period::where('estado', '=', 'Activo')->get();
return view('estructura.edit',array('user' => Auth::user()))

        ->with('asignaciones',$asignaciones) ->with('degrees',$degrees)
            ->with('matters', $matters)

          ->with('groups', $groups)
->with('group', $group)
->with('grupos',$grupos)
            ->with('activos', $activos);


 }

}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $asignaciones = DocentGroupClass::find($id);

       /* if(empty($asignaciones))
        {
            Alert::error('Docente no encontrado en nuestros registros')->persistent('Cerrar');
            return redirect(route('asignaciones.index'));
        }*/



            $asignaciones->fill($request->all());

        try {
            $consulta = DB::table('docente_grupos_materias')->where([
          ['materia_id', '=', $request->materia_id],
                ['grupo_id', '=', $request->grupo_id],


            ])->get();

            if ($consulta) {
                Alert::error('Ya existe esta materia en este grupo ')->persistent('Cerrar');
           return redirect()->back();
            } else {
                DB::beginTransaction();

                $asignaciones->save();

               DB::commit();

                Alert::success('Asignación correcta')->persistent('Cerrar');
                return redirect(route('estructura.index'));
            }
        } catch (Exception $e) {
            DB::rollBack();
        }}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $asignacion = DocentGroupClass::findOrFail($id);
      //  dd($asignacion);

        if (empty($asignacion)) {
            Alert::error('Asiganción no encontrada en nuestros registros')->persistent('Cerrar');
            return redirect(route('estructura.index'));
        }
  $asignacion->delete();

        Alert::info('Asignación eliminada de nuestros registros!')->persistent("Cerrar");
        return redirect(route('estructura.index'));
    }

    public function destroy($id)
    {
        /** @var Group $group */
       $asignacion = DocentGroupClass::findOrFail($id);
       //dd($asignacion);

        if (empty($asignacion)) {
            Alert::error('Asiganción no registros')->persistent('Cerrar');
            return redirect(route('asignaciones.index'));
        }
        $asignacion->delete();

        Alert::info('Asignación eliminada de nuestros registros!')->persistent("Cerrar");
        return redirect(route('estructura.index'));
    }
    public function c(Request $request, $id)
    {
        if($request->ajax()){
            $matters = Matter::matters($id);
            return response()->json($matters);
        }

    }
}
