<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"  href="/css/stock.css" type="text/css">
    <title>Productos</title>
  </head>
@include('includes.nav')
<h1>PRODUCTOS</h1>
@foreach ($stock['data'] as $item )
    <div id="item">
        <p>{{$item['nombre']}}</p>
        <p>Marca:{{$item['marca']}}</p>
        <p>Seccion:{{$item['seccion']}}</p>
        <p>Precio x Ud:{{$item['precio']}}€</p>
        <a href={{route('cart.add',$item['id'])}}>+</a>
    </div>
@endforeach
</body>
</html>
