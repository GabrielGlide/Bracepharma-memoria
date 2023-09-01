<link rel="stylesheet" href="assets/css/cadastro.css?v=<?= rand() ?>">
<link rel="stylesheet" href="assets/css/teclado.css?v=<?= rand() ?>">

<div class="container-cadastro">
    <div class="titulo">Cadastre-se</div>

    <img src="assets/img/grafismo-cadastro1.png" id="grafismoTop1">
    <img src="assets/img/grafismo-cadastro2.png" id="grafismoTop2">

    <div class="container-campos">
        <input type="text" name="txtNome" id="txtNome" class="input" placeholder="Nome">
        <input type="text" name="txtEmail" id="txtEmail" class="input" placeholder="E-mail">
        <input type="text" name="txtCrm" id="txtCrm" class="input" placeholder="CRM">   
        <label for="" id="infoCrm">Uso exclusivo para médicos</label>
        <div class="campo-uf">
            <!-- <label for="crm-uf">UF</label> -->

            <select id="inputUF" class="input" name="crm-uf" type="select" >
                <option value="">UF</option>
            </select>
        </div>

        <div id="terms" class="hidden">
        <div id="termsCheck">
            <label class="container-checkbox">
                <span class="text-terms">Eu aceito os termos</span>
                <input id="inputCheckbox" type="checkbox">
                <span class="checkmark"></span>
            </label>
        </div>
        <div id="termsText">
            &nbsp;&nbsp;&nbsp;&nbsp; Ao preencher este formulário, você concorda com o tratamento de seus dados pela BracePharma, única e exclusivamente para contata-lo futuramente.
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;Os dados aqui coletados serão tratados em confirmado com a Lei Geral de Proteção de Dados (Lei n. 13.709/2018) e demais normas setoriais sobre o tema.
        </div>
    </div>
        
    </div>
    <div class="btn-confirmar" onclick="validateForm()">Iniciar o Jogo</div>
    <div class="simple-keyboard"></div>
    <div class="btn-voltar" onclick="location.href='instrucoes'">
        <div class="flecha">↩</div>
        <div class="text-voltar">Voltar</div>
    </div>
</div>

<script src="assets/js/simple-keyboard.js"></script>
<script src="assets/js/teclado.js"></script>
<script>

    var crmCadastrados= <?= $crms_cadastrados ?>;
    

    $(window).on('load',function(){
        let _delay = 250; 
        $(".titulo").show("fade",600);
        $("#grafismoTop1").show("blind",{direction:"left"},1500);
        $(".input").delay(300).each(function(){
            $(this).delay(_delay).show("blind",{direction:"left"},800);
            _delay += 200;
        })
        $("#grafismoTop2").delay(2600).show("blind",{direction:"up"},1500);
        $(".campo-uf").delay(3000).show("fade",500);
        $("#infoCrm").delay(3000).show("blind",{direction:"left"},800);
        $("#terms").delay(2800).show("fade",500);
        $(".btn-confirmar").delay(3200).show("fade",500);
        $(".simple-keyboard").delay(3600).show("fade",500);
        $(".btn-voltar").delay(4000).show("fade",600);
        console.log(crmCadastrados)
    });

    var states = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];

    var stateSelect = document.getElementById('inputUF');
    states.forEach(function(abbreviation) {
        var option = document.createElement("option");
        option.value = abbreviation;
        option.text = abbreviation;
        stateSelect.appendChild(option);
    });

    var isFormValidated = false;

    var __validaNome= false ; 
    var __validaEmail = false;

    // VALIDATE NAME 
    const nameInput = document.getElementById('inputName');
    const errorName = document.querySelector(".error-name");

    function validateName() {
        const name = txtNome.value.trim(); // Trim any leading or trailing whitespace

        if (name.length == 1) {
            // Invalid Name
            txtNome.classList.remove('certo-input');
            txtNome.classList.add('erro-input');
            $("#txtNome").val("Escreva um nome válido");
            setTimeout(() => {
                txtNome.classList.remove('erro-input');
                $("#txtNome").val(name);
            }, 1500);
            __validaNome = false;
            isFormValidated = false;
            console.log("name is not valid");
        } else {
            // Valid Name
            txtNome.classList.remove('erro-input');
            txtNome.classList.add('certo-input');
            
            __validaNome = true;
            isFormValidated = true;
            console.log("name is valid");
        }
    }

    // VALIDATE EMAIL
    const emailInput = document.getElementById('txtEmail');

    function validateEmail() {
        const email = emailInput.value;
        
        // Regular expression for email validation
        const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        if (emailRegex.test(email) || email == '') {
            // Valid email address
            txtEmail.classList.remove( 'erro-input');
            txtEmail.classList.add('certo-input');
            $("#txtEmail").attr("placeholder","E-mail");
            isFormValidated = true;
             __validaEmail =true;
            console.log("email is valid");
        } else {
            // Invalid email address
            txtEmail.classList.add('erro-input');
            txtEmail.classList.remove('certo-input');
            $("#txtEmail").val("Escreva uma e-mail válido");
            setTimeout(() => {
                txtEmail.classList.remove('erro-input');
                $("#txtEmail").val(email);
            }, 1500);
            isFormValidated = false;
            __validaEmail =false;
            return false;
            console.log("email is not valid");
        }
    }

    // VALIDATE CRM
    const crmInput = document.getElementById('txtCrm');
    var crmValue;
    const ufInput = document.getElementById('inputUF');
    const errorCRM = document.querySelector(".error-crm");
    const errorCRMExists = document.querySelector(".error-crmExists");
    var doctorPublic;

    // function esconderLabel(){
    //     const uf = inputUF.value.toUpperCase();
    //     if(uf.length > 0 ){
    //         $(".campo-uf label").hide("fade",200);
    //     }else{
    //         $(".campo-uf label").show("fade",200);
    //     }
    // }

    function validateCRM() {
        const crm = txtCrm.value;
        const uf = inputUF.value.toUpperCase();
        // console.log("mergedCRM:"+combinedCRM);
        var catValue;
        var crmPattern = /^\d{1,7}$/;
        // var crmPattern = /^[A-Za-z]{2}[A-Za-z0-9]{7}$/;
        
        //TODO: if the crm is filled it will perform the search every time the send button is pressed
        console.log("uf.length: "+uf.length);
        if (crm.trim() == '' || !crmPattern.test(crm) || uf.trim() == '' || uf.length != 2) {
     

            
            if (uf.trim() === '' || uf.length != 2) {
                $("#inputUF").addClass("erro-input");
                $("#txtCrm").attr("placeholder","Seu CRM é inválido");
                $(".campo-uf label").show("fade",200);
            } else {
                $("#inputUF").removeClass("erro-input");
                $("#txtCrm").attr("placeholder","CRM");
            }


            $(".campo-uf label").addClass("erro-input");
            $(".campo-uf label").show("fade",200);
            $("#inputUF").removeClass("certo-input");
            $("#txtCrm").addClass("erro-input");
            $("#inputUF").addClass("erro-input");
            $("#txtCrm").attr("placeholder","Seu CRM é inválido");
            setTimeout(() => {
                $("#txtCrm").attr("placeholder","CRM");
                txtCrm.classList.remove("erro-input");
                inputUF.classList.remove("erro-input");
                $(".campo-uf label").removeClass("erro-input");
            
            }, 1500);
            isCRMValid = false;
            console.log("crm: "+crm);
            console.log('CRM not valid');
        } else {
            

            if (crm.length < 7) {
                var crmFull = crm.padStart(7, '0');
                console.log("crmFull:"+crmFull);
            } else {
                crmFull = crm;
            }

            const combinedCRM = uf + crmFull;



            crmValue = combinedCRM;


            // for (let x = 0; x < crmCadastrados.length; x++) {
            //     var verificaValor = crmCadastrados[x][0];

            //     console.log(crmCadastrados[x][0])
            //     console.log(crmValue)
            //     if(crmValue == verificaValor.trim()){
            //         isCRMValid = false;
            //         console.log("verificaValor: "+verificaValor);
            //         console.log("crm: "+crm);
            //         console.log('CRM ja cadastrado');
            //         $("#txtCrm").addClass("erro-input");
            //         txtCrm.classList.remove('certo-input');


            //         $("#txtCrm").val("Seu CRM já foi cadastrado.");
            //         setTimeout(() => {
            //             $("#txtCrm").val(crm)
            //             $("#txtCrm").attr("placeholder","CRM");
            //             txtCrm.classList.remove("erro-input");
                    
            //         }, 1500);
            //         return false;
            //         isFormValidated = false;
            //     }else{
                    txtCrm.classList.remove( 'erro-input');
                    txtCrm.classList.add('certo-input');
                    $("#inputUF").addClass("certo-input");
                    isCRMValid = true;
                // }
                
            // }
            
            console.log('CRM is valid');

        }
    }


    // VALIDATE CHECKBOX 
    const checkbox = document.querySelector("#inputCheckbox");
    var __validaCheck =false;

    function validateCheckbox() {
        if (checkbox.checked) {
            $("#terms").addClass('certo-input-check');
            $(".container-checkbox input:checked ~ .checkmark").addClass('certo-input');
            $(".container-checkbox .checkmark:after").addClass('certo-input');
            isFormValidated = true;
            __validaCheck = true;
            console.log('Checkbox is checked');
        } else {
            $("#terms").addClass('erro-input-check');
            $(".checkmark").addClass('erro-input');
            $("#terms").removeClass('certo-input');
            setTimeout(() => {
                $("#terms").removeClass('erro-input-check');
                $(".checkmark").removeClass('erro-input');
            }, 1500);
            __validaCheck = false
            isFormValidated = false;
            console.log('Checkbox is not checked');
        }
    }

    // checkbox.addEventListener.addner('change', function() {
    //     document.querySelector("#termsText").style.color = this.checked ? 'var(--green)' : 'var(--gray)';
    //     document.querySelector(".text-terms").style.color = this.checked ? 'var(--green)' : 'var(--gray)';
    //     errorCheckbox.style.display = "none";
    // });


    function validateForm() {
        console.log("--VALIDATE FORM--");
        validateName();
        validateEmail();
        validateCRM();
        validateCheckbox();
        if(__validaNome && __validaEmail && __validaCheck && isCRMValid){
            if (isFormValidated) {
                sendForm();
                console.log("salva")
            }
        }
    }

    function sendForm() {
        
        var name= txtNome.value;
        var email= txtEmail.value;
        var crm= crmValue;

        $.ajax({
			  url: "save-user-ajax",
			  type: "POST",
			  data: "nome="+name+"&email="+email+"&crm="+crm,
			  dataType: "html"
			}).done(function(resposta) {
				console.log(resposta);
                setTimeout(() => {
                    location.href='memoria';    
                }, 1000);
				
			}).fail(function(jqXHR, textStatus ) {
				console.log("Request failed: " + textStatus);
			});
    }
    

</script>