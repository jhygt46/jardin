var num = 1;
var btn_active = 1;

function x(){
    var diff = $('.web').height() - $('.contenido').height();
    if(diff < 0){
        $('.contenido').css({ "padding-top": "0px" });
    }else{
        $('.contenido').css({ "padding-top": parseInt(diff / 2) + "px" });
    }
}
function calc(w, p, max, min = null){

    var aux = w * p / 100;
    if(aux > max){
        return max;
    }else{
        if(min != null && aux < min){
            return min;
        }else{
            return aux;
        }
    }

}
function y(){

    var width = $(window).width();
    var height = $(window).height();
    var w = calc(width, 98, 800);
    if($('.curso').hasClass("in")){
        var h = calc(height, 98, 550, 400);
    }else{
        var h = calc(height, 98, 550);
    }

    var aux_w = (width - w) / 2;
    if(aux_w < 4){ aux_w = 4 }

    var aux_h = (height - h) / 2;
    if(aux_h < 4){ aux_h = 4 }

    $('.curso').css({ "width": w + "px", "height": h + "px", "margin-left": aux_w + "px", "margin-top": aux_h + "px", "margin-right": aux_w + "px", "margin-bottom": aux_h + "px" });

}
$(window).resize(function() {
    x();
    y();
    if(resize.id > 0){
        loadApp(resize.id, resize.ancho, resize.alto);
    }
});
$(document).ready(function(){

    x();
    y();
    //start_cursos();
    $('#send').click(function(){
        
        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var telefono = $('#telefono').val();
        var mensaje = $('#texto').val();
        
        var send = { accion: "enviar", nombre: nombre, correo: correo, telefono: telefono, mensaje: mensaje };
        
        $.ajax({
            dataType: "json",
            url: "/send",
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
        history.pushState(null, 'Contacto', path+'contacto');
        close_menu();
        return false;
    });
    $('.btnhorarios').click(function(){
        aparece('horarios');
        history.pushState(null, 'Horarios', path+'horarios');
        close_menu();
        return false;
    });
    $('.btnpropuesta').click(function(){
        aparece('propuestaeducativa');
        history.pushState(null, 'Propuesta Educativa', path+'propuesta-educativa');
        close_menu();
        return false;
    });
    $('.btnconozcanos').click(function(){
        aparece('conozcanos');
        history.pushState(null, 'Conozcanos', path+'conozcanos');
        close_menu();
        return false;
    });
    $('.clouds').find('.cloud').each(function(){
        var x = num;
        setTimeout(function(){ cloud(x); }, num*700);
        num++;
    });
    $('.btn_menu').click(function(){
        var menu = $(this).parent();
        if(menu.position().left == -260){
            $(menu).animate({
                left: "0px"
            }, 750);
            $(this).animate({
                right: "25px"
            }, 750);
        }
        if(menu.position().left == 0){
            $(menu).animate({
                left: "-260px"
            }, 750);
            $(this).animate({
                right: "-55px"
            }, 750);
        }
    });
    
});
$(window).on('popstate', function(e){

    var back = window.location.href.split('/');
    if(back[2] == "localhost"){
        var pagina = back[4];
    }else{
        var pagina = back[3];
    }
    if(pagina == "conozcanos" || pagina == ""){
        aparece('conozcanos');
    }
    if(pagina == "propuesta-educativa"){
        aparece('propuestaeducativa');
    }
    if(pagina == "horarios"){
        aparece('horarios');
    }
    if(pagina == "contacto"){
        aparece('contacto');
    }

});
function close_menu(){
    var menu = $('.menu_web');
    if(menu.position().left == 0){
        $(menu).animate({
            left: "-260px"
        }, 750);
        $('.btn_menu').animate({
            right: "-55px"
        }, 750);
    }
}
function cloud(x){

    $('.cloud'+x).css({top: randomInt(40, 250)+"px", opacity: randomFloat(0.6, 1), transform: 'scale('+randomFloat(0.7, 1.1)+')'});
    $('.cloud'+x).animate({
        left: "-200px"
    }, randomInt(4500, 6500), function() {
        $(this).css({left: ($(window).width() + 200) + 'px'});
        cloud(x);
    });

}
function randomInt(min, max) {
	return min + Math.floor((max - min) * Math.random());
}
function randomFloat(min, max) {
    return min + (max - min) * Math.random();
}
function aparece(pag){
    if(pag != pagina && btn_active == 1){
        btn_active = 0;
        desaparece();
        $("."+pag).css({top: "100px"});
        $("."+pag).animate({
            top: "0px",
            opacity: 1
        }, 1000, function() {
            pagina = pag;
            btn_active = 1;
        });
    }
}
function desaparece(){
    var pag = pagina;
    $("."+pag).animate({
        top: "100px",
        opacity: 0
    }, 1000, function() {
        $("."+pag ).css({top: "500px"});
    });
}
function initMap(){

    var myCenter = new google.maps.LatLng(-33.480455,-70.5534333);
    var mapProp = {
        center: myCenter,
        zoom: 15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("mapa"), mapProp);
    var marker = new google.maps.Marker({
        position: myCenter,
    });
    marker.setMap(map);
    
}
