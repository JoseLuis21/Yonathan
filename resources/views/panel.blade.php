@extends('layouts.principal')

@section('content')
  @if(Auth::user()->id != "1")
    <h1>Sistema de control de Ovejas</h1>
    <h2>Bienvenido(a) {{ Auth::user()->nombre }}</h2>
    <a href="/resumen" class="btn btn-primary">Ir al Resumen</a>
  @else
    <h1>Sistema de control de Ovejas</h1>
    <h2>Bienvenido(a) {{ Auth::user()->nombre }}</h2>
  @endif
@endsection
