$(document).ready(function () {
  EventosMyjs();
});

function EventosMyjs(){    
    $( "#datepicker" ).datepicker({
        dateFormat: "dd-mm-yy",
        onSelect: function(date) {
            hrnodisponible();
            setHrefReservas();
        }
    });
}



function validarHoraReserva(obj, id){    
    var allObj = $('#'+id).find("input:checked");
    console.log(allObj.length);     
     if(allObj.length>2){
         alert("Solo puede seleccionar 2 horas consecutivas");
         $(obj).prop("checked", false);
         RemoverHorasConsecutivas(id,true);
     }else if(allObj.length>1){         
        var chkDesde = $(allObj[0]);
        var chkHasta = $(allObj[1]);     
        var valueDesde = chkDesde.val();
        var valueHasta = chkHasta.val();

        if(valueHasta-valueDesde>1){
            alert("Las horas tienen que ser consecutivas");
            $(chkHasta).prop("checked", false);
            RemoverHorasConsecutivas(id,true);
        }
        else if(allObj.length == 2){
            RemoverHorasConsecutivas(id,false);         
            setHrefReservas();
        }
     }

}


function setHrefReservas(){    
    var active = $('label[class*=active]');
    if (!active.hasClass('btn-danger')){
        if (active.length > 0 ){
            var a= $('#reservaBoton');
            var urlbase = a.attr('urlbase');
            $fechareserva= $.datepicker.formatDate('yy-mm-dd',$('#datepicker').datepicker('getDate'));    
            var checboxs = active.find("input:checked");
            var id = $(active[0]).attr('id').split('_')[0];    
            var valueDesde = $(checboxs[0]).val();
            var valueHasta = $(checboxs[1]).val();
            if (!valueHasta) valueHasta  = 0;
            var valuesUrl = urlbase+`?idPista=${id}&desde=${valueDesde}&hasta=${valueHasta}&fechareserva=${$fechareserva}`;       
            a.attr('href', valuesUrl);
            console.log(a.attr('href'));
            console.log(valuesUrl);
        }    
    }   
}

function RemoverHorasConsecutivas(id, soloPista){
    var auxAllObj = $('#'+id).find(".active");
    var auxDesde = $(auxAllObj[0]).attr('id');
    var auxHasta = $(auxAllObj[1]).attr('id');
    var objDesde;
    var objHasta; 
    if (soloPista){
        $('#'+id).find('label[class*=active]').removeClass('active');    
    }
    else {
        $('label[class*=active]').removeClass('active');
        $('input:checked').removeAttr('checked');        
    }
    objDesde = $('#'+auxDesde);
    objHasta = $('#'+auxHasta);
    objDesde.addClass('active');
    objHasta.addClass('active');
    objDesde.find('input').prop('checked',true);
    objHasta.find('input').prop('checked',true);

}

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

function hrnodisponible(){
    var idclub = $('#reservaBoton').attr('idclub');
    var fechareserva= $.datepicker.formatDate('yy-mm-dd',$('#datepicker').datepicker('getDate'));  ;
    $.ajax({
        type: "POST",
        url: "/hrnodisponible",
        data: {'idclub': idclub , 'fechareserva':fechareserva },
        dataType: "json",
        success: function (response) {                     
           marcarReserva(response);
        }
    });
}

function marcarReserva(obj){
    var labels = $('label[class*=btn-danger]');
    labels.addClass('btn-primary');
    labels.removeClass('btn-danger');    
    labels.find('input').prop('checked',false);           
    Object.keys(obj.list).forEach(pista =>{        
        horas = obj.list[pista];             
        $(horas).each(function(index) {
            var lbl = $('#'+pista+'_'+this)
            lbl.addClass('btn-danger');
            lbl.find('input').prop('checked',true);           
        });                        
    })    
}

function vuelta(){   	
    window.location.replace("reservarpista.com");
}