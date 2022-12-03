@extends('master')
@section("content")
<div class="container p-3 my-3 bg-primary text-white">
   <div class="row">
       <div class="col-sm-6">
       <img class="detail-img" src="{{$product['gallery']}}" alt="">
       </div>
       <div class="col-sm-5">
           <a href="/">Regresar</a>
       <h2>{{$product['name']}}</h2>
       <h3>Precio : {{$product['price']}}</h3>
       <h4>Detalles: {{$product['description']}}</h4>
       <h4>Categoría: {{$product['category']}}</h4>
       <br><br>
       <form action="/add_to_cart" method="POST">
           @csrf
           <input type="hidden" name="product_id" value={{$product['id']}}>
       <button class="btn btn-primary ">Agregar al Carrito</button>
       
       </form>
       <br><br>
    </div>
   </div>
</div>
@endsection
