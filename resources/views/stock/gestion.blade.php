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
<h1>Gestión de stocks</h1>
<form action={{route('stockmanag.store')}} method="POST">
    @csrf
    <label>Nombre</label>
    <input type="text" name="nombre">
    <label>Marca</label>
    <input type="text" name="marca">
    <label>Seccion</label>
    <input type="text" name="seccion">
    <label>Precio</label>
    <input type="number" step=".01" name="precio">
    <input type="submit" value="Insertar">
</form>
@if (gettype($stocks['data'])=="array")
    @foreach ($stocks['data'] as $stock )
    <div id="pedido">
        <form action={{route("stockmanag.delete",$stock['id'])}} method="post">
            @csrf
            @method('delete')
            <p>Nombre:{{$stock['nombre']}}</p>
            <p>Marca:{{$stock['marca']}}</p>
            <p>Sección:{{$stock['seccion']}}</p>
            <p>Precio:{{$stock['precio']}}€</p>
            <input type="submit" value="Borrar">
        </form>
    </div>
    @endforeach
@else
<p>{{$stocks['data']}}</p>
@endif
</body>
</html>
