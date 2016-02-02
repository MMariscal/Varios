/* FICHERO QUE OCULTA / MUESTRA PRODUCTOS */
/* BY MARCOS MARISCAL, ULTIMA REVISIÓN 29/01/2016 */

$(document).ready(function(){
 	/* MENUTIPOLOGIA Y MENUCERRARTIPO SON LOS MENÚS QUE FUNCIONAN BIEN */
    $("#menutipologiabis").click(function(event){
        event.preventDefault();
        $("#menutipologia").show();
        $("#menutipologiabis").hide();
        $("#cottos").hide("slow");
        $("#maderas").hide("slow");
        $("#piedras").hide("slow");
        $("#hidraulico").hide("slow");
        $("#formas").hide("slow");
        $("#artesanal").hide("slow");
        $("#tradicional").hide("slow");
    });

    $("#menutipologia").click(function(event){
        event.preventDefault();
        $("#menucerrartipo").show();
        $("#menutipologia").hide();
        $("#menutipologiabis").hide();
        $("#cuerpo").css('height', '1500')
        $("#cottos").show("slow");
        $("#maderas").show("slow");
        $("#piedras").show("slow");
        $("#hidraulico").show("slow");
        $("#formas").show("slow");
        $("#artesanal").show("slow");
        $("#tradicional").show("slow");
        $("#menuestancias").show();
        $("#menucerrarestancias").hide();
        $("#cocina").hide("slow");
        $("#baño").hide("slow");
        $("#revinterior").hide("slow");
        $("#pavinterior").hide("slow");
        $("#pavexterior").hide("slow");
        $("#pavintext").hide("slow");
        $("#piscinas").hide("slow");
        $("#sepambientes").hide("slow");
        $("#industrial").hide("slow");
        $("#comercio").hide("slow");
        $("#fachadas").hide("slow");
        $("#jardines").hide("slow");
        $("#menuseries").show();
        $("#menucerrarseries").hide();
        $("#fusion").hide("slow");
        $("#manuale").hide("slow");
        $("#quater").hide("slow");
        $("#tandem").hide("slow");
        $("#timber").hide("slow");
        $("#travertino").hide("slow");
     });

    $("#menucerrartipo").click(function(event){
        event.preventDefault();
        $("#menutipologia").show();
        $("#menucerrartipo").hide();
        $("#cottos").hide("slow");
        $("#maderas").hide("slow");
        $("#piedras").hide("slow");
        $("#hidraulico").hide("slow");
        $("#formas").hide("slow");
        $("#artesanal").hide("slow");
        $("#tradicional").hide("slow");
    });

    $("#menuestancias").click(function(event){
        event.preventDefault();
        // $("#aplicacion").css("background-color", "grey");
        /* PRUEBA DE ESCONDER TODO EL DIV ENTERO Y AHORRAR COMANDOS */
        /*
         *  PODRÍA PONER UN SÓLO DIV, PERO EL EFECTO QUE HACE ABRIENDO
         *  TODOS ES BASTANTE AGRADABLE Y NO MERECE LA PENA CAMBIARLO
         */
        $("#menucerrarestancias").show();
        $("#menuestancias").hide();
        $("#estanciasmenu").css('display', 'flex');
        $("#cuerpo").css('height', '1830')
        $("#tipo.posts").css("height", "0");
        $("#series.posts").css("height", "0");
        $("#cocina").show("slow");
        $("#baño").show("slow");
        $("#revinterior").show("slow");
        $("#pavinterior").show("slow");
        $("#pavexterior").show("slow");
        $("#pavintext").show("slow");
        $("#piscinas").show("slow");
        $("#sepambientes").show("slow");
        $("#industrial").show("slow");
        $("#comercio").show("slow");
        $("#fachadas").show("slow");
        $("#jardines").show("slow");
        $("#menutipologiabis").hide();
        $("#menutipologia").show();
        $("#menucerrartipo").hide();
        $("#cottos").hide("slow");
        $("#maderas").hide("slow");
        $("#piedras").hide("slow");
        $("#hidraulico").hide("slow");
        $("#formas").hide("slow");
        $("#artesanal").hide("slow");
        $("#tradicional").hide("slow");
        $("#menuseries").show();
        $("#menucerrarseries").hide();
        $("#fusion").hide("slow");
        $("#manuale").hide("slow");
        $("#quater").hide("slow");
        $("#tandem").hide("slow");
        $("#timber").hide("slow");
        $("#travertino").hide("slow");
    });

    $("#menucerrarestancias").click(function(event){
        event.preventDefault();
        $("#menuestancias").show();
        $("#menucerrarestancias").hide();
        $("#estanciasmenu").css('display', 'none');
        $("#cocina").hide("slow");
        $("#baño").hide("slow");
        $("#revinterior").hide("slow");
        $("#pavinterior").hide("slow");
        $("#pavexterior").hide("slow");
        $("#pavintext").hide("slow");
        $("#piscinas").hide("slow");
        $("#sepambientes").hide("slow");
        $("#industrial").hide("slow");
        $("#comercio").hide("slow");
        $("#fachadas").hide("slow");
        $("#jardines").hide("slow");
    });

    $("#menuseries").click(function(event){
        event.preventDefault();
        $("#menuseries").hide();
        $("#menucerrarseries").show();
        /* ESTE FUNCIONA MAS O MENOS */
        $("#seriesdespliegue").css('display', 'flex');
        $("#cuerpo").css('height', '1180')
        $("#tipo.posts").css('height', '0');
        $("#estanciasmenu.posts").css('height', '0');
        $("#fusion").show("slow");
        $("#manuale").show("slow");
        $("#quater").show("slow");
        $("#tandem").show("slow");
        $("#timber").show("slow");
        $("#travertino").show("slow");
        $("#menutipologiabis").hide();
        $("#menutipologia").show();
        $("#menucerrartipo").hide();
        $("#cottos").hide("slow");
        $("#maderas").hide("slow");
        $("#piedras").hide("slow");
        $("#hidraulico").hide("slow");
        $("#formas").hide("slow");
        $("#artesanal").hide("slow");
        $("#tradicional").hide("slow");
        $("#menuestancias").show();
        $("#menucerrarestancias").hide();
        $("#cocina").hide("slow");
        $("#baño").hide("slow");
        $("#revinterior").hide("slow");
        $("#pavinterior").hide("slow");
        $("#pavexterior").hide("slow");
        $("#pavintext").hide("slow");
        $("#piscinas").hide("slow");
        $("#sepambientes").hide("slow");
        $("#industrial").hide("slow");
        $("#comercio").hide("slow");
        $("#fachadas").hide("slow");
        $("#jardines").hide("slow");
    });
    $("#menucerrarseries").click(function(event){
        event.preventDefault();
        $("#menuseries").show();
        $("#menucerrarseries").hide();
        $("#seriesdespliegue").css('display', 'none');
        $("#fusion").hide("slow");
        $("#manuale").hide("slow");
        $("#quater").hide("slow");
        $("#tandem").hide("slow");
        $("#timber").hide("slow");
        $("#travertino").hide("slow");
    });
});
