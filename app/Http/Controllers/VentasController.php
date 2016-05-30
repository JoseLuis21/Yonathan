<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Venta;
use App\User;
use App\DetalleVenta;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::get();
        return view('ventas.index')->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::lists('nombre', 'id');
        return view('ventas.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta          = new Venta();
        $venta->fecha   = $request->fecha;
        $venta->total   = $request->total;
        $venta->user_id = $request->user_id;
        $venta->save();

        $detalles = ($request->get('detalle')) ? $request->get('detalle') : [];
        foreach ($detalles as $key => $detalle) {

          $detalle_de_venta = new DetalleVenta();
          $detalle_de_venta->venta_id = $venta->id;
          $detalle_de_venta->user_id  = $detalle['user_id'];
          $detalle_de_venta->cantidad = $detalle['cantidad'];
          $detalle_de_venta->detalle  = $detalle['detalle'];
          $detalle_de_venta->precio   = $detalle['precio'];
          $detalle_de_venta->subtotal = $detalle['total'];
          $detalle_de_venta->save();

        }

        return redirect()->route('ventas.index');
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
      $users = User::select('nombre', 'id')->get();
      $usersSelect = User::lists('nombre', 'id');
      $venta = Venta::find($id);


      return view('ventas.edit')
              ->with('users', $users)
              ->with('ventas', $venta)
              ->with('usersSelect', $usersSelect);
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
        $venta          = Venta::find($id);
        $venta->fecha   = $request->fecha;
        $venta->total   = $request->total;
        $venta->user_id = $request->user_id;
        $venta->save();

        $data = [];
        $detalles = ($request->get('detalle')) ? $request->get('detalle') : [];
        foreach ($detalles as $key => $detalle) {

          $data[$detalle['user_id']] = [
            'user_id' => $detalle['user_id'],
            'cantidad' => $detalle['cantidad'],
            'detalle' => $detalle['detalle'],
            'precio' => $detalle['precio'],
            'subtotal' => $detalle['total']
  			   ];

        }

        $venta->users()->sync($data);

        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function users()
    {
      $users = User::select('id', 'nombre')->get();
      return response()->json($users);
    }
}
