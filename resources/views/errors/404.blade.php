<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jogo Gourmet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    </head>
    <body style="background-color: #005cbf;">
    <div style="display: flex;justify-content: center;align-items: center; min-height: 100px; font-size: 100px; font-weight: bold;">
        <span>Está perdido?</span>
    </div>
    <div style="background-image: url({{ asset('/img/404.jpg') }}); background-repeat: no-repeat;background-size: cover; min-height: 800px;"></div>

    <div style="display: flex;justify-content: center;align-items: center; min-height: 100px; font-size: 100px; font-weight: bold;">
        <a href="/" class="btn btn-lg btn-secondary">Voltar a home</a>
    </div>
    <script src="{{ asset('js/diversos.js') }}"></script>
    <script src="{{ asset('js/ajax-3-5-1.js') }}"></script>
    <script src="{{ asset('js/jquery-3-3-1.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    </body>
</html>
