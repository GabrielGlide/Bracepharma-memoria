<link rel="stylesheet" href="assets/css/final.css">

<div class="container-conteudo">
    <div class="light"></div>

    <div class="logo-tema">
        <img src="assets/img/logos/<?= $_GET['tema'] ?>.png" >
    </div>

    <?php if($_GET['pontos'] >0){?>
        <div class="titulo">
            <span>PARABÉNS</span>
            Sua pontuação
        </div>
    <?php }else{?>
        <div class="titulo">
            <span>Não foi dessa vez!</span>
            Sua pontuação
        </div>
    <?php }?>



    <div class="pontos" valor="<?= $_GET['pontos'] ?>"></div>

    <?php if($_GET['pontos'] >0){?>
        <div class="texto-info">Retire seu prêmio<br> com a promotora</div>

    <?php }else{?>
        <div class="texto-info"></div>
    <?php }?>


    <div class="logo">
        <img src="assets/img/logo.png">
    </div>

    <canvas id="confetti"></canvas>
</div>

<script src="assets/js/confete.js"></script>

<script>
    $(window).on("load",function(){
        if($(".pontos").attr('valor') == 0){
            $("#confetti").hide();
            $(".pontos").text("0");
        }else{
            $("#confetti").show("fade",400);
            setTimeout(function(){
                let control = 0;
                setInterval(() => {
                    if(control == $(".pontos").attr('valor')){
                        setTimeout(function(){
                            location.href="home";
                        },7000);
                        clearInterval();
                    }else{
                        control += 10
                        $(".pontos").text(control);

                    }
                },50);
            },1);
        }
    })
    $("body").on("click",function(){
        location.href="home";
    })
    
</script>