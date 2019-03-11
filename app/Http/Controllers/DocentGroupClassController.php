<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use Alert;
use App\Calification;
use App\DocentGroupClass;
use App\Models\Docent;
use App\Models\Group;
use App\Models\Matter;
use App\Models\Period;
use App\Models\Student;
use App\Models\Degree;
use App\User;

use Auth;
use DB;
use Illuminate\Http\Request;

class DocentGroupClassController extends Controller
{
    public function index(Request $request)
    {
       /*$group = Group::lists('name','id');


        $docents = Docent::lists('name','id');
        $degrees=Degree::lists('name','id');
        $matter = Matter::lists('name','id');*/
       // $usuarios=User::lists('nombre','id');

$usuarios=User::usuarios1();
 $activos = Period::where('estado', '=', 'Activo')->get();
         $asignaciones = DocentGroupClass::join('periodos', 'docente_grupos_materias.periodo_id', '=', 'periodos.id')

            ->join('materias', 'docente_grupos_materias.materia_id', '=', 'materias.id')

            ->join('nombre_grupo', 'docente_grupos_materias.grupo_id', '=', 'nombre_grupo.id')
            // ->join('usuarios', 'docente_grupos_materias.docente_id', '=', 'usuarios.id')

            ->select('docente_grupos_materias.id as id','periodos.periodo as np', 'materias.nombre as nombre_materia', 'nombre_grupo.nombre as nombre_grupo','nombre_grupo.turno as turno')->where('estado','=','Activo')
            ->get();

        return view('docent_group_class.index')->with('asignaciones',$asignaciones)->with('usuarios',$usuarios)
         /*    ->with('docents', $docents)
        ->with('group', $group)
        ->with('degrees',$degrees)


        ->with('matter', $matter);*/
        ->with('activos',$activos);
    }

    /**
     * Show the form for creating a new Matter.
     *
     * @return Response
     */
    public function create()
    {

    $docents=User::usuarios3();

        $degrees=Degree::all();
        $matters = Matter::all();
        $g = Group::lists('nombre','id');

        $activos = Period::where('estado', '=', 'Activo')->get();

        return view('docent_group_class.create', array('user' => Auth::user()))
            ->with('docents', $docents)
           ->with('degrees',$degrees)
            ->with('matters', $matters)
            ->with('g', $g)
            ->with('activos', $activos);
    }

    public function store(Request $request)
    {
      /*  try {
            $consulta = DB::table('docente_grupos_materias')->where([
               ['materia_id', '=', $request->materia_id],
             ['grupo_id', '=', $request->grupo_id],
                  ['periodo_id', '=', $request->periodo_id],
            ])->get();

            if ($consulta) {
                Alert::error('Ya existe esta materia en este grupo con el mismo periodo')->persistent('Cerrar')->persistent("Cerrar");
            return redirect()->back();
            } else {
                DB::beginTransaction();*/
                $asignacion = new DocentGroupClass();

                $asignacion->docente_id = $request->docente_id;
                $asignacion->save();

            //   DB::commit();

                Alert::success('Asignación correcta')->persistent('Cerrar');
                return redirect(route('asignaciones.index'));
            }
      /*  } catch (Exception $e) {
            DB::rollBack();
        }
    }*/

    public function delete($id)
    {
        $asignacion = DocentGroupClass::findOrFail($id);

        if (empty($asignacion)) {
            Alert::error('Asiganción no encontrada en nuestros registros')->persistent('Cerrar');
            return redirect(route('asignacion.index'));
        }

        $asignacion->delete();

        Alert::info('Asignación eliminada de nuestros registros!')->persistent("Cerrar");
        return redirect(route('asignacion.index'));
    }

    public function destroy($id)
    {
        /** @var Group $group */
       $asignacion = DocentGroupClass::find($id);

        if (empty($asignacion)) {
            Alert::error('Asiganción no registros')->persistent('Cerrar');
            return redirect(route('asignaciones.index'));
        }

        $asignacion->delete();
                Alert::info('Asignación eliminada de nuestros registros!')->persistent("Cerrar");
        return redirect(route('asignaciones.index'));
    }


    public function edit($id)
    {

        $asignaciones = DocentGroupClass::find($id);
  $docent=User::usuarios2();



        return view('docent_group_class.edit',array('user' => Auth::user()))

        ->with('asignaciones',$asignaciones)->with('docent', $docent);

    }



    public function update(Request $request, $id)
    {
        /** @var Docent $docent */
        $asignaciones = DocentGroupClass::find($id);


        if(empty($asignaciones))
        {
            Alert::error('Docente no encontrado en nuestros registros')->persistent('Cerrar');
            return redirect(route('asignaciones.index'));
        }

        $asignaciones->fill($request->all());
        $asignaciones->save();
/*
       $asignacion->period_id = $request->period_id;
               $asignacion->degree_id=$request->degree_id;
                $asignacion->matter_id = $request->matter_id;
                $asignacion->group_id = $request->group_id;
                $asignacion->docent_id = $request->docent_id;*/
        Alert::info('Docente actualizado de nuestros registros!')->persistent("Cerrar");

        return redirect(route('asignaciones.index'));



    }



  public function g(Request $request, $id)
    {
        if($request->ajax()){
            $materia = DocentGroupClass::asignaciones($id);
            return response()->json($materia);
        }

    }

}
