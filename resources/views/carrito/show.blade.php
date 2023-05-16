<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"  href="/css/stock.css" type="text/css">
    <title>Tu carrito</title>
  </head>
  @include('includes.nav')
<h1>Tus pedidos</h1>
@if (gettype($pedidos['data'])=="array")
    @foreach ($pedidos['data'] as $pedido )
    <div id="pedido">
    <p>Pedido:{{$pedido['order']}}</p>
    <p>Precio:{{$pedido['total']}}</p>
    <p>Direccion:{{$pedido['address']}}</p>
    </div>
    @endforeach
@else
<p>{{$pedidos['data']}}</p>
@endif
</body>
</html>

