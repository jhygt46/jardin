var flip_arr = [];
var sala_seleccionada = 0;

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
        $(".sala_naranja").animate({
            right: "25px",
            opacity: 1
        }, 1000);
    }, 1100);
    setTimeout(function(){
        $(".sala_roja").animate({
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
}
function ver_sitio(){
    $(".curso_online").hide();
}
function sala_naranja(){
    sala_seleccionada = 1;
    curso_paso_3();
}
function sala_roja(){
    sala_seleccionada = 2;
    curso_paso_3();
}
function sala_amarilla(){
    sala_seleccionada = 3;
    curso_paso_3();
}
function curso_paso_3(){
    
    $(".sala_naranja").animate({
        right: "-260px",
        opacity: 0
    }, 1000, function(){ $(this).hide(); });
    $(".curso_online .hada").animate({
        left: "-201px",
        opacity: 0
    }, 1000, function(){ $(this).hide(); });
    setTimeout(function(){
        $(".sala_roja").animate({
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
        var foto = create_element_class_inner('foto', '<img src="'+path+'cuentos_prev/'+aux[i].foto+'" alt="" />');
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
function ver_videos(){
    var aux = [];
    for(var i=0, ilen=material.length; i<ilen; i++){
        if(material[i].tipo == 2 && material[i].sala == sala_seleccionada){
            aux.push(material[i]);
        }
    }
    console.log(aux);
}
function ver_canciones(){
    var aux = [];
    for(var i=0, ilen=material.length; i<ilen; i++){
        if(material[i].tipo == 3 && material[i].sala == sala_seleccionada){
            aux.push(material[i]);
        }
    }
    console.log(aux);
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
    });
}
function loadApp_aux(that){
    var i = $(that).attr('lista-id');
    var ancho = $(that).attr('lista-ancho');
    var alto = $(that).attr('lista-alto');
    loadApp(i, ancho, alto);
}
function loadApp(id, ancho, alto){

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