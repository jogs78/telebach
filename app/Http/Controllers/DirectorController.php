<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateDirectorRequest;
use App\Models\Director;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;
use Hash;
use App\User;
use App\Role;
use App\role_user;

use Auth;
use DB;
use Alert;

class DirectorController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */

	 public function __construct()
    {
      // $this->middleware('auth');
    }

	public function index(Request  $request)
	{




	$directors=User::usuarios();
	//return $directors;

		return view('directors.index',array('user' => Auth::user()))
		->with('directors',$directors);
	}

	/**
	 * Show the form for creating a new Director.
	 *
	 * @return Response
	 */
	public function create()
	{

			return view('directors.create',array('user' => Auth::user()));

	}

	/**
	 * Store a newly created Director in storage.
	 *
	 * @param CreateDirectorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateDirectorRequest $request)
	{


	}

	/**
	 * Display the specified Director.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$director = Director::find($id);

		if(empty($director))
		{
			Flash::error('Director not found');
			return redirect(route('directors.index'));
		}

		return view('directors.show',array('user' => Auth::user()))->with('director', $director);
	}

	/**
	 * Show the form for editing the specified Director.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$director = User::find($id);

		if(empty($director))
		{
			Flash::error('Director not found');
			return redirect(route('directors.index'));
		}

		return view('directors.edit',array('user' => Auth::user()))->with('director', $director);
	}

	/**
	 * Update the specified Director in storage.
	 *
	 * @param  int    $id
	 * @param CreateDirectorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateDirectorRequest $request)
	{
        $password = $request['password'];
        $user = User::find($id);
        $user->nombre = $request['nombre'];
        $user->apellido_paterno=$request['apellido_paterno'];
        $user->apellido_materno=$request['apellido_materno'];
        $user->telefono=$request['telefono'];
       // $user->domicilio=$request['domicilio'];
        $user->email = $request['email'];
        $user->password = Hash::make($password);
        $user->save();

        Alert::info('Director Actualizado correctamente.');

        return redirect(route('directors.index'));
	}

	/**
	 * Remove the specified Director from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var Director $director */

	}


public function contra($id){
	return view('directors.contra');

}





}
