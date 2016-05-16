<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paricion;
use App\Oveja;

class ParicionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovejas = Oveja::lists('numero_arete', 'id');
        return view('pariciones.create')
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
        'oveja_id'       => 'required',
        'fecha_paricion' => 'required',
        'cantidad_machos' => 'required',
        'cantidad_hembras' => 'required',
        'crias_muertas' => 'required',
        'total_paricion' => 'required'
      ]);

      if($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      }else {
        $paricion                   = new Paricion();
        $paricion->oveja_id          = $request['oveja_id'];
        $paricion->fecha_paricion = $request['fecha_paricion'];
        $paricion->cantidad_machos      = $request['cantidad_machos'];
        $paricion->cantidad_hembras     = $request['cantidad_hembras'];
        $paricion->crias_muertas        = $request['crias_muertas'];
        $paricion->total_paricion  = $request['total_paricion'];
        $paricion->save();


        return redirect()->route('pariciones.show', $request['oveja_id'] );
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
        $pariciones = Paricion::where('oveja_id', '=', $id)->get();
        $oveja = $id;
        return view('pariciones.show')
                ->with('pariciones', $pariciones)
                ->with('id_oveja', $oveja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paricion = Paricion::find($id);
        $oveja = Oveja::lists('numero_arete', 'id');
        return view('pariciones.edit')
                ->with('paricion', $paricion)
                ->with('ovejas', $oveja);

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
        'oveja_id'       => 'required',
        'fecha_paricion' => 'required',
        'cantidad_machos' => 'required',
        'cantidad_hembras' => 'required',
        'crias_muertas' => 'required',
        'total_paricion' => 'required'
      ]);

      if($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      }else {
        $paricion                   = Paricion::find($id);
        $paricion->oveja_id         = $request['oveja_id'];
        $paricion->fecha_paricion   = $request['fecha_paricion'];
        $paricion->cantidad_machos  = $request['cantidad_machos'];
        $paricion->cantidad_hembras = $request['cantidad_hembras'];
        $paricion->crias_muertas    = $request['crias_muertas'];
        $paricion->total_paricion   = $request['total_paricion'];
        $paricion->save();


        return redirect()->route('pariciones.show', $request['oveja_id'] );

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
      $paricion = Paricion::find($id);
      if(isset($paricion)) {
        try {
          $paricion->delete();
          return back();
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
