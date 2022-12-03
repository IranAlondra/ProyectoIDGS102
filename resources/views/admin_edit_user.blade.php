@extends('master')
@section("content")
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="/admin_update_user/{{$user['id']}}" method="post" >
                <div class="form-group">
                    @csrf
                    @method('PUT')
                <label for="name">Nombre:</label>
                <input type="text" name="name" class="form-control" value="{{$user['name']}}" id="name" placeholder="Nombre">
                </div>
                <div class="form-group">
                <label for="price">Email:</label>
                <input type="text" name="email" class="form-control" value="{{$user['email']}}" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="description">Contraseña:</label>
                 <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
