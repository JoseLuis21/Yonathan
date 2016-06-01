<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Oveja;
use App\EstadoOveja;
use App\User;

class OvejasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $ovejas = Oveja::where('numero_arete', 'LIKE', '%'.$request->get('search_arete').'%')->get();
      $estadoOvejas = EstadoOveja::lists('estado', 'id');
      $users = User::lists('nombre', 'id');
      return view('ovejas.index')
              ->with('users', $users)
              ->with('estadoOvejas', $estadoOvejas)
              ->with('ovejas', $ovejas);
    }

    public function pdf($id)
    {
      if($id != "0")
      {
        $ovejas = Oveja::where('numero_arete', 'LIKE', '%'.$request->get('search_arete').'%')->get();
      }else {
        $ovejas = Oveja::get();
      }

      $data = ['ovejas' => $ovejas];
      $pdf = \PDF::loadView('ovejas.pdf', $data);
      return $pdf->stream('ovejas.pdf');


      // return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ovejas = Oveja::get();
      $estadoOvejas = EstadoOveja::lists('estado', 'id');
      $users = User::lists('nombre', 'id');
      return view('ovejas.create')
              ->with('users', $users)
              ->with('estadoOvejas', $estadoOvejas)
              ->with('ovejas', $ovejas);
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
        'user_id'       => 'required',
        'estado_oveja_id' => 'required',
        'numero_arete' => 'required|unique:ovejas',
      ]);

      if($validator->fails()) {
          return redirect('ovejas/create')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $Oveja                   = new Oveja();
        $Oveja->user_id          = $request['user_id'];
        $Oveja->fecha_maternidad = $request['fecha_maternidad'];
        $Oveja->crias_macho      = $request['crias_macho'];
        $Oveja->crias_hembra     = $request['crias_hembra'];
        $Oveja->historico        = $request['historico'];
        $Oveja->estado_oveja_id  = $request['estado_oveja_id'];
        $Oveja->numero_arete     = $request['numero_arete'];
        $Oveja->save();


        $ovejas = Oveja::get();
        $estadoOvejas = EstadoOveja::lists('estado', 'id');
        $users = User::lists('nombre', 'id');
        return view('ovejas.index')
                ->with('users', $users)
                ->with('estadoOvejas', $estadoOvejas)
                ->with('ovejas', $ovejas);
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
      $ovejas = Oveja::find($id);
      $estadoOvejas = EstadoOveja::lists('estado', 'id');
      $users = User::lists('nombre', 'id');
      return view('ovejas.edit')
              ->with('users', $users)
              ->with('estadoOvejas', $estadoOvejas)
              ->with('ovejas', $ovejas);
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
        'user_id'       => 'required',
        'estado_oveja_id' => 'required',
        // 'numero_arete' => 'required|unique:ovejas',
      ]);

      if($validator->fails()) {
          return redirect('ovejas/'.$id.'/edit')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $Oveja                   = Oveja::find($id);
        $Oveja->user_id          = $request['user_id'];
        $Oveja->fecha_maternidad = $request['fecha_maternidad'];
        $Oveja->crias_macho      = $request['crias_macho'];
        $Oveja->crias_hembra     = $request['crias_hembra'];
        $Oveja->historico        = $request['historico'];
        $Oveja->estado_oveja_id  = $request['estado_oveja_id'];
        $Oveja->numero_arete     = $request['numero_arete'];
        $Oveja->save();


        $ovejas = Oveja::get();
        $estadoOvejas = EstadoOveja::lists('estado', 'id');
        $users = User::lists('nombre', 'id');
        return view('ovejas.index')
                ->with('users', $users)
                ->with('estadoOvejas', $estadoOvejas)
                ->with('ovejas', $ovejas);
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
      $Oveja = Oveja::find($id);
      if(isset($Oveja)) {
        try {
          $Oveja->delete();
          return redirect('ovejas/');
        } catch ( \Illuminate\Database\QueryException $e) {
          if ($e->errorInfo[0] == 23000) {
            return redirect()->back()->with('error', 'No puede ser eliminada por relaciones dependientes');
          } else {
            dd($e->errorInfo);
          }
        }
      }
    }
}
