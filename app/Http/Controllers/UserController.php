<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = \Validator::make($request->all(), [
        'nombre'      => 'required|max:255',
        'rut_dueno'   => 'required|max:12|unique:users',
        'direccion'   => 'required|min:2',
        'telefono'    => 'required|min:5',
        'email'       => 'required|email|max:255|unique:users',
        'password'    => 'required|min:6|confirmed',
        'color_dueno' => 'required|min:2'
      ]);

      if($validator->fails()) {
          return redirect('users/create')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $user = new User();
        $user->nombre      = $request['nombre'];
        $user->rut_dueno   = $request['rut_dueno'];
        $user->direccion   = $request['direccion'];
        $user->telefono    = $request['telefono'];
        $user->email       = $request['email'];
        $user->password    = bcrypt($request['password']);
        $user->color_dueno = $request['color_dueno'];
        $user->save();


        $users = User::get();
        return view('users.index')->with('users', $users);
      }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = User::find($id);
      return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = \Validator::make($request->all(), [
        'nombre'      => 'required|max:255',
        'rut_dueno'   => 'required|max:12|unique:users',
        'direccion'   => 'required|min:2',
        'telefono'    => 'required|min:5',
        'email'       => 'required|email|max:255|unique:users',
        'color_dueno' => 'required|min:2'
      ]);

      if($validator->fails()) {
          return redirect('users/edit')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $user              = User::find($id);
        $user->nombre      = $request['nombre'];
        $user->rut_dueno   = $request['rut_dueno'];
        $user->direccion   = $request['direccion'];
        $user->telefono    = $request['telefono'];
        $user->email       = $request['email'];
        $user->password    = bcrypt($request['password']);
        $user->color_dueno = $request['color_dueno'];
        $user->save();


        $users = User::get();
        return view('users.index')->with('users', $users);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user    = User::find($id);


      if(isset($user)) {
        try {
          $user->delete();
          return redirect('users/');
        } catch ( \Illuminate\Database\QueryException $e) {
          if ($e->errorInfo[0] == 23000) {
            return redirect()->back()->with('error', 'Usuario no puede ser eliminada por relaciones dependientes');
          } else {
            dd($e->errorInfo);
          }
        }
      }


    }
}
