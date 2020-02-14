$(document).ready(function(){
    
    var left = 0;
    var panorama_width = 970;
    var min = 0;
    var max = 0;
    var ww = $(window).width();
    var div = $(".panorama").find('.visible');
    var hh = $(window).height();
    
    var backright = (ww - 970)/2 + 20;
    var backbottom = (hh - 470)/2 + 20;
    
    $('.back').css({bottom: backbottom, right: backright});
    
    $('.punto').click(function(){
        
        var rel = $(this).attr('rel');
        $(this).parent().removeClass('visible');
        div = $(".panorama").find('.pan').eq(rel);
        div.addClass('visible');
        max = div.find('.img').width() - 970;
                    
    });
    
        
    $(".panorama").mousemove(function( event ){
        
        var x = (event.pageX - parseInt((ww - 1000)/2) - panorama_width/2)/5;
        var diff = (max - min)/2;
        var left = -(diff + (diff * x)/100);
        div.css('left', left+"px");
        
    });
    
    $('.imgp').click(function(){
        
        var src = $(this).attr('src');
        $(this).parents('.pan').find('.imgx').attr('src', src);
        
    });
    
    $('#send').click(function(){
        
        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var telefono = $('#telefono').val();
        var mensaje = $('#texto').val();
        
        var send = {accion: "enviar", nombre: nombre, correo: correo, telefono: telefono, mensaje: mensaje};
        $.ajax({
            dataType: "json",
            url: "send.php",
            type: "POST",
            data: send,
            success: function(data){
                
                if(data.op == 1){
                    $('#msg_result').css({color: 'green'});
                    $('#msg_result').html("Mensaje Enviado");
                    $('#nombre').val("");
                    $('#correo').val("");
                    $('#telefono').val("");
                    $('#texto').val("");
                }
                if(data.op == 2){
                    $('#msg_result').css({color: 'red'});
                    $('#msg_result').html(data.msj);
                }

            },
            error: function(err, e){
                console.log(err);
                console.log(e);
            }
        });
        
    });
    

    $('.btncontacto').click(function(){
        aparece('contacto');
        return false;
    });
    $('.btnhorarios').click(function(){
        aparece('horarios');
        return false;
    });
    $('.btnpropuesta').click(function(){
        aparece('propuestaeducativa');
        return false;
    });
    $('.btnconozcanos').click(function(){
        aparece('conozcanos');
        return false;
    });
    
});


function aparece(pag){
    desaparece();
    $( "."+pag ).css({top: "100px"});
    $( "."+pag ).animate({
        top: "0px",
        opacity: 1
    }, 1000, function() {
        $('#pagina').val(pag);
    });
    $(".info").animate({
        backgroundColor: "#ff0"
    }, 1000);
    
}
function desaparece(){
    var pag = $('#pagina').val();
    $( "."+pag ).animate({
        top: "100px",
        opacity: 0
    }, 1000, function() {
        $( "."+pag ).css({top: "500px"});
    });
}