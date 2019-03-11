<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use DB;
class User extends Authenticatable
{
    use EntrustUserTrait; //hacemos uso del trait en la clase User para hacer uso de sus métodos
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="usuarios";

     public $primaryKey = "id";


    protected $fillable = [
        'nombre', 'apellido_paterno','apellido_materno','genero','telefono','domicilio','email', 'avatar', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        "nombre" => "required",
        "apellido_paterno" => "required",
        "apellido_materno" => "required",
        "email" => "required|email",
        "telefono" => "required|numeric",
    ];


    public function director()
    {
         return $this->hasOne('App\Models\Director');
    }

    public function docent()
    {
         return $this->hasOne('App\Models\Docent');
    }


     //establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
    //y un rol lo pueden tener varios usuarios
    public function roles(){
        return $this->belongsToMany('App\Role');


    }

     public function role_users()
     { return $this->hasMany('App\role_user');

     }
public function docentgroupclass(){
        return $this->hasMany('App\DocentGroupClass', 'docente_id');
}
     public static function usuarios(){
        return DB::table('usuarios')->join('role_user','role_user.user_id','=','usuarios.id')->where('role_id','=',1)->select('usuarios.*')->get();
     }


    public static function usuarios1(){
     /* return  DB::table('docentes')->join('usuarios','usuarios.id','=','docentes.usuario_id')->select('usuarios.id','usuarios.nombre','usuarios.apellido_paterno','usuarios.apellido_materno','usuarios.correo','usuarios.genero','usuarios.telefono','docentes.usuario_id','docentes.nivel_estudio')->get();*/

    return DB::table('usuarios')->join('docentes','docentes.usuario_id','=','usuarios.id')->select('usuarios.nombre','usuarios.id','usuarios.apellido_paterno','usuarios.apellido_materno','usuarios.email','usuarios.genero','usuarios.telefono','docentes.usuario_id','docentes.nivel_estudio')->get();


        }

  public static function usuarios2(){
        return DB::table('usuarios')->join('docentes','docentes.usuario_id','=','usuarios.id')->select('usuarios.*')->get();
     }



}
