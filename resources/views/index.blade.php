<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

            <div id="game" class="row">
                <div class="form-group col-12">
                    <input type="hidden" id="question-id" value="0" />
                    <input type="hidden" id="type" value="" />
                    <span id="question" class="font-weight-bold">O prato que você pensou é <span id="val-alt">massa</span>?</span>
                    @csrf
                </div>

                <div class="form-group col-12 justify-content-between">
                    <button type="button" class="btn btn-lg btn-success col-5" id="yes-button">Sim</button>
                    <button type="button" class="btn btn-lg btn-danger col-5" id="not-button">Não</button>
                </div>

            </div>
        </div>

        <script src="{{ asset('js/jquery-3-3-1.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                $("#yes-button").click("click", function(){
                    searchQuestion("yes");
                });
                $("#not-button").click("click", function(){
                    searchQuestion("not");
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                /*$("#page").change(function() {
                    buscarGroups();
                    buscarItens();
                });*/

                function searchQuestion(yesOrNot) {
                    var url = "{{ route('ajax.search.question') }}";
                    $.ajax({
                        type:'POST',
                        url: url,
                        data:{
                            question:  $("#val-alt").text(),
                            type: $("#type").val(),
                            questionID: $("#question-id").val(),
                            choise: yesOrNot
                        },
                        success:function(data){
                            console.log(data);
                            if(data === 'response') {
                                console.log("aqui");
                            } else {
                                $("#val-alt").text(data['food']);
                                $("#question-id").val(data['id']);
                            }

                        },
                        error:function(data){
                            console.log('Erro no Ajax!');
                        },
                    });
                }

            });

        </script>

    </body>
</html>
