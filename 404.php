<?php

    require_once "./url_function.php";
    $url = url();

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Jardin Infantil y Sala Cuna Valle Encantado</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="Jardin Valle Encantado" />
        <meta name="Description" content="Jardin Infantil y Sala Cuna Valle Encantado"/>
        <meta name="Keywords" content="Jardin Infantil, Sala Cuna, Jardin Valle Encantado"/>
        <meta name="robots" content="all" />
        <meta name="author" content="diegomez13@hotmail.com" />
        <meta name="revisit-after" content="1 weeks" />
        <link href="https://fonts.googleapis.com/css?family=Baloo+Tamma" rel="stylesheet">
        <link href="<?php echo $url['path']; ?>css/jardin.css" rel="stylesheet" media="all" />
        <script> var path = '<?php echo $url['path']; ?>'; var pagina = '<?php echo $pagina_inicio; ?>'; </script>
    </head>
    <body>
        <div class="sitio">
            <div class="clouds">
                <div class="cloud cloud1"></div>
                <div class="cloud cloud2"></div>
                <div class="cloud cloud3"></div>
                <div class="cloud cloud4"></div>
                <div class="cloud cloud5"></div>
                <div class="cloud cloud6"></div>
                <div class="cloud cloud7"></div>
                <div class="cloud cloud8"></div>
            </div>
            <div class="background">
                <div class="pasto"></div>
                <div class="arbol"></div>
                <div class="arbol2"></div>
            </div>
            <div class="web">
                <div class="contenido vhalign">
                    <div class="menu_resp">
                        <div class="cont clearfix vhalign">
                            <div class="ada_chica"><img src="<?php echo $url['path']; ?>img/hada_chica.png" alt=""></div>
                            <div class="titulo"><div class="cont_titulo valign"><h1>ValleEncantado</h1><h2>Jardin Infantil - Sala Cuna</h2></div></div>
                        </div>
                    </div>
                    <div class="menu clearfix">
                        <div class="boton color1"><a href="<?php echo $url['path']; ?>visita-virtual" class="btnvisita">Visita Virtual</a></div>
                        <div class="boton color2"><a href="<?php echo $url['path']; ?>contacto" class="btncontacto">Contacto</a></div>
                        <div class="boton color3"><a href="<?php echo $url['path']; ?>horarios" class="btnhorarios">Horarios</a></div>
                        <div class="boton color4"><a href="<?php echo $url['path']; ?>propuesta-educativa" class="btnpropuesta">Propuesta Educativa</a></div>
                        <div class="boton color5"><a href="<?php echo $url['path']; ?>conozcanos" class="btnconozcanos">Con&oacute;zcanos</a></div>
                    </div>
                    <div class="contenedor box">
                        <div class="mensaje_ada vhalign"><img src="<?php echo $url['path']; ?>img/hada.png" alt=""><div class="mensaje">PAGINA NO ENCONTRADA</div></div>
                        
                    </div>
                </div>
            </div>
            <div class="menu_web">
                <div class="btn_menu"><span></span><span></span><span></span></div>
            </div>
        </div>
    </body>
</html>