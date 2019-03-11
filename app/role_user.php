<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    protected $table="role_user";
    public $primaryKey="id";

    protected $fillable=['user_id','role_id'];


public function users()
{
	return $this->hasMany('App\User');


}

}
