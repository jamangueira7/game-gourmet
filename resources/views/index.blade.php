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
    <body>
    <div class="row">
        <div class="col-12">
            <nav class="navbar fixed-top flex-md-nowrap p-3 shadow bg-dark text-white">
                <div class="col-sm-6 text-left">
                    <h2>Jogo Gourmet</h2>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                        <button type="button" class="btn btn-secondary">Reiniciar o jogo</button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="content" class="container-fluid">

        <div id="game" class="">

        </div>
    </div>

    <script src="{{ asset('js/diversos.js') }}"></script>
    <script src="{{ asset('js/ajax-3-5-1.js') }}"></script>
    <script src="{{ asset('js/jquery-3-3-1.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="javascript">

    </script>
    </body>
</html>
