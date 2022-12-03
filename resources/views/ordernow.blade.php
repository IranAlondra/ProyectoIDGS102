@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <table class="table">

            <tbody>
              <tr>
                <td>Monto</td>
              <td>$ {{$total}}</td>
              </tr>
              <tr>
                <td>Impuesto</td>
                <td>$ 0</td>
              </tr>
              <tr>
                <td>Entrega </td>
                <td>$ 10</td>
              </tr>
              <tr>
                <td>Total</td>
              <td>$ {{$total+10}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <!--form action="/orderplace" method="POST" -->
            <form action="/process-transaction" method="POST" >
              @csrf
                <div class="form-group">
                  <input type="hidden" value="{{$total+10}}" name="total" >
                  <textarea name="address" placeholder="Ingresa tu dirección" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Método de pago</label> <br> <br>
                  <!--input type="radio" value="cash" name="payment"> <span>online payment</span> <br> <br>
                  <input type="radio" value="cash" name="payment"> <span>EMI payment</span> <br><br-->
                  <input type="radio" value="Paypal" name="payment" required> <span>Paypal</span> <br> <br>
              
                </div>
                <button type="submit" class="btn btn-default">Pagar ahora</button>
              </form>
          </div>
     </div>
</div>
@endsection
