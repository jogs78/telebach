<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    
	public $table = "";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"mother_last_name",
		"father_last_name",
		"email",
		"phone",
		"home",
		"password",
		"user_id",
	];

	protected $hidden ='user_id';


	public static $rules = [
	    "name" => "required",
		"mother_last_name" => "required",
		"father_last_name" => "required",
		"email" => "required|email",
		"phone" => "required|numeric",
	];

	public function user()
    {
         return $this->belongsTo('App\User');
    }

    public function scopeSearch($query, $name)
    {
    	return $query->where('name', 'LIKE', "%$name%");
    }

}
