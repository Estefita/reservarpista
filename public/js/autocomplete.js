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
                // console.log(item);
                    return {label: item.textobusqueda, value: item.textobusqueda, obj: item}
            }));    
            });
        },
        minLength: 3,
        select: function (event, ui) {            
            objBuscar = ui.item.obj;
        }   
    });

    $( "#datepicker" ).datepicker({
        dateFormat: "dd-mm-yy"
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