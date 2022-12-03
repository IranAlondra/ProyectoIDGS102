@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <center><h1>Productos</h1>
            <!--a class="btn btn-success" href="ordernow">Ordenar ahora</a> <br> <br-->
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
             </div>
             <div class="col-sm-3">
                <a href="/removecart/{{$item->cart_id}}" class="btn btn-danger" >Eliminar del carrito</a>
             </div>
            </div>
            @endforeach
          </div>
          @if(count($products) > 0)
          <div class="row">
          <div class="col-md-8">  
          <a class="btn btn-success" href="ordernow">Compra Final</a></div>
          <div class="col-md-1">
          <a class="btn btn-success" href="cart_excel">Excel</a></div>
        <div class="col-md-1">
          <a class="btn btn-danger" href="cart_pdf">PDF</a></div></div> <br> <br>
          @endif
     </div>
</div>
</center>
@endsection
