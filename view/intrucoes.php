<link rel="stylesheet" href="assets/css/instrucoes.css">

<div class="container-instrucoes">
    <div class="titulo">
        Antes de começar
    </div>

    <div class="container-regras">
        <div class="regras-subtitulo">Confira as regras do jogo:</div>
        <div class="regras">
            Ao iniciar, será sorteado um novo tema para sua partida e você terá 45 segundos para formar todos os pares. 
            <br><br>
            Ao final da partida, caso o tempo acabe ou você finalize, sua pontuação será calculada com base nos seus acertos e a duração da partida. 
            <br><br>
            Participe e divirta-se.
        </div>
        <div class="boa-sorte">Boa sorte!</div>
    </div>

    <div class="btn">Vamos lá!</div>


    <div class="btn-voltar" onclick="location.href='home' ">
        <div class="flecha">↩</div>
        <div class="text-voltar">Voltar</div>
    </div>
</div>

<script>
    $(".btn").on("click",function(){
        location.href="cadastro";
    });

    $(window).on("load",function(){
        $(".titulo").show("fade",600);
        $(".regras-subtitulo").delay(300).show("fade",600);
        $(".regras").delay(600).show("fade",600);
        $(".boa-sorte").delay(1100).show("fade",600);
        $(".btn").delay(1600).show("fade",600);
        $(".btn-voltar").delay(2000).show("fade",600);
    })
</script>