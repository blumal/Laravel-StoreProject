<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script type="text/javascript" src="{{asset('js/code.js')}}"></script>
    <title>Home</title>
</head>
<body>
    {{-- Columna izquierda  --}}
    <div class="row container-left">

    </div>
    {{-- Columna derecha, contenido principal  --}}
    <div class=" row container-right">
        <center>
            <h1>Welcome to home</h1><br/>
            {{-- Recuperamos la variable pasada por el método --}}
            @foreach ($dbproducts as $result)
            {{--Para poder recoger las imágenes podemos utilizar el asset, que nos redirige a la carpeta public, donde a partir de media recogerá las imagenes de la DB--}}
                <div class="products-style">
                    <a href="{{ url("detalle-compra/{$result->id_prod}") }}"><img src="{{asset('media/'.$result->foto_prod)}}" width="200"/></a>
                    <p>{{$result->nombre_prod}}</p>
                    <p>{{$result->precio_prod}}€</p>
                </div>
            @endforeach
        </center>
    </div>
</body>
</html>