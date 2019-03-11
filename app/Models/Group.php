<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

	public $table = "nombre_grupo";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "nombre",
        "turno"
	];

	public static $rules = [
	 //   "nombre" => "required|alpha_num"
	];

	public function matters()
    {
         return $this->belongsToMany('App\Models\Matter');
    }
    public function degree()
    {
         return $this->belongsTo('App\Models\Degree');
    }
    public function docent()
    {
         return $this->belongsTo('App\Models\Docent');
    }
    /*
public function inscription()
    {
         return $this->belongsTo('App\StudentInscription');
    }
*/
public function docentgroupclass()
    {
         return $this->belongsTo('App\DocentGroupClass');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'LIKE', "%$name%");
    }

    public function asignaciones()
    {
         return $this->belongsTo('App\DocentGroupClass');
    }



}
