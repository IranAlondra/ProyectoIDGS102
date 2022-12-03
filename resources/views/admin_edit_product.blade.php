@extends('master')
@section("content")
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="/admin_update_product/{{$product['id']}}" method="post" >
                <div class="form-group">
                    @csrf
                    @method('PUT')
                <label for="name">Nombre:</label>
                <input type="text" name="name" class="form-control" value="{{$product['name']}}" id="name" placeholder="Nombre">
                </div>
                <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" name="price" class="form-control" value="{{$product['price']}}" id="price" placeholder="Precio">
                </div>
                <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" rows="10" cols="50">{{$product['description']}}</textarea>
                </div>
                <div class="form-group">
                <label for="imagen">Imagen(url):</label>
                <img style="width: 70px;" src="{{$product['gallery']}}"></img>
                <input type="text" name="gallery" class="form-control" value="{{$product['gallery']}}" id="gallery" placeholder="Imagen(url)">
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
