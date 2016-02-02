/* EMPRESA.JS POR MARCOS */
/* CONTROL DE DESPLEGABLES EN MENÚS */
$(document).ready(function(){

    $("#ocultarhistoria").click(function(event){
	   event.preventDefault();
	   $("#mostrarhistoria").show();
	   $("#ocultarhistoria").hide();
	   $("#historia2").hide(500);
    });

	$("#mostrarhistoria").click(function(event){
        event.preventDefault();
	    $("#ocultarhistoria").show();
	    $("#mostrarhistoria").hide();
	    $("#reconocimientos2").hide();
	    $("#premios").hide();
	    $("#historia2").show(500);
    });

	$("#mostrareco").click(function(event){
        event.preventDefault();
	    $("#ocultareco").show();
	    $("#mostrareco").hide();
	    $("#historia2").hide();
	    $("#reconocimientos2").show(500);
	    $("#premios").show(500);
    });

	$("#ocultareco").click(function(event){
	    event.preventDefault();
	    $("#mostrareco").show();
	    $("#ocultareco").hide();
	    $("#reconocimientos2").hide(500);
	    $("#premios").hide(500);
    });
});
