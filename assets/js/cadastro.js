var _mascaraEscolhida=null;

function finalizarCadastro(){
	/*location.href='cadastro-nome';*/
  /*fecharModalFoto();*/
  $(".protetor").hide("fade",300);
  $(".btn-fechar").hide("fade",300);
  $(".modal-foto").hide("fade",300);
  finalizarMascara();
}

function novoCadastro(){
  location.href='cadastro';
}
function fazerCadastro(){
	$('#uploaded_image').html("");
	$('#uploaded_image').hide('fade',100);
	$('#rodape_uploaded').hide('fade',100);
	$('.panel-crop').hide('fade',100);
	$(".panel-mascara").show("fade",300);
}

function abrirModalFoto(){
  //fazerCadastro();
	$(".protetor").show("fade",300);
	$(".btn-fechar").show("fade",300);
	$(".modal-foto").show("fade",300);
}

function fecharModalFoto(){
	/*$(".protetor").hide("fade",300);
	$(".btn-fechar").hide("fade",300);
	$(".modal-foto").hide("fade",300);*/
  location.href='cadastro';
}

function selecionarMascara(num){
	$("#btnMascara"+_mascaraEscolhida).css("borderColor","#fff");
	$("#btnMascara"+num).css("borderColor","#000");
	_mascaraEscolhida=num;
}

function cortarImagem(){
	if(!_mascaraEscolhida){
		$(".erro-mascara").show();
	}
	else{
		$(".panel-mascara").hide();
		$(".panel-crop").show();
		$('.panel-default').show('fade',100);
    $('#lblTituloCrop').html('AGORA FALTA SÓ ENVIAR UMA FOTO');
	}
}


$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:250,
      height:250
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').show('fade',100);
    $('.panel-default').hide('fade',100);
    
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"corte-imagem-ajax",
        type: "POST",
        data:{
        	"image": response,
        	"numero": _mascaraEscolhida
        },
        success:function(data)
        {
          $('#uploadimageModal').hide('fade',100);
          $('#uploaded_image').html(data);
          $("#imgFotoPefil").attr("src","assets/uploads/colaborador_"+_email+".png");
          $('#uploaded_image').show('fade',100);
          $('#rodape_uploaded').show('fade',100);
          $('#lblTituloCrop').html('PRONTINHO! AGORA É SÓ ESPERAR O PRIMEIRO DESAFIO! FIQUE LIGADO!');
        }
      });
    })
  });

});  