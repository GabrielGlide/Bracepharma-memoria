<!-- INICIO: Configuração para sair da aplicação -->
<iframe style="position: absolute;z-index: 999999; left: 0px; top: 0px; width: 200px;height: 390px; border: 0px; background-color: rgba(0,0,0,0);" src="assets/configuracao/"></iframe>
<!-- FIM: Configuração para sair da aplicação -->

<link rel="stylesheet" href="assets/css/home.css">

<div class="container-home">

    <div class="fundo-logos">
        <img src="assets/img/fundo-home.png">
    </div>

    <div class="btn-iniciar">
        Toque na tela<br> para Iniciar
    </div>

    <img src="assets/img/logo.png" id="logo">

    <div class="logos-produtos">
        <img src="assets/img/logos/6-color.png">
    </div>

</div>

<script>
    $(".container-home").on("click",function(){
        location.href="intrucoes";
    });

    // $(window).on("load",function(){
    //     animarCartas(1,1,4);
    //     animarCartas(5,5,7);
    // });

    // var __btnEngrenagem=0;
    // function somarEngrenagem(){
    //     __btnEngrenagem++;
    //     if(__btnEngrenagem==3){
    //         location.href="ranking";
    //     }
    // }

    // function animarCartas(_cartaAtual,_min,_max){
    //     // $("#containerCartasHome").children("img").each(()=>{
    //         // $(this).removeClass("animar-carta");
    //     // });
    //     setTimeout(()=>{
    //         $("#cartaHome"+_cartaAtual).addClass("animar-carta");
    //         setTimeout(()=>{
    //             $("#cartaHome"+_cartaAtual).children(".flip-card-inner").addClass("flip");
    //         },400);
    //         console.log(_max+","+_min+","+_cartaAtual);
    //         setTimeout(()=>{
    //             $("#cartaHome"+_cartaAtual).removeClass("animar-carta");
    //             // setTimeout(()=>{
    //                 $("#cartaHome"+_cartaAtual).children(".flip-card-inner").removeClass("flip");
    //             // },400);
    //             _cartaAtual++;
    //             if(_cartaAtual>_max)
    //                 _cartaAtual=_min;
    //             animarCartas(_cartaAtual,_min,_max);
    //         },2000);
    //     },200)
    // }
</script>