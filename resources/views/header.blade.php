<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total= ProductController::cartItem();
}

?>
<style type="text/css">
  #menu ul {
 list-style:none;
 background:#00000;
 margin:20;
 padding:0;
}

/* items del menu */



/* enlaces del menu */



/* items del menu */

#menu ul li {
 position:relative;
 float:left;
 
 
 background:#e3f2fd;
 margin:0;
 padding:0;
}

/* efecto al pasar el ratón por los items del menu */

#menu ul ul {
 display:none;
 position:absolute;
 top:100%;
 left:0;
 background:#000000 ;
 padding:0;
}

/* items del menu desplegable */

#menu ul ul li {
 float:none;
 width:150px
 
 
}

/* enlaces de los items del menu desplegable */

#menu ul ul a {
 line-height:120%;
 padding:10px 15px;
}

/* items del menu desplegable al pasar el ratón */

#menu ul li:hover > ul {
 display:block;
}
</style>
<nav id="menu" class="navbar navbar-default" style="background-color: #e3f2fd;>
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Store Online </a>
      
        
        
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/">Inicio</a></li>
          <li><a href="/myorders">Órdenes</a></li>
           @if(Session::has('user'))
          @if(Session::get('user')['type']==1)
           <li><a  href="#">Admin</a><ul>
 <li><a href="/admin_users">Usuarios</a></li>
 <li><a href="/admin_products">Productos</a></li>
 </ul></li>
          @endif
         @endif

        </ul>
        <form action="/search" class="navbar-form navbar-left" >
          <div class="form-group">
            <input type="text" name="query" class="form-control search-box " placeholder="Buscar...">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/cartlist">Carrito({{$total}})</a></li>
          @if(Session::has('user'))
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/logout">Salir</a></li>
            </ul>
          </li>
          @else
          <li><a href="/login">Iniciar Sesión</a></li>
          <li><a href="/register">Registrarse</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
