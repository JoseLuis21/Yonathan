@extends('layouts.principal')

@section('content')
  @if(Auth::user()->id != "1")
    <style>
      body
      {
        background: url('/images/fondo.png');
      }
    </style>
    <center><h1 style="color:#f0f0f0;">Sistema de control de Ovejas</h1></center>
    <center><h2 style="color:#f0f0f0;">Bienvenido(a) {{ Auth::user()->nombre }}</h2></center>
    <center><a style="color:#f0f0f0;" href="/resumen" class="btn btn-primary">Ir al Resumen</a><center>
  @else
    <h1>Sistema de control de Ovejas</h1>
    <h2>Bienvenido(a) {{ Auth::user()->nombre }}</h2>
  @endif
@endsection
