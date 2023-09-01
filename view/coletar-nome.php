<link rel="stylesheet" href="assets/css/nome.css">
<link rel="stylesheet" href="assets/css/teclado.css">

<div class="container-agradecimento">
    Obrigado por jogar<br>com a gente <br>
    <!-- <div>Foi bom jogar com você. Volte quando quiser! Agora, insira o seu nome abaixo para saber a sua posição no ranking.</div> -->
    <div>Você ficou em <?= $posicaoAtual ?>° lugar. Insira seu nome abaixo para registrar sua posição no ranking.</div>
</div>

<div class="container-email">
    <input type="text" name="email" class="campo-email input"id="campo" value="" placeholder="Seu nome">
    
    <!-- <span class="label-email">Seu nome</span> -->
    <div class="mensagem-erro">Você precisa inserir seu nome para continuar</div>
    <div id="btnEnviar" onclick="salvarNome()">ENVIAR</div>
    <div class="nao-identificar" onclick="location.href='home'">Não desejo me identificar</div>
</div>


<div class="simple-keyboard"></div>

<script src="assets/js/simple-keyboard.js"></script>
<script src="assets/js/teclado.js"></script>


<script>
    $(window).on("load",function(){
        $(".container-agradecimento").show("fade",600);
        $(".label-email").delay(300).show("fade",500);
        $(".campo-email").delay(800).show("blind",{direction:"left"},600);

        $("#btnEnviar").delay(1400).show("fade",500);
        $(".nao-identificar").delay(1600).show("fade",500);

        $(".simple-keyboard").delay(1900).show("fade",500);
    });

    // $("#campo").focus(function(){
      // $(".label-email").addClass("email-focused");
    // });

    function salvarNome(){
        let _nome = $("#campo").val();
        $.ajax({
		  url: "salvar-nome-ajax",
		  type: "POST",
		  data: "nomeJogador="+_nome,
		  dataType: "html"
		}).done(function(resposta) {
            if(_nome == ''){
                $(".mensagem-erro").delay(500).show("fade",500);
                $(".mensagem-erro").delay(150).effect( "shake" );
                $(".mensagem-erro").delay(4000).hide("fade",500);
                
            }else{
                location.href='ranking';
            }
			
		}).fail(function(jqXHR, textStatus ) {
			console.log("Request failed: " + textStatus);
		});
    }
</script>