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
                            <button type="button" class="btn btn-secondary" id="restart">Reiniciar o jogo</button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div id="content" class="container-fluid">

            <div id="presentation" class="row game" style="display: block;">
                <div class="form-group col-12 middle">
                    <span id="question" class="font-weight-bold">Pense em um prato que gosta!</span>
                    @csrf
                </div>

                <div class="form-group col-12  middle">
                    <button type="button" class="btn btn-lg btn-success col-5" id="ok-button">Ok</button>
                </div>
            </div>

            <div id="game" class="row game" style="display: none;">
                <div class="form-group col-12 middle">
                    <span id="question" class="font-weight-bold">O prato que você pensou é <span id="val-alt">massa</span>?</span>
                    @csrf
                </div>

                <div class="form-group col-12 justify-content-between">
                    <button type="button" class="btn btn-lg btn-success col-5" id="yes-button">Sim</button>
                    <button type="button" class="btn btn-lg btn-danger col-5" id="not-button">Não</button>
                </div>
            </div>

            <div class="row game" id="input-group" style="display: none;">

                <div class="form-group col-12" >
                    <span class="font-weight-bold middle">Qual prato você pensou?</span>
                </div>

                <div class="form-group col-12" >
                    <input maxlength="35" id="new-food" class="form-control input-group-text" type="text" value="" />
                    @csrf
                </div>


                <div class="form-group col-12 middle" id="input-button">
                    <button type="button" class="btn btn-lg btn-success col-5" id="new-food-bnt">Salvar</button>
                </div>
            </div>

            <div class="row game" id="compare-group" style="display: none;">

                <div class="form-group col-12 middle">
                    <span class="font-weight-bold"><span id="new-food-alt">comida nova</span> é ________ mas <span id="last-food">ultima comida</span> não</span>
                </div>

                <div class="form-group col-12 middle">
                    <input maxlength="35" id="detail" class="form-control input-group-text" type="text" value="" />
                    @csrf
                </div>


                <div class="form-group col-12 middle" id="input-button">
                    <button type="button" class="btn btn-lg btn-success col-5" id="compare-bnt">Ok</button>
                </div>
            </div>

            <div class="row game" id="winner-group" style="display: none;">
                <div class="form-group col-12 middle">
                    <span class="font-weight-bold middle">Acertei de novo!</span>
                    @csrf
                </div>

                <div class="form-group col-12 middle" id="input-button">
                    <button type="button" class="btn btn-lg btn-success col-5" id="again-bnt">Jogar novamente</button>
                </div>
            </div>

            <div class="row result" style="display: block;">
                <div class="form-group col-12">
                    <span class="font-weight-bold">PC - <span id="pc-points"> 0</span></span>
                </div>

                <div class="form-group col-12">
                    <span class="font-weight-bold">Usuário - <span id="user-points"> 0</span></span>
                </div>
            </div>
        </div>



        <script src="{{ asset('js/jquery-3-3-1.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>

        <script type="text/javascript">

            let id = "";
            let pc = 0;
            let user = 0;
            let yes = [];
            let not = [];
            let final = false;

            $(document).ready(function () {

                //CLICK
                $("#yes-button").click("click", function(){
                    searchFood("yes");
                });
                $("#not-button").click("click", function(){
                    searchFood("not");
                });

                $("#new-food-bnt").click("click", function(){
                    saveNewFood();
                });

                $("#ok-button").click("click", function(){
                    $("#presentation").css("display", "none");
                    $("#game").css("display", "block");
                });

                $("#compare-bnt").click("click", function(){
                    updateFood();
                    restart();
                });

                $("#again-bnt").click("click", function(){
                    restart();
                });

                $("#restart").click("click", function(){
                    inital();
                });


                function inital () {
                    $("#presentation").css("display", "block");
                    $("#game").css("display", "none");
                    $("#input-group").css("display", "none");
                    $("#compare-group").css("display", "none");
                    $("#winner-group").css("display", "none");

                    $("#val-alt").text("massa");

                    $("#new-food").val("");
                    $("#detail").val("");

                    yes = [];
                    not = [];
                    id = "";
                    pc = 0;
                    user = 0;
                    final = false;
                    $("#pc-points").text(pc);
                    $("#user-points").text(user);
                }
                function restart() {
                    $("#presentation").css("display", "block");
                    $("#game").css("display", "none");
                    $("#input-group").css("display", "none");
                    $("#compare-group").css("display", "none");
                    $("#winner-group").css("display", "none");

                    $("#val-alt").text("massa");

                    $("#new-food").val("");
                    $("#detail").val("");

                    yes = [];
                    not = [];
                    id = "";
                    final = false;
                }




                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                //AJAX
                function saveNewFood() {
                    var url = "{{ route('ajax.save.food') }}";
                    $.ajax({
                        type:'POST',
                        url: url,
                        data:{
                            not: not,
                            food: $("#new-food").val()
                        },
                        success:function(data){

                            $("#game").css("display", "none");
                            $("#input-group").css("display", "none");
                            $("#compare-group").css("display", "block");
                            $("#winner-group").css("display", "none");

                            $("#new-food-alt").text(data['new']['value']);
                            $("#last-food").text(data['last_food']);

                            id = data['new']['id'];
                        },
                        error:function(data){
                            console.log('Erro no Ajax!');
                        },
                    });
                }

                function updateFood() {
                    yes.push($("#detail").val());
                    var url = "{{ route('ajax.update.food') }}";
                    $.ajax({
                        type:'POST',
                        url: url,
                        data:{
                            id:  id,
                            yes: yes,
                        },
                        success:function(data){

                            $("#presentation").css("display", "block");
                            $("#game").css("display", "none");
                            $("#input-group").css("display", "none");
                            $("#compare-group").css("display", "none");
                            $("#winner-group").css("display", "none");
                        },
                        error:function(data){
                            console.log('Erro no Ajax!');
                        },
                    });
                }

                function searchFood(yesOrNot) {
                    var url = "{{ route('ajax.search.food') }}";


                    if(yesOrNot == 'yes') {
                        if(final) {
                            pc = pc + 1;
                            $("#pc-points").text(pc);

                            $("#game").css("display", "none");
                            $("#input-group").css("display", "none");
                            $("#compare-group").css("display", "none");
                            $("#winner-group").css("display", "block");
                            return;
                        }

                        const result = yes.find( element => element === $("#val-alt").text() );

                        if(result == undefined) {
                            yes.push($("#val-alt").text());
                        }

                    } else {
                        if(final) {
                            user +=1;
                            $("#user-points").text(user);
                            not.push($("#val-alt").text());
                            $("#game").css("display", "none");
                            $("#input-group").css("display", "block");
                            $("#compare-group").css("display", "none");
                            $("#winner-group").css("display", "none");
                            return;
                        }

                        const result = not.find( element => element === $("#val-alt").text() );

                        if(result == undefined) {
                            not.push($("#val-alt").text());
                        }
                    }
                    $.ajax({
                        type:'POST',
                        url: url,
                        data:{
                            yes: yes,
                            not: not,
                        },
                        success:function(data){

                            final = data['final'];
                            if(data == -1) {
                                $("#game").css("display", "none");
                                $("#input-group").css("display", "block");
                                $("#compare-group").css("display", "none");
                                $("#winner-group").css("display", "none");
                                return;
                            }
                            $("#val-alt").text(data['resp']);

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
