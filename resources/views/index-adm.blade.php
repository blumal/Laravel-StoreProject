@if (!Session::get('email_session'))
    <?php
        //Si la session no esta definida te redirige al login, la session se crea en el método.
        return redirect()->to('adm-storeproject')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">    
    <title>Home adm prods</title>
</head>
<body>
    <center>
        <h1>Administración de productos</h1><br/>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
                {{-- Recuperamos la variable pasada por el método --}}
                @foreach ($dbproducts as $result)
                    <tr>
                        <td>{{$result->id_prod}}</td>
                        <td><img src="{{asset('media/'.$result->foto_prod)}}" width="120"></td>
                        <td>{{$result->nombre_prod}}</td>
                        <td>{{$result->descripcion_prod}}</td>
                        <td>{{$result->precio_prod}}€</td>
                        <td>{{$result->nombre_mar}}</td>
                        <td>
                            <form action="" method="get">
                                @csrf
                                <input type="submit" name="" id="" value="Update prod">
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                @csrf
                                <!--Definimos que método utilizaremos en las rutas, no es lo mismo el método del formulario que el de las rutas-->
                                {{method_field('DELETE')}}
                                <input type="submit" name="" id="" value="Delete prod">
                                <!--Pasamos el id de cada dato por la url-->
                                {{-- <input type="hidden" name="id" value="{{$result->id}}"> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table><br/>
        <form action="" method="get">
            <input type="submit" value="New item" >
        </form><br/>
        {{-- Botón con redirección al la ruta logout --}}
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class= "botonCre" type="submit" name="logout">Logout</button>
        </form>
    </center>
</body>
</html>