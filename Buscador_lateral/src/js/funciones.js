/* JQUERY PARA CONTROL DEL MENÚ DEL BUSCADOR */
/* 14-01-16 MMR */

function oculta_series() {
    'use strict';
    document.getElementById("menu_busca_series").style.display = 'none';
    document.getElementById("menu_busca_productos").style.display = 'block';
}

function oculta_productos() {
    'use strict';
    document.getElementById("menu_busca_productos").style.display = 'none';
    document.getElementById("menu_busca_series").style.display = 'block';
}


function showLightbox() {
    'use strict';
    document.getElementById('over').style.display = 'block';
    document.getElementById('fade').style.display = 'block';
}
function hideLightbox() {
    'use strict';
    document.getElementById('over').style.display = 'none';
    document.getElementById('fade').style.display = 'none';
}

/*Scripts especiales*/

function fetch_select(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'fetch_data.php',
        data: {
            get_option: val
        },
        success: function (response) {
            document.getElementById("select_modelo").innerHTML = response;
        }
    });
}

function fetch_select_modelo(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'fetch_data_modelo.php',
        data: {
            get_option_medidas: val
        },
        success: function (response) {
            document.getElementById("select_medidas").innerHTML = response;
        }
    });
}

function fetch_select_medidas(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'fetch_data_medidas.php',
        data: {
            get_option_color: val
        },
        success: function (response) {
            document.getElementById("select_color").innerHTML = response;
        }
    });
}

function fetch_select_producto(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'fetch_data_producto.php',
        data: {
            get_option_producto: val
        },
        success: function (response) {
            document.getElementById("select_producto").innerHTML = response;
            /* Este segundo innerHTML es para modificar el label de la opción, con val coge el
            * valor que queremos
            */
            document.getElementById("label_producto").innerHTML = val;
        }
    });
}

function buscador_lateral_producto(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'buscador_lateral_producto.php',
        data: {
            get_option_productos: val
        },
        success: function (response) {
            document.getElementById("resultadosbusqueda").innerHTML = response;
        }
    });
}

function buscador_lateral_series(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'buscador_lateral_series.php',
        data: {
            get_option_color: val
        },
        success: function (response) {
            document.getElementById("resultadosbusqueda").innerHTML = response;
        }
    });
}

function buscador_lateral_modelos(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'buscador_lateral_modelos.php',
        data: {
            get_option_color: val
        },
        success: function (response) {
            document.getElementById("resultadosbusqueda").innerHTML = response;
        }
    });
}

function buscador_lateral_medidas(val) {
    'use strict';
    $.ajax({
        type: 'post',
        url: 'buscador_lateral_medidas.php',
        data: {
            get_option_color: val
        },
        success: function (response) {
            document.getElementById("resultadosbusqueda").innerHTML = response;
        }
    });
}


/* FUNCIÓN PARA OCULTAR EL DISPLAY DE PAGINACIÓN DE RESULTADOS CUANDO ES BUSQUEDA POR OPCIONES */
/* 01-02-2016 MMR */

function ocultar_paginador() {
    'use strict';
    document.getElementById("paginacion").style.display = 'none';
}
