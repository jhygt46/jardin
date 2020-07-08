var num = 1;
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

function goBack() {
    
    var ref = document.referrer.split("/");
    if(ref[2] == window.location.hostname){
        window.history.back();
    }else{
        window.location.href = "http://www.jardinvalleencantado.cl";
    }
    
}
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