<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Venta;
use App\CriasTotal;
use App\Oveja;

class ResumenController extends Controller
{
  public function index(Request $request)
  {
    $ventas = Venta::where('estado', '=', 'Confirmada')->where("user_id", '=', \Auth::user()->id )->count();
    $crias = CriasTotal::where('user_id', '=', \Auth::user()->id)->first();
    $ovejas = Oveja::where('user_id', '=', \Auth::user()->id)->count();
    return view('resumen')
            ->with('ventas', $ventas)
            ->with('crias', $crias)
            ->with('ovejas', $ovejas);
  }
}
