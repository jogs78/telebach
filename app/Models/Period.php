<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    
	public $table = "periodos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "periodo",
	    "inicio_periodo",
	    "fin_periodo",
	    "inicio_vacacion",
	    "fin_vacacion",
	    "captura_calificacion",
	    "estado",
	];

	public static $rules = [
	    "periodo" => "required|unique:periodos,periodo",
	    "inicio_periodo" => 'required|date',
	    "fin_periodo" => 'required|date',
	    /*"start_vacation" => 'required|date',
	    "end_vacation" => 'required|date',*/
	];

	public function scopeSearch($query, $period)
    {
    	return $query->where('period', 'LIKE', "%$period%");
    }

    public function docentgroupclasses()
{
 return $this->belongsToMany('App\Models\DocentGroupClass')->withTimestamps();
}

}
