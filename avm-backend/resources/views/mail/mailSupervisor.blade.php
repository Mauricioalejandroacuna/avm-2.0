<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <img width="10px" src="https://valuaciones.cl/wp-content/uploads/2022/04/logo.png" />
            <h5>Valuaciones de Chile</h5>
            <br/>
            <div class="container">
                <h3 class="navbar-brand" >
                    Envío automático de excel para realizar la revisión manual.
                    Luego de finalizar la revisión favor enviar en formato PDF a javiera.ferreira@valuaciones.cl
                </h3>
                <h4>
                    Revisar archivo adjunto en este correo en formato excel para evaluar información. Este excel debe ser
                    guardado como PDF para su posterior subida al sistema de AVM por nuestra ejecutiva comercial y envío a cliente.
                </h4>

                <a href="avm.valuaciones.cl">Página web de AVM</a>
                <hr/>
                <h5>En caso de necesitar ayuda contactar a ayuda@valuaciones.cl o directamente al departamento TI</h5>
            </div>
        </nav>
    </div>
</body>
</html>
