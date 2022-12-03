@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <div class="row">
            <div class="col-md-8">  
            <h4>Órdenes </h4></div>
             <div class="col-md-1">
             <a class="btn btn-success" href="orders_excel">Excel</a></div>
             <div class="col-md-1">
             <a class="btn btn-danger" href="orders_pdf">PDF</a></div></div>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>Nombre : {{$item->name}}</h2>
                      <h5>Estatus de la entrega : {{$item->status}}</h5>
                      <h5>Dirección : {{$item->address}}</h5>
                      <h5>Estatus del pago : {{$item->payment_status}}</h5>
                      <h5>Método de pago : {{$item->payment_method}}</h5>

                    </div>
             </div>

            </div>
            @endforeach
          </div>

     </div>
</div>
@endsection
