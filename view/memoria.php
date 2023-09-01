<!-- BACKGROUND -->
<!-- <img src="assets/img/bg.jpg" class="bg"> -->

<!-- AUDIOS -->
<!-- <audio id="audClick"> -->
<!-- <source src="assets/audio/click.wav" type="audio/mpeg"> -->
<!-- </audio> -->
<!-- <audio id="audCerto"> -->
<!-- <source src="assets/audio/certo.wav" type="audio/mpeg"> -->
<!-- </audio> -->
<!-- <audio id="audErro"> -->
<!-- <source src="assets/audio/erro.wav" type="audio/mpeg"> -->
<!-- </audio> -->

<link rel="stylesheet" href="assets/css/memoria.css">

<div class="container-conteudo">
    <div class="block-inicio"></div>

    <div class="titulo">
        <div class="logo"><img src="assets/img/logo.png" ></div>
        <span>FORME OS PARES</span><br>
        Se apresse para finalizar<br> no tempo!
    </div>
	
	<div class="container-count-down">
        <div id="countdown">
            <div id="countdown-number">00:45</div>
            <svg  class="main-circle">
                <circle r="18" cx="20" cy="20"></circle>
            </svg>
            <svg class="background-circle">
                <circle r="18" cx="20" cy="20"></circle>
            </svg>
        </div>
    </div>
	<div class="cartas absolute">
		<?php
		for ($i = 0; $i < 6; $i++)  :
		?>
			<div id="carta<?= $i ?>" class="cartas__peca" numero="<?= $numeros[$i] ?>">
				<div class="front">
					<img src="assets/img/bg-cards/<?= $tema ?>.png">
				</div>
				<div class="back">
					<img src="assets/img/conteudo-cartas/<?= $tema ?>/<?= $numeros[$i] ?>.png">
				</div>
			</div>
		<?php
		endfor
		?>
	</div>

	
</div>

<script>
    let _jogando = false;
    let _cartaAnt = null;
    var cart2 = null;
    let _numeroAnt = null;
    let _acertos = 0;
    let _pontos = 0;


    var __tema = <?= $tema ?> 
	let __tempoAcabou=0;
	let __tempoResposta=0;
	var __tempo=45;
	var __minutos=0;
	var __segundos=45;
	var __timeoutCronometro;


    
    var preStart =  new Audio('assets/som/pre-init.mp3');
    var alert =  new Audio('assets/som/alert.mp3');
    var clockI = new Audio('assets/som/initial-clock.mp3');
    var piep = new Audio('assets/som/piep.mp3');

    var success = new Audio('assets/som/success.mp3');
    var error =  new Audio('assets/som/error.mp3');

    var _minutos = 0;
    var _tempo = 45;
    const DISPLAY = document.querySelector('#timer');
    

    // audTrilha.play();
    // audTrilha.volume = 0;.03;

    $(window).on("load",function(){
        preStart.play();
        preStart.playbackRate = 2;
		let _delay =400;
        $(".titulo").show("fade",800);
		$(".cartas__peca").delay(500).each(function(){
			$(this).delay(_delay).show("fade",200);
			_delay += 250;
		});

        $(".acertos__peca").delay(1500).each(function(){
			$(this).delay(_delay).show("fade",500);
			_delay += 300;
		});

        setTimeout(() => {
            $(".block-inicio").hide();
            cronometro();
            
            clockI.play();
            clockI.volume = 1;
        }, 3600);
	})

    $(".cartas__peca").flip({
        trigger: 'manual'
    });
    $(".cartas__peca").on("click", function() {
        if (!_jogando) {
            verificarCarta(this)
        }
    });

    function verificarCarta(p) {
        if (_cartaAnt != $(p).attr("id")) {
            $(p).flip(true);
            // audClick.play();
            if (_numeroAnt != null && _numeroAnt != $(p).attr("numero")) {
                _jogando = true
                if((_numeroAnt ==  1 && $(p).attr("numero") == 4) || (_numeroAnt == 4 && $(p).attr("numero") == 1)){
                    setTimeout(ganhouCarta, 500, p)
                }
                else if((_numeroAnt ==  2 && $(p).attr("numero") == 5) || (_numeroAnt == 5 && $(p).attr("numero") == 2)){
                    setTimeout(ganhouCarta, 500, p)
                }
                else if((_numeroAnt ==  3 && $(p).attr("numero") == 6) || (_numeroAnt == 6 && $(p).attr("numero") == 3)){
                    setTimeout(ganhouCarta, 500, p)
                }else{
                    setTimeout(perderCarta, 500, p)
                }
            }else {
                if (_numeroAnt == null) {
                    _cartaAnt = $(p).attr("id")
                    _numeroAnt = $(p).attr("numero")
                }
            }
        }
    }

    function perderCarta(p) {
        error.play();
        console.log("perdi");
        $(p).find("img").addClass("erro");
        $("#" + _cartaAnt).addClass("erro");

        setTimeout(() => {
    
            $(".cartas__peca").removeClass("erro");
            $(".front img").removeClass("erro");
            $(".back img").removeClass("erro");
            
        }, 300);
        $(p).delay(1000).flip(false);
        $("#" + _cartaAnt).delay(1000).flip(false); 
        _cartaAnt = null
        _numeroAnt = null
        _jogando = false
    }

    function ganhouCarta(p) {
        success.play();
        
        _acertos++;
        // $(p).find("img").hide("fade");
        $(p).find("img").addClass("acerto");
        // $("#" + _cartaAnt).find("img").hide("fade");
        $("#" + _cartaAnt).find("img").addClass("acerto");
        $(p).find("img").delay(800).hide("fade");
            $("#" + _cartaAnt).find("img").delay(800).hide("fade");
        _cartaAnt = null
        _numeroAnt = null
        _jogando = false
        console.log(_acertos);
        if (_acertos >= 3) {
            _pontos = calcularPontos(__tempo, _acertos)
            setTimeout(finalizarGame, 500);
        }
    }


    function cronometro(){
		__tempoResposta++;
		__tempo--;
		__segundos--;
		if(__tempo<0){
			// finalizarGame();
			__tempoAcabou =1;	
		}else{
			if(__segundos<0 && __minutos>0){
				__minutos--;
				__segundos=59;
			}
			if(__segundos == 0 && __minutos ==0){
				calcularPontos(__tempo, _acertos);
                setTimeout(finalizarGame, 500);
				__tempoAcabou =1;	
			}


            if(__segundos == 30){
                alert.play();
            }
            if(__segundos ==20){
                alert.play();
            }
            if(__segundos == 14){
                piep.play();
                clockI.pause();
            }
            if(__segundos> 20 && __segundos <=  30){
                
                $("#countdown-number").css("color","#FFC46C");
                $(".main-circle circle").css("stroke","#FFC46C");
            }else if(__segundos> 10 && __segundos <=  20){

                $("#countdown-number").css("color","#FF9B05");
                $(".main-circle circle").css("stroke","#FF9B05");
            }else if(__segundos> 0 && __segundos <=  10){
                $("#countdown-number").css("color","#FF1616");
                $(".main-circle circle").css("stroke","#FF1616");
            }else{
                $("#countdown-number").css("color","white");
                $(".main-circle circle").css("stroke","#white");
            }

			$("#countdown-number").text(verTextoCronometro(__minutos)+":"+verTextoCronometro(__segundos));
			console.log(verTextoCronometro(__minutos)+":"+verTextoCronometro(__segundos));
			setTimeout(cronometro,1000);
		}
	}
	function verTextoCronometro(_num){
		if(_num<10){
			return "0"+_num;
		}else{
			return _num;
		}
	}

    function calcularPontos(tempo, cartasAcertadas) {
        var pontuacaoFinal
        if(cartasAcertadas ==3){
            if(tempo >= 32){
                pontuacaoFinal = 400;
            }else if(tempo > 28 && tempo < 32){
                pontuacaoFinal = 300;
            }else{
                pontuacaoFinal = 200;
            }
        
        }else if( cartasAcertadas == 2){
            pontuacaoFinal = 200;
        }else if(cartasAcertadas == 1){
            pontuacaoFinal =100;
        }else{
            pontuacaoFinal =0;
        }
        
        console.log(pontuacaoFinal);

        return pontuacaoFinal;        
    }

    function finalizarGame(){
        $.ajax({
            url: "save-pontuation-ajax",
            type: "POST",
            data: "pontos="+_pontos+"&tema="+__tema+"&tempo="+__tempo,
            dataType: "html"
        }).done(function(resposta) {
            console.log(resposta);
            setTimeout(() => {
                location.href = "final?pontos=" + _pontos+"&tema="+ __tema;    
            }, 500);
            
        }).fail(function(jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>