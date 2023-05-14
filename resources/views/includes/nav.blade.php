<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <title>Document</title>

  </head>
  <body>
    <nav>
        <div class="menu">
          <ul>
            <li><a aria-label="Carta" href="{{route('stock.index')}}">Stocks</a></li>
            <li><a href="{{route('cart.index')}}">Carrito</a></li>
            <li><a href="{{route('cart.show')}}">MisPedidos</a></li>
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
          </ul>
        </div>
      </nav>

  </body>
</html>
