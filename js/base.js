var num = 1;
var pagina = "conozcanos";
var btn_active = 1;
var panorama_width = 970;
var isMobile = window.orientation > -1;

$(document).ready(function(){
    
    var div = $(".panorama").find('.visible');
    var touchX = 0;

    document.getElementById('panorama').addEventListener('touchstart', dragstart, false);
    document.getElementById('panorama').addEventListener('touchmove', dragmove, false);

    function dragmove(e){
        console.log("DRAG MOVE");
        var move = touchX - e.touches[0].pageX;
        touchX = e.touches[0].pageX;
        var panorama_width = (parseInt($(window).width() * 0.92) > 970) ? 970 : parseInt($(window).width() * 0.92) ;
        var left_max = panorama_width - div.width();
        var left = div.position().left - move;
        if(left <= 0 && left > left_max){
            div.css('left', Math.ceil(left)+"px");
        }
        e.preventDefault();
    }
    function dragstart(e){
        touchX = e.touches[0].pageX;
    }

    $('.punto').click(function(){
        var rel = $(this).attr('rel');
        $(this).parent().removeClass('visible');
        div = $(".panorama").find('.pan').eq(rel);
        div.addClass('visible');
    });
    if(!isMobile){
        $(".panorama").mousemove(function(event){
            var panorama_width = (parseInt($(window).width() * 0.92) > 970) ? 970 : parseInt($(window).width() * 0.92) ;
            var j = (event.pageX - ($(window).width() - panorama_width)/2)/panorama_width;
            var left = (panorama_width - div.width())*j;
            div.css('left', left+"px");
        });
    }
    ordernarContenido();
    $(window).resize(function() {
        ordernarContenido();
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
        history.pushState(null, 'Contacto', path+'contacto/');
        return false;
    });
    $('.btnhorarios').click(function(){
        aparece('horarios');
        history.pushState(null, 'Horarios', path+'horarios/');
        return false;
    });
    $('.btnpropuesta').click(function(){
        aparece('propuestaeducativa');
        history.pushState(null, 'Propuesta Educativa', path+'propuesta-educativa/');
        return false;
    });
    $('.btnconozcanos').click(function(){
        aparece('conozcanos');
        history.pushState(null, 'Conozcanos', path+'conozcanos/');
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

    google.maps.event.addDomListener(window, 'load', initialize);
    
});


$(window).on('popstate', function(e){

    var back = window.location.href.split('/');
    if(back[3] == "conozcanos"){
        aparece('conozcanos');
    }
    if(back[3] == "propuestaeducativa"){
        aparece('propuestaeducativa');
    }
    if(back[3] == "horarios"){
        aparece('horarios');
    }
    if(back[3] == "contacto"){
        aparece('contacto');
    }

});


function ordernarContenido(){

    var width = (parseInt($(window).width() * 0.92) > 970) ? 970 : parseInt($(window).width() * 0.92) ;
    panorama_width = width;
    $('.panorama').find('.pan').each(function(){
        if($(this).hasClass('.imgpan')){
            if(width < $(this).width()){
                var left = -(($(this).width() - width)/2);
                $(this).css({ left: left+"px"});
            }
        }
    });
}
function cloud(x){

    $('.cloud'+x).css({top: randomInt(40, 250)+"px", opacity: randomFloat(0.6, 1), transform: 'scale('+randomFloat(0.7, 1.1)+')'});
    $('.cloud'+x).animate({
        left: "-200px"
    }, randomInt(2500, 3500), function() {
        $(this).css({right: '-200px', left: null});
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
function initialize(){
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
