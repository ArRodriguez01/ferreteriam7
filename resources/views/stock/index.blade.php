@include('includes.nav')
<h1>PRODUCTOS</h1>
@foreach ($stock['data'] as $item )
    <div id="item">
        <p>{{$item['nombre']}}</p>
        <p>{{$item['marca']}}</p>
        <p>{{$item['seccion']}}</p>
        <p>{{$item['precio']}}€</p>
        <a href={{route('cart.add',$item['id'])}}>+</a>
    </div>
@endforeach
