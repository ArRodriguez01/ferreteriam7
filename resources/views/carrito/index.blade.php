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
  <body>

    @if(count($cartItems)==0)
        <h1>NO tienes nada en tu carrito</h1>
    @endif

    @foreach ($cartItems as $item)
    <form action={{route('cart.store')}} method="POST">
        @csrf
    <div>
    <p>{{$item['name']}}</p>
    <p>{{$item['section']}}</p>
    <p>{{$item['quantity']}}</p>
    <a href={{route('cart.delete',$item['stock_id'])}}>Borrar</a>
    <a href={{route('cart.add',$item['stock_id'])}}>+</a>
    <a href={{route('cart.remove',$item['stock_id'])}}>-</a>
    </div>
    @endforeach
    <p>{{$total}} €</p>
    @if(count($cartItems)!=0)
    <input name="address" type="text" placeholder="Añade tu dirección"><br>
    <input type="submit" value="PEDIR">
    @endif

    </form>
  </body>
</html>
