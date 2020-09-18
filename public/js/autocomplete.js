 var objBuscar;
 $(document).ready(function () {    
    InicialiceAutocomplete();
    
    EventosAutoComplete();        
});

function  InicialiceAutocomplete(){
    $("#auComplete").autocomplete({
        source: function (request, response) {                    
            $.ajax({
                url: "/busqueda",                       
                method:"POST",
                data: {
                    texto: $('#auComplete').val()
                }
            })                   
            .done(function( result ) {
            response($.map(result.texto, function(item){
                 //console.log(item);
                    return {label: item.textobusqueda, value: item.textobusqueda, obj: item}
            }));    
            });
        },
        minLength: 3,
        select: function (event, ui) {            
            objBuscar = ui.item.obj;
            //console.log(objBuscar);
        }   
    });

    $( "#datepickerAux" ).datepicker({
        dateFormat: "dd-mm-yy",
        onSelect: function (dateText, inst) {
            hrnodisponibleAutocomplete();
        }
    });

    $("#horadesde").change(function() {
        console.log($(this).val());
    });

    $("#horahasta").change(function() {
        console.log($(this).val());
    });
}               

function EventosAutoComplete(){


}

function validarHora(){
    var valuedesde = $('#horadesde').val();
    //var valuehasta = $('#horahasta').val(8;

    $("#horahasta").find("option").removeAttr("disabled");        
    for (let index = 8; index <= valuedesde; index++) {        
        $("#hh"+index).attr('disabled',"disabled");        
    }        
    $("#horahasta").val(parseInt(valuedesde)+1);

    $('select').niceSelect('update');        
}

function buscar(){
    console.log(objBuscar);
    if (objBuscar.tipo=="C"){
       location.replace("http://reservarpista.com/detalles/club/"+objBuscar.idclub);
    }
}

// function hrnodisponibleAutocomplete(){
//     var idclub = objBuscar.idclub;
//     var fechareserva= $.datepicker.formatDate('yy-mm-dd',$('#datepickerAux').datepicker('getDate'));  ;
//     $.ajax({
//         type: "POST",
//         url: "/hrnodisponible",
//         data: {'idclub': idclub , 'fechareserva':fechareserva },
//         dataType: "json",
//         success: function (response) {     
//             console.log(response);
//             marcarReservaAutocomplete(response);
//         }
//     });
// }

// function marcarReservaAutocomplete(obj){
//     var labels = $('label[class*=btn-danger]');
//     labels.addClass('btn-primary');
//     labels.removeClass('btn-danger');    
//     labels.find('input').prop('checked',false);           
//     Object.keys(obj.list).forEach(pista =>{        
//         horas = obj.list[pista];             
//         $(horas).each(function(index) {
//             var lbl = $('#'+pista+'_'+this)
//             lbl.addClass('btn-danger');
//             lbl.find('input').prop('checked',true);           
//         });                        
//     })    
// }