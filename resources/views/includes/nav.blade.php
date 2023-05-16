<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet"  href="/css/nav.css" type="text/css">

    <title>Document</title>

  </head>
  <body>
    <nav>
        <div class="menu">
          <ul>
            <li><a aria-label="Carta" href="{{route('stock.index')}}">Stocks</a></li>
            <li><a href="{{route('cart.index')}}">Carrito</a></li>
            <li><a href="{{route('cart.show')}}">MisPedidos</a></li>
            @if (Auth::user()->id==1)
                <li><a href={{route('stockmanag.index')}}>Gestionar Stock</a></li>
                <li><a href={{route('cartmanag.index')}}>Gestionar Pedidos</a></li>
            @endif
            @if (Auth::user())
                <li><form  action={{route('logout')}} method="POST">@csrf<input type="submit" value="Logout"></form></li>
            @endif
          </ul>
        </div>
      </nav>
  </body>
</html>
