// function selecionarCasa(){
// 	if(__estaNaCasa==false){
// 		mudarCasa(__casa);
// 		__estaNaCasa=true;
// 		clearTimeout(__timeoutAnimarMovimento);
// 		$(".movimento").hide("fade",10);
// 		$("#bolinha1").css({'opacity':'0'});
// 		$("#bolinha2").css({'opacity':'0'});
// 		$("#bolinha3").css({'opacity':'0'});
// 	}else{
// 		abrirModal();
// 	}
// }

function selecionarCasa(_casaSelecionada){
	__casaSelecionada=_casaSelecionada;
	if (__casaSelecionada==__casa) {
		if(__estaNaCasa==false){
			audioTrocaCasa.play();
			mudarCasa(true);
			__estaNaCasa=true;
			clearTimeout(__timeoutMudarCasa);
			clearTimeout(__timeoutAnimarMovimento);
			$(".movimento").hide("fade",10);
			$("#bolinha1").css({'opacity':'0'});
			$("#bolinha2").css({'opacity':'0'});
			$("#bolinha3").css({'opacity':'0'});
		}else{
			abrirModal(__casa);
		}
	}else{
		if (__casaSelecionada<__casa) {
			abrirModal(__casaSelecionada);
		}
	}
}

function mudarCasa(_log){
	$(".fundo-hexagono").hide("fade",10);
	if(__casa>=1 && __casa<6){
		$(".casa-selecionada").attr('src','assets/img/selecionado-verde.png');
	}else if (__casa>=6 && __casa<11) {
		$(".casa-selecionada").attr('src','assets/img/selecionado-azul.png');
	}else if(__casa>=10 && __casa<16){
		$(".casa-selecionada").attr('src','assets/img/selecionado-laranja.png');
	}else if(__casa>=16 && __casa<=18){
		$(".casa-selecionada").attr('src','assets/img/selecionado-vermelho.png');
	}
	$(".fundo-hexagono").fadeOut(300, function() {
        $(".fundo-hexagono").css({"left":$("#hexagono"+__casa).css("left")});
		$(".fundo-hexagono").css({"top":$("#hexagono"+__casa).css("top")});
    }).fadeIn(300);
	$("#hexagono"+(__casa-1)).children('span').removeClass('selecionado');	
	$("#hexagono"+__casa).children('span').addClass('selecionado');
	$(".seta").addClass('seta-hexagono'+__casa);
	if(__casa==8 || __casa==9){
		$(".seta img").attr('src','assets/img/seta-lado.png');
		$(".seta").addClass('lado');
	}else{
		$(".seta img").attr('src','assets/img/seta.png');
		$(".seta").removeClass('lado');
	}
	clearTimeout(__timeoutAnimarSeta);
	setTimeout(animarSeta,1000,2);
	if(_log){
		salvarCasa();
	}
	__transicaoCasa=false;
}

// function mudarCasaClique(){
	// $(".div-hexagono-clique").css({"left":$("#hexagono"+__casa).css("left")});
	// $(".div-hexagono-clique").css({"top":$("#hexagono"+__casa).css("top")});	
// }

var __timeoutAnimarMovimento;
function animarMovimento(_aparecer,_invertido){
	if (_invertido==false) {
		if (_aparecer==1) {
			$("#bolinha1").animate({
				"opacity":"1"
			},100,function(){
				$("#bolinha2").animate({
					"opacity":"1"
				},100,function(){
					$("#bolinha3").animate({
						"opacity":"1"
					},100);
				});
			});
			__timeoutAnimarMovimento=setTimeout(animarMovimento,1000,0,_invertido);
		}else{
			$("#bolinha1").animate({
				"opacity":"0"
			},100,function(){
				$("#bolinha2").animate({
					"opacity":"0"
				},100,function(){
					$("#bolinha3").animate({
						"opacity":"0"
					},100);
				});	
			});
			__timeoutAnimarMovimento=setTimeout(animarMovimento,1000,1,_invertido);
		}	
	}else{
		if (_aparecer==1) {
			$("#bolinha3").animate({
				"opacity":"1"
			},100,function(){
				$("#bolinha2").animate({
					"opacity":"1"
				},100,function(){
					$("#bolinha1").animate({
						"opacity":"1"
					},100);
				});
			});
			__timeoutAnimarMovimento=setTimeout(animarMovimento,1000,0);
		}else{
			$("#bolinha3").animate({
				"opacity":"0"
			},100,function(){
				$("#bolinha2").animate({
					"opacity":"0"
				},100,function(){
					$("#bolinha1").animate({
						"opacity":"0"
					},100);
				});	
			});
			__timeoutAnimarMovimento=setTimeout(animarMovimento,1000,1);
		}
	}
}