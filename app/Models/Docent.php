<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Docent extends Model
{
protected $table="docentes";


	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
//
	"nivel_estudio",
	//"password",
	"usuario_id",
	];

	public static $rules = [


	"nivel_estudio" => "required",

	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function getNombreCompleto()
	{
		return $this->name.' '.$this->father_last_name.' '.$this->mother_last_name;
	}

	public function getFullName()
	{
		return $this->name.' '.$this->father_last_name.' '.$this->mother_last_name;
	}

     //establecemos las relaciones con el modelo Matter, ya que un docente puede tener varias materias
    //y una materia la pueden tener varios docentes
	public function matters(){
		return $this->hasMany('App\Models\Matter', 'docent_id');
	}
/*
	public function docentgroupclass(){
		return $this->hasMany('App\DocentGroupClass', 'docente_id');

	}*/

	public function groups()
	{
		return $this->hasMany('App\Models\Group');
	}

	public function scopeSearch($query, $name)
	{
		return $query->where('name' , 'LIKE', "%$name%");
	}


}
