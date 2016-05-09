<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CriasTotal;
use App\User;

class CriasTotalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $criasTotal = CriasTotal::get();
      return view('crias-totales.index')->with('criasTotal', $criasTotal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::lists('nombre', 'id');
        return view('crias-totales.create')->with('users', $users);
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
        'cantidad'      => 'required|min:1',
        'user_id'       => 'required|unique:crias_totales'
      ]);

      if($validator->fails()) {
          return redirect('crias-totales/create')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $user = new CriasTotal();
        $user->user_id      = $request['user_id'];
        $user->cantidad     = $request['cantidad'];
        $user->save();


        $criasTotal = CriasTotal::get();
        return view('crias-totales.index')->with('criasTotal', $criasTotal);
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
      $users = User::lists('nombre', 'id');
      $criasTotal = CriasTotal::find($id);
      return view('crias-totales.edit')
                  ->with('users', $users)
                  ->with('criasTotal', $criasTotal);
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
        'cantidad'      => 'required|min:1',
      ]);

      if($validator->fails()) {
          return redirect('crias-totales/create')
                      ->withErrors($validator)
                      ->withInput();
      }else {
        $criasTotal               = CriasTotal::find($id);
        $criasTotal->cantidad     = $request['cantidad'];
        $criasTotal->save();


        $criasTotal = CriasTotal::get();
        return view('crias-totales.index')->with('criasTotal', $criasTotal);
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
      $criasTotal               = CriasTotal::find($id);
      if(isset($criasTotal)) {
        try {
          $criasTotal->delete();
          return redirect('crias-totales/');
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
