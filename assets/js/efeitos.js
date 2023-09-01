function animarMulher(_comVento){
	if (_comVento==1) {
		$(".efeito-mulher").attr("src","assets/img/efeito-mulher/com-vento.png");
		setTimeout(animarMulher,300,0);
	}else{
		$(".efeito-mulher").attr("src","assets/img/efeito-mulher/sem-vento.png");
		setTimeout(animarMulher,300,1);
	}
}

function animarPc(_sumir){
	if (_sumir==1) {
		$("#pcComItens").hide("fade",800);
		setTimeout(animarPc,1500,0);
	}else{
		$("#pcComItens").show("fade",800);
		setTimeout(animarPc,2500,1);
	}
}
// setTimeout(animarPC2,200);
// function animarPC2(){
	// $(".tela").show("blind",{direction:"left"},1000);
// }

function animarYoga(_subir){
	if(_subir==1){
		$(".efeito-yoga").toggleClass('efeito-yoga-cima');
		setTimeout(animarYoga,1200,0);
	}else{
		$(".efeito-yoga").toggleClass('efeito-yoga-cima');
		setTimeout(animarYoga,1200,1);
	}
}

function animarLupa(){
	$(".efeito-lupa-acessorio").toggleClass("girar-lupa");
	setTimeout(animarLupa,1500,1);
}

function animarCachorro(_normal){
	if(_normal==1){
		$(".efeito-cachorro").attr('src','assets/img/efeito-cachorro/rabo-teste.png');
		setTimeout(animarCachorro,200,0);
	}else{
		$(".efeito-cachorro").attr('src','assets/img/efeito-cachorro/rabo-meio.png');
		setTimeout(animarCachorro,200,1);
	}
}

function animarEstrela(_baixo){
	$(".efeito-estrela-braco").toggleClass("girar-estrela");
	setTimeout(animarEstrela,1500,1);
}

function animarPorco(){
	$(".efeito-porco-moeda").animate({
		"top":"40%",
	},1000,function(){
		$(".efeito-porco-moeda").hide("fade",10);
		setTimeout(function(){
			$(".efeito-porco-moeda").css({"top":"0%"});				
		},100);
		setTimeout(function(){
			$(".efeito-porco-moeda").show("fade",100);
			animarPorco();
		},1100);
	});
}

function animarMegafone(_som){
	if(_som==1){
		$(".efeito-megafone").attr('src','assets/img/efeito-megafone/megafone-som.png');
		setTimeout(animarMegafone,1500,0);
	}else{
		$(".efeito-megafone").attr('src','assets/img/efeito-megafone/megafone-sem-som.png');
		setTimeout(animarMegafone,1500,1);
	}
}

function animarMoedas(_aparecer){
	if (_aparecer==1) {
		$("#moeda1").show("fade",500);
		$("#moeda2").delay(200).show("fade",500);
		$("#moeda3").delay(400).show("fade",500);
		$("#moeda4").delay(800).show("fade",500);
		$("#moeda5").delay(1000).show("fade",500);
		$("#moeda6").delay(1200).show("fade",500);
		setTimeout(animarMoedas,3000,0);
	}else{
		$("#moeda1").hide("fade",500);
		$("#moeda2").delay(200).hide("fade",500);
		$("#moeda3").delay(400).hide("fade",500);
		$("#moeda4").delay(800).hide("fade",500);
		$("#moeda5").delay(1000).hide("fade",500);
		$("#moeda6").delay(1200).hide("fade",500);
		setTimeout(animarMoedas,3000,1);
	}
}