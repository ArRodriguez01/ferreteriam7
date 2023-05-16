<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}"/>
    <title>Tu carrito</title>
  </head>
  @include('includes.nav')
<h1>Actualiza el pedido</h1>
    <div id="pedido">
        <form action={{route('stockmanag.update',$stock['id'])}} method="POST">
            @csrf
            @method('patch')
            <label>Nombre:</label>
            <input type="text" name="nombre" value={{$stock['nombre']}}><br>
            <label>Marca:</label>
            <input type="text" name="marca" value={{$stock['marca']}}><br>
            <label>Sección:</label>
            <input type="text" name="seccion" value={{$stock['seccion']}}><br>
            <label>Precio:</label>
            <input type="number" step=".01" value={{$stock['precio']}} name="precio"><br>
            <input type="submit" value="Actualiza">
        </form>
    </div>
</body>
</html>
