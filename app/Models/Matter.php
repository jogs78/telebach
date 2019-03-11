<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Matter extends Model
{

    public $table = "materias";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
        "nombre",
        "clave",
        "descripcion",
        "unidades",

        "especialidad_id",

    ];

    public static $rules = [
        "nombre" => "required",
        "clave" => "required",
        "descripcion" => "required",
        "unidades" => "required",
        //"semester" => "required",
        //"degree" => "required",
        //"docent_id" => "required"
    ];



    public function group()
    {
        return $this->belongsToMany('App\Models\Group');
    }
    public function Group_matter()
    {
        return $this->belongsTo('App\Group_Matter');
    }
/*
     public function Docentgroupclass()
    {
        return $this->belongsTo('App\DocentGroupClass');
    }
    */
    public function degree()
    {
        return $this->belongsTo('App\Models\Degree');
    }

    //establecemos las relacion de muchos a muchos con el modelo Docent, ya que una materia
    //la pueden tener varios docentes y un docente puede tener varias materias
    public function docent()
    {
        return $this->belongsTo('App\Models\Docent');
    }

    public static function matters($id)
    {
        return Matter::where('especialidad_id', '=', $id)
            ->get();
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }

    public function scopeSearch($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function Docentgroupclass()
    {
        return $this->belongsTo('App\DocentGroupClass');
    }
public static function iner(){

}
}
