$(document).ready(function(){
	        	/* MENUTIPOLOGIA Y MENUCERRARTIPO SON LOS MENÚS QUE FUNCIONAN BIEN */
	            $("#menueco1").click(function(event){
	                event.preventDefault();
	                $("#menueco1").hide();
	                $("#menucerrareco1").show();
	                $("#menuemergente1").show("slow");
	                $("#menuemergente2").hide("slow");
	                $("#menuemergente3").hide("slow");
	            });

	            $("#menucerrareco1").click(function(event){
	                event.preventDefault();
	                $("#menueco1").show();
	                $("#menucerrareco1").hide();
	                $("#menuemergente1").hide("slow");
	            });
/* INACTIVOS POR EL MOMENTO */
	            $("#menueco2").click(function(event){
	                event.preventDefault();
	                $("#menueco2").hide();
	                $("#menucerrareco2").show();
	                $("#menuemergente1").css("visibility", "hidden");
	                $("#menuemergente3").css("visibility", "visible");
	                $("#menuemergente3").css('display', 'inline-block');
	                $("#menuemergente3").show("slow");

	            });
/*
	            $("#menucerrareco2").click(function(event){
	                event.preventDefault();
	                $("#menueco2").show();
	                $("#menucerrareco2").hide();
	                $("#menuemergente2").hide("slow");
	            });*/

	            $("#menueco3").click(function(event){
	                event.preventDefault();
	                $("#menueco3").hide();
	                $("#menucerrareco3").show();
	                $("#menuemergente1").css("visibility", "hidden");
	                $("#menuemergente3").css("visibility", "hidden");
	                $("#menuemergente2").css("visibility", "visible");
	                $("#menuemergente2").css('display', 'inline-block');
	                $("#menuemergente2").show("slow");
	            });
/*
	            $("#menucerrareco3").click(function(event){
	                event.preventDefault();
	                $("#menueco3").show();
	                $("#menucerrareco3").hide();
	                $("#menuemergente3").hide("slow");
	            });

	            				*/
			});
