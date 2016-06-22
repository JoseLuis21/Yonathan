<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\CriasTotal;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $users = User::where('estado', '=', 'Activo')->where('rut_dueno', 'LIKE', '%'.$request->get('search_rut').'%')->get();
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
        'rut_dueno'   => 'required|cl_rut|max:12|unique:users',
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
        $user->estado      = "Activo";
        $user->save();

        $crias = new CriasTotal();
        $crias->user_id      = $user->id;
        $crias->cantidad     = 0;
        $crias->save();


        return redirect('users/');
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


    public function pdf($id)
    {
      if($id != "0")
      {
        $users = User::where('estado', '=', 'Activo')->where('rut_dueno', 'LIKE', '%'.$id.'%')->get();
      }else {
        $users = User::where('estado', '=', 'Activo')->get();
      }

      $data = ['users' => $users];
      $pdf = \PDF::loadView('users.pdf', $data);
      return $pdf->stream('users.pdf');


      // return view('users.index')->with('users', $users);
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
        'rut_dueno'   => 'required|cl_rut|max:12|unique:users,id,'.$id,
        'direccion'   => 'required|min:2',
        'telefono'    => 'required|min:5',
        'email'       => 'required|email|max:255|unique:users,id,'.$id,
        'color_dueno' => 'required|min:2'
      ]);

      if($validator->fails()) {
          return redirect('users/'.$id.'/edit')
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


        return redirect('users/');
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
          $user->estado = "Inactivo";
          $user->save();
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
