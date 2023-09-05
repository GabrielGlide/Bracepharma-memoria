<link rel="stylesheet" href="assets/css/final.css">

<div class="container-conteudo">
    <div class="light"></div>

    <div class="logo-tema">
        <img src="assets/img/logos/<?= $_GET['tema'] ?>.png" >
    </div>

    <?php if($_GET['pontos'] >0){?>
        <div class="titulo">
            <span>PARABÉNS</span>
            Sua pontuação:
        </div>
    <?php }else{?>
        <div class="titulo">
            <span style="font-size:100px;">Não foi dessa vez!</span>
            Sua pontuação:
        </div>
    <?php }?>



    <div class="pontos" valor="<?= $_GET['pontos'] ?>"></div>

    <?php if($_GET['pontos'] >0){?>
        <div class="texto-info">Retire seu prêmio<br> com a promotora</div>

    <?php }else{?>
        <div class="texto-info">Obrigado por participar.</div>
    <?php }?>


    <div class="logo">
        <img src="assets/img/logo.png">
    </div>

    <canvas id="confetti"></canvas>
</div>

<script src="assets/js/confete.js"></script>

<script>
    var point =  new Audio('assets/som/point.mp3');
    var congratulations =  new Audio('assets/som/congratulations.mp3');
    var fail =  new Audio('assets/som/fail.mp3');

    $(window).on("load",function(){
        $(".logo").show("fade",500);
        $(".logo-tema").delay(300).show("fade",500);
        $(".titulo").delay(600).show("fade",500);
        $(".pontos").delay(1000).show("fade",500);
        $(".texto-info").delay(1600).show("fade",500);


        if($(".pontos").attr('valor') == 0){
            $("#confetti").hide();
            $(".pontos").text("1");
            fail.play();
            setTimeout(function(){
                location.href="home";
            },5000);
        }else{

            setTimeout(function(){
                let control = 0;
                setInterval(() => {
                    if(control == $(".pontos").attr('valor')){
                        point.pause();
                        congratulations.play();
                        setTimeout(function(){
                            location.href="home";
                        },7000);
                        clearInterval();
                    }else{
                        point.play();
                        point.playbackRate = 1.5;
                        point.loop=true;
                        control += 10
                        $(".pontos").text(control);

                    }
                },50);
            },1);
        }
    })
    // $("body").on("click",function(){
    //     location.href="home";
    // })
    
</script>