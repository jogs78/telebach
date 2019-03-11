<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocentGroupClass extends Model
{
    public $table = "docente_grupos_materias";
    public $primaryKey = "id";
     public $timestamps = false;

    protected $fillable = [
        'periodo_id','especialidad_id',
         'materia_id', 'grupo_id', 'docente_id'
    ];

 public function group()
 {
     return $this->belongsTo('App\Models\Group');
 }



 public function matters()
    {
         return $this->belongsTo('App\Models\Matter','materia_id');
    }

    public function degree()
 {
     return $this->belongsTo('App\Models\Degree');
 }
 public function docent(){
    return $this->belongsTo('App\Models\Docent','usuario_id');
}

public function users(){
    return $this->belongsTo('App\User','id');
}




public function periods()
    {
        return $this->belongsToMany('App\Models\Period')->orderBy('period', 'DESC')->withTimestamps();
    }

    public function asignaciones($id)
    {
        return DocentGroupClass::where('grupo_id','=',$id)->get();
    }
    public static function usuarios3(){
        return DB::table('usuarios')->join('role_user','role_user.user_id','=','usuarios.id')->where('role_id','=',2)->select('usuarios.*')->get();
     }
}