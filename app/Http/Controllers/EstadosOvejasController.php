<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EstadoOveja;

class EstadosOvejasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $estadoOvejas = EstadoOveja::get();
      return view('estado-ovejas.index')->with('estadoOvejas', $estadoOvejas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('estado-ovejas.create');
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
        'estado' => 'required|min:2'
      ]);

      if($validator->fails()) {
          return redirect('estado-ovejas/create')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $estadoOvejas               = new EstadoOveja();
        $estadoOvejas->estado       = $request['estado'];
        $estadoOvejas->save();


        $estadosOvejas = EstadoOveja::get();
        return view('estado-ovejas.index')->with('estadoOvejas', $estadosOvejas);
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
      $estadoOvejas = EstadoOveja::find($id);
      return view('estado-ovejas.edit')->with('estadoOvejas', $estadoOvejas);
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
        'estado' => 'required|min:2'
      ]);

      if($validator->fails()) {
          return redirect('estado-ovejas/edit')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $estadoOvejas               = EstadoOveja::find($id);
        $estadoOvejas->estado       = $request['estado'];
        $estadoOvejas->save();


        $estadosOvejas = EstadoOveja::get();
        return view('estado-ovejas.index')->with('estadoOvejas', $estadosOvejas);
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
      $estadosOvejas = EstadoOveja::find($id);

      if(isset($estadosOvejas)) {
        try {
          $estadosOvejas->delete();
          return redirect('estado-ovejas/');
        } catch ( \Illuminate\Database\QueryException $e) {
          if ($e->errorInfo[0] == 23000) {
            return redirect()->back()->with('error', 'Estado Ovejas no puede ser eliminada por relaciones dependientes');
          } else {
            dd($e->errorInfo);
          }
        }
      }
    }
}
