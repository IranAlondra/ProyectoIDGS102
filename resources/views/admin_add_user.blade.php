@extends('master')
@section("content")
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="/admin_store_user" method="post" >
                <div class="form-group">
                    @csrf
                <label for="name">Nombre:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                </div>
                <div class="form-group">
                <label for="price">Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="description">Contraseña:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                 <div class="form-group">
                <label for="type">Tipo:</label>
                <select name="type">
                  <option value="0">Usuario</option>
                   <option value="1">Admin</option>
                </select>
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
