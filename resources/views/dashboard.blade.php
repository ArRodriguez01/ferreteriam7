<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet"  href="/css/style.css" type="text/css">
  </head>
  <body>
    <div class="contenedor">
        <h1>FERRETERIA LARAVEL</h1>
        <a href={{route('stock.index')}}>Ver productos</a>
        <a href={{route('cart.index')}}>Mis pedidos</a>
    </div>
  </body>
</html>
