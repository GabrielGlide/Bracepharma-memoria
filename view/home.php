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
    <div class="fundo"></div>

    <img src="assets/img/logo.png" id="logo">

    <div class="logos-produtos">
        <img src="assets/img/logos/1-color.png">
    </div>

</div>

<script>
    $(".container-home").on("click",function(){
        location.href="intrucoes";
    });

    $(window).on("load",function(){
        $("#logo").show("fade",500);
        $(".fundo-logos").delay(300).show("slide",{direction:"down"},800);
        $(".btn-iniciar").delay(600).show("fade",500);
        $(".fundo").delay(600).show("fade",500);
        $(".logos-produtos").delay(1000).show("fade",500);
        setTimeout(() => {
            trocarLogo();    
        }, 3000);
    });

    // var __btnEngrenagem=0;
    // function somarEngrenagem(){
    //     __btnEngrenagem++;
    //     if(__btnEngrenagem==3){
    //         location.href="ranking";
    //     }
    // }

    var __logo = 1;

    function trocarLogo(){
        $(".logos-produtos").hide("fade",500);
        
        setTimeout(() => {
            $(".logos-produtos img").attr('src','assets/img/logos/'+__logo+'-color.png');   
        $(".logos-produtos").delay(500).show("fade",500);    
        }, 500);
        
        if(__logo == 6){
            __logo=1; 
        }else{
            __logo++;
        }
        setTimeout(trocarLogo, 6000);
    }
</script>