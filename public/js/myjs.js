$(document).ready(function () {
  
});

function getComunidades(){
    var admin1code = $('#autonomia');
    //var provincias = $('#provincias');
    admin1code.html('');
    admin1code.append(`<option value="">Seleccione comunidad</option>`)
    //admin1code.attr('disabled',"disabled");
    var poblacion = inicializarPoblacion();

    $.ajax({
        type: "POST",
        url: "/listadoccaa",
        /* data: {'admin1code': admin1code}, */
        dataType: "json",
        success: function (response) {          
            $( response.listComunidades ).each(function( index ) {                
                admin1code.append(`<option value="${this.admin1code}">${this.name}</option>`)
            });
            admin1code.removeAttr('disabled');
            $('select').niceSelect('update');
            //$('#provincias').append(`<option value="${response.admin2code}">${response.name}</option>`)
        }
    });
}

function getProvincias(){
    var admin1code = $('#autonomia').val();
    var provincias = $('#provincias');
    provincias.html('');
    provincias.append(`<option value="">Seleccione provincia</option>`)
    provincias.attr('disabled',"disabled");
    var poblacion = inicializarPoblacion();

    $.ajax({
        type: "POST",
        url: "/listadopro",
        data: {'admin1code': admin1code},
        dataType: "json",
        success: function (response) {          
            $( response.listProvincias ).each(function( index ) {                
                provincias.append(`<option value="${this.admin2code}">${this.name}</option>`)
            });
            provincias.removeAttr('disabled');
            $('select').niceSelect('update');
            //$('#provincias').append(`<option value="${response.admin2code}">${response.name}</option>`)
        }
    });
}

function getPoblacion(){
    var admin1code = $('#autonomia').val();
    var admin2code = $('#provincias').val();
    var poblacion = inicializarPoblacion();
    $.ajax({
        type: "POST",
        url: "/listadopobla",
        data: {'admin1code': admin1code, 'admin2code': admin2code},
        dataType: "json",
        success: function (response) {
            poblacion.html("");
            $( response.listPoblacion ).each(function( index ) {
                poblacion.append(`<option value="${this.admin3code}">${this.name}</option>`)
            });
            poblacion.removeAttr('disabled');
            $('select').niceSelect('update');
        }
    });
}

function inicializarPoblacion(){
    var poblacion = $('#poblacion');
    poblacion.html('');
    poblacion.append(`<option value="">Seleccione poblacion</option>`)
    poblacion.attr('disabled',"disabled");

    return poblacion;
}