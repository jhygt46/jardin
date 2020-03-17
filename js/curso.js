var curso_width = 0;
var curso_height = 0;
var flipbook = 0;

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
    curso_paso_3();
}
function sala_roja(){
    curso_paso_3();
}
function sala_amarilla(){
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
function loadApp(){
    $('.flipbook-'+flipbook).turn({
        width: curso_width,
        height: curso_height,
        elevation: 50,
        gradients: true,
        autoCenter: true
    });
}
function revista(id, width, height){
    curso_width = width;
    curso_height = height;
    flipbook = id;
    yepnope({
        test : Modernizr.csstransforms,
        yep: ['./js/turn.js'],
        nope: ['./js/turn.html4.min.js'],
        both: ['./css/basic.css'],
        complete: loadApp
    });
}