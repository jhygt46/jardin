var flip_arr = [];
var sala_seleccionada = 0;
var player;

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady(){
    player = new YT.Player('player', {
        height: '360',
        width: '640',
        videoId: '',
        playerVars: { 
            'autoplay': 1,
            'controls': 0, 
            'rel' : 0,
            'fs' : 1,
            'loop': 1,
            'showinfo': 0,
            'modestbranding': 0
        },
        events: {
            onReady: onPlayerReady,
            onStateChange: onPlayerStateChange
        }
    });
}
function onPlayerReady(event){
    video_duration = event.target.getDuration();
}
function onPlayerStateChange(event){
    if(event.data == YT.PlayerState.PLAYING){
    }
    if(event.data == YT.PlayerState.ENDED){
    }
    if(event.data == YT.PlayerState.PAUSED){
    }
    if(event.data == YT.PlayerState.UNSTARTED){
    }
    if(event.data == YT.PlayerState.BUFFERING){
    }
    if(event.data == YT.PlayerState.CUED){
    }
}
function play_youtube(v_code){

    $(".curso_lista").animate({
        right: "-150px",
    }, 1000);

    $('.cuentos').hide();
    $('#player').show();
    $('.trabajos').hide();

    player.loadVideoById(v_code);
    player.playVideo();
}
function start_cursos(){
    $(".curso_online").show();
    curso_paso_1();
}
function curso_paso_1(){
    $(".curso_online .hada").animate({
        left: "15px",
        opacity: 1
    }, 2000);
    $(".curso_online .mensaje").animate({
        top: "25px",
        opacity: 1
    }, 1500);
    setTimeout(function(){
        $(".curso_online .ver_cursos").animate({
            bottom: "25px",
            opacity: 1
        }, 1400);
    }, 100);
    setTimeout(function(){
        $(".curso_online .volver").animate({
            bottom: "25px",
            opacity: 1
        }, 1400);
    }, 100);
}
function curso_paso_2(){

    $(".curso_online .mensaje").animate({
        top: "-75px",
        opacity: 0
    }, 1500, function(){ $(this).hide(); });
    $(".curso_online .volver").animate({
        bottom: "-75px",
        opacity: 0
    }, 1000, function(){ $(this).hide(); });
    $(".curso_online .ver_cursos").animate({
        bottom: "-75px",
        opacity: 0
    }, 1000, function(){ $(this).hide(); });
    setTimeout(function(){
        $(".sala_roja").animate({
            right: "25px",
            opacity: 1
        }, 1000);
    }, 1100);
    setTimeout(function(){
        $(".sala_azul").animate({
            right: "25px",
            opacity: 1
        }, 1000);
    }, 1400);
    setTimeout(function(){
        $(".sala_amarilla").animate({
            right: "25px",
            opacity: 1
        }, 1000);
    }, 1700);
    setTimeout(function(){
        $(".sala_verde").animate({
            right: "25px",
            opacity: 1
        }, 1000);
    }, 2000);
}
function ver_sitio(){
    //$(".curso_online").hide();
}
function sala_azul(){
    sala_seleccionada = 2;
    curso_paso_3();
}
function sala_roja(){
    sala_seleccionada = 1;
    curso_paso_3();
}
function sala_amarilla(){
    sala_seleccionada = 3;
    curso_paso_3();
}
function sala_verde(){
    sala_seleccionada = 4;
    curso_paso_3();
}
function curso_paso_3(){
    
    $(".sala_roja").animate({
        right: "-260px",
        opacity: 0
    }, 1000, function(){ $(this).hide(); });
    $(".curso_online .hada").animate({
        left: "-201px",
        opacity: 0
    }, 1000, function(){ $(this).hide(); });
    setTimeout(function(){
        $(".sala_azul").animate({
            right: "-260px",
            opacity: 0
        }, 1000);
    }, 300, function(){ $(this).hide(); });
    setTimeout(function(){
        $(".sala_amarilla").animate({
            right: "-260px",
            opacity: 0
        }, 1000);
    }, 600, function(){ $(this).hide(); });
    setTimeout(function(){
        $(".sala_verde").animate({
            right: "-260px",
            opacity: 0
        }, 1000);
    }, 900, function(){ $(this).hide(); });
    setTimeout(function(){
        agrandar();
    }, 1000);

    
    
}
function ver_cuentos(){
    var aux = [];
    for(var i=0, ilen=material.length; i<ilen; i++){
        if(material[i].tipo == 1 && material[i].sala == sala_seleccionada){
            aux.push(material[i]);
        }
    }
    if(aux.length == 0){
        alert("NO HAY ELEMENTOS");
    }
    if(aux.length == 1){
        loadApp(aux[0].id, aux[0].ancho, aux[0].alto);
    }
    if(aux.length > 1){
        listar_cuentos(aux);
    }

}
function listar_cuentos(aux){

    var listado = create_element_class('listado');
    for(var i=0, ilen=aux.length; i<ilen; i++){
        var lista = create_element_class('lista');
        lista.setAttribute('lista-id', aux[i].id);
        lista.setAttribute('lista-ancho', aux[i].ancho);
        lista.setAttribute('lista-alto', aux[i].alto);
        lista.onclick = function(){ loadApp_aux(this) };
        var foto = create_element_class_inner('foto', '<img src="'+path+'online/prev/'+aux[i].foto+'" alt="" />');
        var nombre = create_element_class_inner('nombre', aux[i].nombre);
        lista.appendChild(foto);
        lista.appendChild(nombre);
        listado.appendChild(lista);
    }
    $('#curso_lista').html(listado);
    $(".curso_lista").animate({
        right: "0px",
    }, 1000);

}
function ver_trabajos(){

    var aux = [];
    for(var i=0, ilen=material.length; i<ilen; i++){
        if(material[i].tipo == 3 && material[i].sala == sala_seleccionada){
            aux.push(material[i]);
        }
    }

    if(aux.length == 0){
        alert("NO HAY ELEMENTOS");
    }
    if(aux.length > 0){
        listar_trabajos(aux);
    }

}
function listar_trabajos(aux){

    var listado = create_element_class('listado clearfix');
    for(var i=0, ilen=aux.length; i<ilen; i++){
        var lista = create_element_class('lista');
        lista.setAttribute('foto', aux[i].foto_grande);
        lista.setAttribute('foto-w', aux[i].foto_w);
        lista.setAttribute('foto-h', aux[i].foto_h);
        lista.onclick = function(){ agrandar_trabajo(this) };
        var foto = create_element_class_inner('foto', '<img src="'+path+'online/prev/'+aux[i].foto+'" alt="" />');
        var nombre = create_element_class_inner('nombre', aux[i].nombre);
        lista.appendChild(foto);
        lista.appendChild(nombre);
        listado.appendChild(lista);
    }
    $('.trabajos').html(listado);
    $('.cuentos').hide();
    $('#player').hide();
    $('.trabajos').show();
    player.stopVideo();

}
function agrandar_trabajo(that){

    var foto = $(that).attr('foto');
    var w = $(that).attr('foto-w');
    var h = $(that).attr('foto-h');
    openwn("http://www.jardinvalleencantado.cl/online/trabajos/"+foto, w, h);

}
function play_youtube_aux(that){
    var code = $(that).attr('lista-code');
    play_youtube(code);
}
function listar_videos(aux){

    var listado = create_element_class('listado');
    for(var i=0, ilen=aux.length; i<ilen; i++){
        var lista = create_element_class('lista');
        lista.setAttribute('lista-code', aux[i].code);
        lista.onclick = function(){ play_youtube_aux(this) };
        var foto = create_element_class_inner('foto', '<img src="'+path+'online/prev/'+aux[i].foto+'" alt="" />');
        var nombre = create_element_class_inner('nombre', aux[i].nombre);
        lista.appendChild(foto);
        lista.appendChild(nombre);
        listado.appendChild(lista);
    }
    $('#curso_lista').html(listado);
    $(".curso_lista").animate({
        right: "0px",
    }, 1000);

}
function ver_canciones(){
    var aux = [];
    for(var i=0, ilen=material.length; i<ilen; i++){
        if(material[i].tipo == 2 && material[i].sala == sala_seleccionada){
            aux.push(material[i]);
        }
    }

    if(aux.length == 0){
        alert("NO HAY ELEMENTOS");
    }
    if(aux.length == 1){
        play_youtube(aux[0].code);
    }
    if(aux.length > 1){
        listar_videos(aux);
    }
}
function agrandar(){
    $(".curso").animate({
        "max-width": "900px",
        "max-height": "700px"
    }, 1000, function(){
        $(".detalle_curso").animate({
            top: "1%",
            opacity: 1
        }, 1000);
        loadApp(2, 846, 600);
    });
}
function loadApp_aux(that){
    var i = $(that).attr('lista-id');
    var ancho = $(that).attr('lista-ancho');
    var alto = $(that).attr('lista-alto');
    loadApp(i, ancho, alto);
}
function loadApp(id, ancho, alto){

    player.stopVideo();
    $('.cuentos').show();
    $('#player').hide();
    $('.trabajos').hide();

    var w = $('.curso_contenido').width();
    var h = $('.curso_contenido').height();
    var n_ancho = ancho;
    var n_alto = alto;

    if(w < ancho){
        n_alto = alto / ancho * w;
        n_ancho = w;
    }

    if(h > n_alto){
        var tp = (h - n_alto)/2;
        $('.cuentos').css( "padding-top", tp+'px' );
    }else{
        $('.cuentos').css( "padding-top", '0px' );
    }

    $(".curso_lista").animate({
        right: "-150px",
    }, 1000);
    $('.cuentos').find('.flipbook-viewport').each(function(){
        $(this).hide();
    });
    $('.flip-'+id).show();

    if(!flip_arr.includes(id)){
        flip_arr.push(id);
        $('.flipbook-'+id).turn({
            width: n_ancho,
            height: n_alto,
            elevation: 50,
            gradients: true,
            autoCenter: true
        });
    }else{
        $('.flipbook-'+id).turn("page", 1);
    }

}
function create_element_class(clase){
    var Div = document.createElement('div');
    Div.className = clase;
    return Div;
}
function create_element_class_inner(clase, value){
    var Div = document.createElement('div');
    Div.className = clase;
    Div.innerHTML = value;
    return Div;
}
function openwn(url, w, h){
    window.open(url, "_blank", "width="+w+",height="+h);
}