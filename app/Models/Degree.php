<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{

	public $table = "especialidades";

	public $primaryKey = "id";

	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"description"

	];

	public static $rules = [
    'nombre' => "required|unique:especialidades",
        		"description" => "required"
	];

	public function matters()
    {
         return $this->belongsTo('App\Models\Matter');
    }



    public function group()
    {
    	return $this->belongsTo('App\Models\Group');
    }
  public function Group_matter()
    {
        return $this->belongsTo('App\Group_Matter');
    }



    public function Docentgroupclass()
    {
    	return $this->belongsTo('App\DocentGroupClass');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'LIKE', "%$name%");
    }

     public function students()
    {
        return $this->belongsToMany('App\Models\Student')->withTimestamps();
    }
}
