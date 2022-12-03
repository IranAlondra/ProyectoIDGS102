@extends('master')
@section("content")
        <div class="col-md-3 col-md-offset-3">
            <form action="login" method="POST" >
                <div class="form-group">
                    @csrf
                <center><h2>Usuarios</h2></center>
                <div class="row">
                <div class="col-md-5">  
                 <a class="btn btn-info" href="/admin_add_user"><i class="">
                                  Agregar
                                    </button></i></a></div>
                                    
                  <div class="col-md-3">
                 <a class="btn btn-success" href="/users_excel"><i class="">Excel</i></a></div>
                 
               <div class="col-md-3">
                 <a class="btn btn-danger" href="/users_pdf"><i class="">PDF</i></a></div></div><br><br>
              
               <table class="table table-bordered">
  <thead>
   
    <tr>
      <th scope="col">NL</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Tipo</th>
      <th scope="col">Acciones</th>
    </tr>

  </thead>
  <tbody>
     @foreach ($users as $item)
    <tr>
     <td>{{$item['id']}}</td>
      <td>{{$item['name']}}</td>
      <td>{{$item['email']}}</td>
      <td>{{$item['type']==1 ? 'Admin' : 'Usuario'}}</td>
      <td><a  class="btn btn-warning" href="/admin_edit_user/{{$item['id']}}"><i class="">
                                        Editar
                                    </button></i></a></td>
      <td><a  class="btn btn-danger" href="/admin_delete_user/{{$item['id']}}"><i class="">Borrar</button></i></a></td>
     
    </tr>
    @endforeach
  </tbody>
</table>
            </form>
        </div>
    </div>
</div>
@endsection
