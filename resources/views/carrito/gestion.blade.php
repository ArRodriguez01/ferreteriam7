<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}"/>
    <title>Gestion Stock</title>
  </head>
  @include('includes.nav')
<h1>Gestión de carritos</h1>
@if (gettype($carts['data'])=="array")
    @foreach ($carts['data'] as $cart )
    <div id="pedido">
        <form action={{route("cartmanag.delete",$cart['id'])}} method="post">
            @csrf
            @method('delete')
            <p>Pedido:{{$cart['order']}}</p>
            <p>Total:{{$cart['total']}}</p>
            <p>Dirección:{{$cart['address']}}</p>
            <input type="submit" value="Borrar">
        </form>
    </div>
    @endforeach
@else
<p>{{$carts['data']}}</p>
@endif
</body>
</html>
