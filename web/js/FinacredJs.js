// Atualiza��o: 30/11 - 15:30

function dimWrapper(w, h ) { 
	if (w < 10 || h < 10) {
		var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;  // comando copiado do w3schools
			// n�o achei a l�gica deste comando, mas funciona. O valor correto hora est� em uma vari�vel hora em outra. E sempre retornar o valor correto
			
		var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight; // comando copiado do w3schools
			// n�o achei a l�gica deste comando, mas funciona. O valor correto hora est� em uma vari�vel hora em outra. E sempre retornar o valor correto
	}

	wrapper_width  = w + "px";
	wrapper_height = h + "px"; 
	
	document.getElementById("wrapper").style.width = wrapper_width;
	document.getElementById("wrapper").style.height = wrapper_height;
	
	document.getElementById("home").style.width = wrapper_width;
	document.getElementById("home").style.height = wrapper_height;
	
	document.getElementById("empresa").style.width = wrapper_width;
	document.getElementById("empresa").style.height = wrapper_height;
	
	document.getElementById("produtos").style.width = wrapper_width;
	document.getElementById("produtos").style.height = wrapper_height;
	
	document.getElementById("atuacao").style.width = wrapper_width;
	document.getElementById("atuacao").style.height = wrapper_height;
	
	document.getElementById("honorarios").style.width = wrapper_width;
	document.getElementById("honorarios").style.height = wrapper_height;
	
	document.getElementById("conosco").style.width = wrapper_width;
	document.getElementById("conosco").style.height = wrapper_height;
	
	document.getElementById("amigavel").style.width = wrapper_width;
	document.getElementById("amigavel").style.height = wrapper_height;
	
	document.getElementById("extrajudicial").style.width = wrapper_width;
	document.getElementById("extrajudicial").style.height = wrapper_height;
	
	document.getElementById("judicial").style.width = wrapper_width;
	document.getElementById("judicial").style.height = wrapper_height;
}

$(document).ready(function(){

	$('#nome').tooltip({title: "Preenchimento obrigat�rio", trigger: "focus", placement: "bottom"}); // mensagem ao focar o campo do formul�rio
	$('#email').tooltip({title: "Preenchimento obrigat�rio", trigger: "focus", placement: "bottom"}); // mensagem ao focar o campo do formul�rio	
	$('#assunto').tooltip({title: "Preenchimento obrigat�rio", trigger: "focus", placement: "bottom"}); // mensagem ao focar o campo do formul�rio	
	$('#comentarios').tooltip({title: "Preenchimento obrigat�rio", trigger: "focus", placement: "top"}); // mensagem ao focar o campo do formul�rio	
	
	// no load
    $("#itens_menu01 li a").addClass("inativo");  // marca todos os itens	como inativos
	$("#itens_menu01 li a:first").removeClass("inativo");  // remove inativo do primeiro item 
	$("#itens_menu01 li a:first").addClass("ativo");  // marca o primeiro item como ativo	
	
  // Add scrollspy to <body>
  //$('body').scrollspy({target: "#cabecalho", offset: 50});   
  //$('#div02').scrollspy({target: "#cabecalho", offset: 50});

  
  // Add smooth scrolling on all links inside the navbar
  $("#itens_menu01 a").on('click', function(event) {
  
	// no click
	    $("#itens_menu01 li a").removeClass("ativo");  // remove ativo de todos os itens. S� 1 est� ativo mas n�o sei qual	
		$("#itens_menu01 li a").addClass("inativo");   // marca todos os itens como inativos
		$(this).removeClass("inativo");  			 // remove inativo do item clicado	
		$(this).addClass("ativo");  				 // marca o item clicado como ativo		


  /*
  alert("altura cabecalho = " + document.getElementById("#cabecalho").style.height);
  alert("altura div03 = " + document.getElementById("#div03").style.height);
  alert("altura nada = " + document.getElementById("#nada").style.height);
  alert("altura home = " + document.getElementById("#home").style.height);
  alert("altura empresa = " + document.getElementById("#empresa").style.height);
  */
  
	
    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;  // recupera nome do item atual

	if (hash != "#produtos") {
	    $("#menu02").removeClass("posfixed");  // remove 
	    $("#menu02").addClass("posrelative");  // deixa o menu mymenu02 flutuar
	}	
 	else {
	    $("#menu02").removeClass("posrelative");  // remove
	    $("#menu02").addClass("posfixed");  // deixa o menu mymenu02 fixo
  		$("#menu02 a:first").trigger('click');  // direciona para o primeiro item do mymenu02 e n�o executa o efeito do scroll. Isto porque este item tem submenu
		return;
	}

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (1800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
		scrollTop: $(hash).offset().top
    }, 1800, function(){
   
		// Add hash (#) to URL when done scrolling (default click behavior)
		window.location.hash = hash;
	
		//$(hash).hide();
		//$(hash).show(1800);
			
		//$(hash).fadeOut();
		//$(hash).fadeIn(1800)
	  
    });
  });
  
   // Add smooth scrolling on all links inside the navbar
  $("#menu02 a").on('click', function(event) {
  
	$("#itens_menu02 li a").removeClass("ativo");  // remove ativo de todos os itens. S� 1 est� ativo mas n�o sei qual	
	$("#itens_menu02 li a").addClass("inativo");   // marca todos os itens como inativos
	$(this).removeClass("inativo");  			 // remove inativo do item clicado	
	$(this).addClass("ativo");  				 // marca o item clicado como ativo	
  
    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;  // recupera nome do item atual

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (1800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
      //scrollLeft: $(hash).offset().top
    }, 1800, function(){
   
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  }); 
	
    $("#validaform").on('click', function(event) {
		var enviar = 1;
		if ($("#nome").val().length < 1){
			var enviar = 0;
			$("#nome").focus();		
		}
		if ($("#email").val().length < 1){
			var enviar = 0;
			$("#email").focus();		
		}
		if ($("#assunto").val().length < 1){
			var enviar = 0;
			$("#assunto").focus();		
		}
		if ($("#comentarios").val().length < 1){
			var enviar = 0;
			$("#comentarios").focus();		
		}
		if (enviar == 1) {   // campos preenchidos. Formulario sera enviado
		
			// Monta string com dados do email
			var dadosEmail = $("#nome").val() + "/" + $("#wempresa").val() + "/" +  $("#telefone").val() + "/" + $("#email").val() + "/" + $("#assunto").val() + "/" + $("#comentarios").val();

			      // substitui o parametro ficticio pelo real, montando a url completa
			url_send_Email = rota_send_Email.replace("@!**!@/@!**!@/@!**!@/@!**!@/@!**!@/@!**!@",dadosEmail);
							
			var request = $.post(url_send_Email);
			request.success(function(result) {
				alert ("result = " + result);
				var user_message = JSON.parse(result);   // Converte JSon em object JavaScript
			// gerar mensagem na tela
			});
			request.error(function(jqXHR, textStatus, errorThrown) {
				alert("Problema no acesso ao servidor: textStatus = " + textStatus + " - errorThrown = " + errorThrown);
			});
		}
	});
 
});

