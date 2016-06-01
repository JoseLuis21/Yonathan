@extends('layouts.principal')

@section('content')
<style>
@import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");

.panel-pricing {
-moz-transition: all .3s ease;
-o-transition: all .3s ease;
-webkit-transition: all .3s ease;
}
.panel-pricing:hover {
box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
}
.panel-pricing .panel-heading {
padding: 20px 10px;
}
.panel-pricing .panel-heading .fa {
margin-top: 10px;
font-size: 58px;
}
.panel-pricing .list-group-item {
color: #777777;
border-bottom: 1px solid rgba(250, 250, 250, 0.5);
}
.panel-pricing .list-group-item:last-child {
border-bottom-right-radius: 0px;
border-bottom-left-radius: 0px;
}
.panel-pricing .list-group-item:first-child {
border-top-right-radius: 0px;
border-top-left-radius: 0px;
}
.panel-pricing .panel-body {
background-color: #f0f0f0;
font-size: 40px;
color: #777777;
padding: 20px;
margin: 0px;
}

</style>
<br/><br/><br/>

   <!-- Plans -->
   <section id="plans">
       <div class="container">
           <div class="row">

               <!-- item -->
               <div class="col-md-4 text-center">
                   <div class="panel panel-danger panel-pricing">
                       <div class="panel-heading">
                           <i class="fa fa-desktop"></i>
                           <h3>Ventas Realizadas</h3>
                       </div>
                       <div class="panel-body text-center">
                           <p><strong>Ventas  | {{$ventas}}</strong></p>
                       </div>
                   </div>
               </div>
               <!-- /item -->

               <!-- item -->
               <div class="col-md-4 text-center">
                   <div class="panel panel-warning panel-pricing">
                       <div class="panel-heading">
                           <i class="fa fa-desktop"></i>
                           <h3>Cantidad de Crias</h3>
                       </div>
                       <div class="panel-body text-center">
                           <p><strong>Crias | {{$crias->cantidad}}</strong></p>
                       </div>
                   </div>
               </div>
               <!-- /item -->

               <!-- item -->
               <div class="col-md-4 text-center">
                   <div class="panel panel-success panel-pricing">
                       <div class="panel-heading">
                           <i class="fa fa-desktop"></i>
                           <h3>Cantidad de Ovejas</h3>
                       </div>
                       <div class="panel-body text-center">
                           <p><strong>Ovejas | {{$ovejas}}</strong></p>
                       </div>
               </div>
               <!-- /item -->

           </div>
       </div>
   </section>
   <!-- /Plans -->
   <a href="{{ url('/logout') }}" class="btn btn-danger"><i class="fa fa-btn fa-sign-out"></i>Salir</a>
@endsection
