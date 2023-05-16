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
        <form action={{route('cartmanag.update',$pedido['id'])}} method="POST">
            @csrf
            @method('patch')
            <p>{{$pedido['order']}}</p>
            <label>Precio:</label>
            <input type="number" step=".01" value={{$pedido['total']}} name="total">
            <label>Direccion:</label>
            <input type="text" name="address" value={{$pedido['address']}}><br>
            <input type="submit" value="Actualiza">
        </form>
    </div>
</body>
</html>
