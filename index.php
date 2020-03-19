<?php

    $curso = 1;
    function crear_objeto($nombre, $tipo, $sala, $id = null, $code = null, $foto = null, $ancho = null, $alto = null, $foto_grande = null, $foto_w = null, $foto_h = null){

        $r["nombre"] = $nombre;
        $r["tipo"] = $tipo;
        $r["sala"] = $sala;
        if($id != null){ $r["id"] = $id; }
        if($foto != null){ $r["foto"] = $foto; }
        if($alto != null){ $r["alto"] = $alto; }
        if($ancho != null){ $r["ancho"] = $ancho; }
        if($code != null){ $r["code"] = $code; }
        if($foto_grande != null){ $r["foto_grande"] = $foto_grande; }
        if($foto_w != null){ $r["foto_w"] = $foto_w; }
        if($foto_h != null){ $r["foto_h"] = $foto_h; }
        return $r;

    }

    // roja = 1; azul = 2; amarilla = 3; verde = 4

    // CUENTOS
    $material[] = crear_objeto("Te quiero tanto, MAMÁ", 1, [3], 1, null, "cuento1prev.jpg", 1180, 600);
    $material[] = crear_objeto("La cebra Camila", 1, [1], 2, null, "cuento2prev.jpg", 1120, 572);
    $material[] = crear_objeto("¿Como te sientes?", 1, [2], 4, null, "cuento3prev.jpg", 972, 600);
    $material[] = crear_objeto("La pequeña oruga glotona", 1, [3, 4], 5, null, "cuento4prev.jpg", 1600, 600);    
    $material[] = crear_objeto("La casa de Dorita", 1, [3, 4], 6, null, "cuento5prev.jpg", 1728, 600);
    $material[] = crear_objeto("Te quiero, papi", 1, [3, 4], 7, null, "cuento6prev.jpg", 1500, 600);
    $material[] = crear_objeto("La selva loca", 1, [1], 8, null, "cuento7prev.jpg", 900, 600);
    $material[] = crear_objeto("Buena noches, gorila", 1, [2], 9, null, "cuento8prev.jpg", 2132, 600);    
    $material[] = crear_objeto("Mis papis trabajan", 1, [3, 4], 10, null, "cuento9prev.jpg", 1200, 600);
    $material[] = crear_objeto("¡A bañarse!", 1, [3, 4], 11, null, "cuento10prev.jpg", 1200, 600);
    $material[] = crear_objeto("El autobus de Maisy", 1, [1], 12, null, "cuento11prev.jpg", 2132, 600);
    $material[] = crear_objeto("Mi primer libro del cuerpo", 1, [2], 13, null, "cuento12prev.jpg", 2132, 600);

    // CANCIONES
    $material[] = crear_objeto("¿Dónde está la cebra?", 2, [1], null, "cgG73CoTz6U", "cancion1prev.jpg");
    $material[] = crear_objeto("Si Estás Feliz", 2, [2], null, "lU8zZjBV53M", "cancion4prev.jpg");
    $material[] = crear_objeto("Si Estás Feliz", 2, [2], null, "lU8zZjBV53M", "cancion4prev.jpg");
    $material[] = crear_objeto("Estaba el señor Don Gato", 2, [2, 4], null, "9Oyz_egsKI4", "cancion2prev.jpg");
    $material[] = crear_objeto("Ronda de los Conejos", 2, [2, 4], null, "bdKVVZYefDI", "cancion3prev.jpg");
    
    $material[] = crear_objeto("Mi carita redondita", 2, [3, 4], null, "6r_qz5XnK-M", "cancion8prev.jpg");
    $material[] = crear_objeto("Cinco patitos", 2, [3, 4], null, "Vqq3BwgsI0U", "cancion9prev.jpg");


    $material[] = crear_objeto("La vaca Lola", 2, [3, 4], null, "0dkHZYeIGIk", "cancion5prev.jpg");
    $material[] = crear_objeto("Perro Amigo", 2, [3, 4], null, "eMvt0ikkbkg", "cancion6prev.jpg");
    $material[] = crear_objeto("Las Ruedas del Autobus", 2, [1], null, "EwZ3KhAh448", "cancion7prev.jpg");

    // TRABAJOS
    $material[] = crear_objeto("La cebra Camila", 3, [1], null, null, "trabajo1prev.jpg", null, null, "trabajo1.jpg", 816, 1340);
    $material[] = crear_objeto("¿Cómo te sientes?", 3, [2], null, null, "trabajo2prev.jpg", null, null, "trabajo2.jpg", 816, 910);




    require_once "./url_function.php";
    $url = url();
    $pagina = (isset($url['url'])) ? $url['url'][0] : "" ; 
    $style_conozcanos = "opacity: 0; top: 500px";
    $style_propuesta = "opacity: 0; top: 500px";
    $style_horarios = "opacity: 0; top: 500px";
    $style_contacto = "opacity: 0; top: 500px";
    $pagina_inicio = "conozcanos";

    if($pagina != ""){ 

        if($pagina == "conozcanos"){
            $style_conozcanos = "opacity: 1; top: 0px";
        }elseif($pagina == "propuesta-educativa"){
            $style_propuesta = "opacity: 1; top: 0px";
            $pagina_inicio = "propuestaeducativa";
        }elseif($pagina == "horarios"){
            $style_horarios = "opacity: 1; top: 0px";
            $pagina_inicio = "horarios";
        }elseif($pagina == "contacto"){
            $style_contacto = "opacity: 1; top: 0px";
            $pagina_inicio = "contacto";
        }elseif($pagina == "visita-virtual"){
            require $url['dir']."visita.php";
            exit;
        }elseif($pagina == "libro"){
            if(strlen($url['url'][1]) == 30){
                $_GET["id"] = $url['url'][1];
                require $url['dir']."admin/libro.php";
                exit;
            }else{
                header('HTTP/1.1 404 Not Found', true, 404);
                include('./404.php');
                exit;
            }
        }elseif($pagina == "curso_online"){
            // NADA
        }else{
            header('HTTP/1.1 404 Not Found', true, 404);
            include('./404.php');
            exit;
        }
    }else{
        $style_conozcanos = "opacity: 1; top: 0px";
    }

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <?php if($curso == 1){ ?>
        <script src="<?php echo $url['path']; ?>js/turn.min.js" type="text/javascript"></script>
        <script src="<?php echo $url['path']; ?>js/curso.js" type="text/javascript"></script>
        <?php } ?>
        <script src="<?php echo $url['path']; ?>js/base.js" type="text/javascript"></script>
        <script> 
            var path = '<?php echo $url['path']; ?>';
            var pagina = '<?php echo $pagina_inicio; ?>';
            <?php if($curso == 1){ ?>
            var material = <?php echo json_encode($material); ?>;
            <?php } ?>
        </script>
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
                            <div class="hada_chica"><img src="<?php echo $url['path']; ?>img/hada_chica.png" alt=""></div>
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
                        <div class="hada"><img src="<?php echo $url['path']; ?>img/hada.png" alt=""></div>
                        <div class="info">
                            <div class="cont_pagina">
                                <div class="pagina contacto" style="<?php echo $style_contacto; ?>">
                                    <div class="data">
                                        <div class="formulario">
                                            <div class="titulo">Contacto</div>
                                            <div class="input"><span>Nombre:</span><input type="text" value="" /></div>
                                            <div class="input"><span>Correo:</span><input type="text" value="" /></div>
                                            <div class="input"><span>Telefono:</span><input type="text" value="" /></div>
                                            <div class="input"><span>Mensaje:</span><textarea></textarea></div>
                                            <div class="boton"><input type="button" value="Enviar" /></div>
                                            <div class="leyenda">Alberto Valenzuela Llanos 2705<br/>227589500<br/>Whatsapp +56962856227</div>
                                        </div>
                                        <div class="mapa" id="mapa"></div>
                                    </div>
                                </div>
                                <div class="pagina horarios" style="<?php echo $style_horarios; ?>">
                                    <div class="data">
                                        <div class="texto">
                                            <div class="titulo">Horarios</div>
                                            <div class="subtitulo">Atendemos ni&ntilde;os y ni&ntilde;as desde las 7:30 a las 18:30 hrs.</div>
                                            <div class="leyenda">Incluye:</div>
                                            <div class="item">Colaci&oacute;n a media ma&ntilde;ana, almuerzo, once y colaci&oacute;n de la tarde.</div>
                                            <div class="item">Tambi&eacute;n hay otras jornadas, de acuerdo a las necesidades de las familias:</div>
                                            <div class="bajada">Conversemos otras opciones. </div>
                                            <div class="bajada">Adem&aacute;s atendemos a&ntilde;o continuado</div>
                                        </div>
                                        <div class="imagen"></div>
                                        <div class="fondo"></div>
                                    </div>
                                </div>
                                <div class="pagina propuestaeducativa" style="<?php echo $style_propuesta; ?>">
                                    <div class="data">
                                        <div class="texto">
                                            <div class="titulo">Propuesta Educativa</div>
                                            <div class="subtitulo">TRABAJAMOS CON UN MODELO PEDAGOGICO QUE NOS PERMITE:</div>
                                            <ul class="lista">
                                                <li>Entregar a los ni&ntilde;os y ni&ntilde;as las herramientas necesarias para desarrollar su autonom&iacute;a.</li>
                                                <li>Lograr que obtengan aprendizajes significativos siendo protagonistas de sus aprendizajes a trav&eacute;s de actividades concretas.</li>
                                                <li>Crear lazos afectivos tanto con sus pares y con adultos, sinti&eacute;ndose considerado, seguro y respetado.</li>
                                                <li>Otorgamos oportunidades de estimulaci&oacute;n temprana a ni&ntilde;os y ni&ntilde;as que est&aacute;n en salas cunas.</li>
                                            </ul>
                                            <div class="subtitulo">PROYECTOS</div>
                                            <div class="leyenda">Para llevar a cabo nuestro trabajo d&iacute;a a d&iacute;a nos organizamos a trav&eacute;s de proyectos, algunos de estos son:</div>
                                            <ul class="lista">
                                                <li>Proyecto de Autoestima</li>
                                                <li>Proyecto de Solidario</li>
                                                <li>Proyecto de Medio Ambiente</li>
                                                <li>Proyecto de Arte</li>
                                                <li>Semana de la Familia</li>
                                                <li>Semana de la Amistad</li>
                                                <li>Proyecto Chile mi Pa&iacute;s</li>
                                            </ul>
                                            <div class="subtitulo">NUESTROS OBJETIVOS:</div>
                                            <ul class="lista">
                                                <li>Lograr que ni&ntilde;os y ni&ntilde;as construyan aprendizajes profundos y de calidad</li>
                                                <li>Lograr que ni&ntilde;os y ni&ntilde;as sean protagonistas de sus aprendizajes</li>
                                                <li>Generar un ambiente que favorezca el juego</li>
                                                <li>Favorecer el desarrollo de interacciones adulto-ni&ntilde;o, ni&ntilde;o-adulto, ni&ntilde;o-ni&ntilde;o</li>
                                                <li>Generar instancias de reuni&oacute;n y conversaci&oacute;n entre los padres y los distintos agentes de la comunidad educativa.</li>
                                                <li>Involucrar a la familia en el proceso de ense&ntilde;anza aprendizaje.</li>
                                                <li>Entregar estimulaci&oacute;n temprana a ni&ntilde;os de salas cunas.</li>
                                            </ul>
                                            <div class="subtitulo">Promovemos una educaci&oacute;n integral basada en todas las dimensiones:</div>
                                            <ul class="lista">
                                                <li><strong>Dimensi&oacute;n personal:</strong> Promovemos un desarrollo natural, progresivo y sistem&aacute;tico de las capacidades psicomotoras, intelectuales y afectivas, de modo de potenciar todas las &aacute;reas.</li>
                                                <li><strong>Dimensi&oacute;n social:</strong> Promovemos tanto la inserci&oacute;n de los ni&ntilde;os y ni&ntilde;as en el mundo de forma responsable y constructiva, como tambi&eacute;n respetando las diferencias de los dem&aacute;s.</li>
                                                <li><strong>Dimensi&oacute;n ecol&oacute;gica:</strong> Promovemos la toma de conciencia en su relaci&oacute;n con la naturaleza y medio ambiente, as&iacute; como tambi&eacute;n en el cuidado del planeta.</li>
                                                <li><strong>Dimensi&oacute;n val&oacute;rica:</strong> Promover la participaci&oacute;n activa y positiva, a trav&eacute;s de actitudes como la tolerancia, el respeto, el autocuidado y la empat&iacute;a.</li>
                                                <li><strong>Dimensi&oacute;n acad&eacute;mica:</strong> Promover el desarrollo del pensamiento cr&iacute;tico potenciando la adquisici&oacute;n de contenidos, habilidades y competencias, de acuerdo a las potencialidades y necesidades de cada ni&ntilde;o o ni&ntilde;a.</li>
                                            </ul>
                                        </div>
                                        <div class="imagen"></div>
                                        <div class="fondo"></div>
                                    </div>
                                </div>
                                <div class="pagina conozcanos" style="<?php echo $style_conozcanos; ?>">
                                    <div class="data">
                                        <div class="texto">
                                            <div class="titulo">Con&oacute;zcanos</div>
                                            <div class="subtitulo">Trabajamos desde 1996 comprometidos con la educaci&oacute;n inicial</div>
						                    <div class="listado">Calefacci&oacute;n Central</br>C&aacute;maras Web</br>Estimulaci&oacute;n Temprana</br>Biblioteca Infantil</br>Alimentaci&oacute;n Completa</div>
                                            <ul class="lista">
                                                <li>Atendemos ni&ntilde;os y ni&ntilde;as desde los 3 meses hasta los 4 a&ntilde;os de edad.</li>
                                                <li>Implementamos un proyecto educativo actualizado que responde a las necesidades e intereses de los ni&ntilde;os.</li>
                                                <li>Nuestro equipo est&aacute; formado por educadoras profesionales y t&eacute;cnicos comprometidas con su trabajo. Adem&aacute;s, cumplen con altos est&aacute;ndares pedag&oacute;gicos y disciplinares.</li>
						                        <li>Tenemos una infraestructura especialmente dise&ntilde;ada para Jard&iacute;n Infantil y Salas Cunas.</li>
                                            </ul>
                                            <div class="titulo_2">NUESTRA MISI&Oacute;N</div>
                                            <div class="sub_titulo_2">"En un ambiente seguro, proporcionar estimulaci&oacute;n y cuidados a ni&ntilde;os y ni&ntilde;as menores de 4 a&ntilde;os, privilegiando una Formaci&oacute;n de vanguardia que contribuya a integrarlos a un mundo en evoluci&oacute;n"</div>
                                            <div class="titulo_2">NUESTRO SELLO</div>
                                            <div class="sub_titulo_3">Acercar a los ni&ntilde;os al placer de la lectura</div>
						                    <div class="sub_titulo_2">"Buscamos desarrollar el goce por la literatura, en los ni&ntilde;os, ni&ntilde;as y sus familias transmitiendo el valor de su importancia para la vida y disfrutando con cada actividad o con cada texto escrito"</div>
                                            <ul class="lista">
                                                <li>Contamos con una biblioteca infantil, que incluye literatura y diferentes textos escritos.</li>
                                                <li>Tenemos un proyecto educativo que sustenta nuestro quehacer.</li>
                                                <li>Los ni&ntilde;os participan de actividades diarias, tales como: lectura silenciosa, pr&eacute;stamo de cuentos a la casa, los distintivos de los ni&ntilde;os son car&aacute;tulas de cuentos, entre otros.</li>
                                            </ul>
                                        </div>
                                        <div class="imagen"></div>
                                        <div class="fondo"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($curso == 1){ ?>
            <div class="curso_online">
                <div class="curso vhalign">
                    <div class="hada"><img src="<?php echo $url['path']; ?>img/hada.png" alt=""></div>
                    <div class="mensaje"><div class="valign msg">En estos momentos que estamos cuidándonos para que no se propague el coronavirus y nos piden que no salgamos de casa.<br/>Nuestro compromiso es continuo con todas las familias del Valle Encantado, queremos seguir colaborando para estimular y que los niños y niñas a través del juego puedan seguir aprendiendo.<br/>Hemos implementado este recurso, pincha en la sala en que está tu hijo y diariamente encontrarás material para trabajar.</div></div>
                    <div class="ver_cursos" onclick="curso_paso_2()">Ir a curso online</div>
                    <div class="volver" onclick="ver_sitio()">Deseo ir al sitio</div>
                    <div class="salas sala_azul" onclick="sala_azul()">SALA AZUL</div>
                    <div class="salas sala_roja" onclick="sala_roja()">SALA ROJA</div>
                    <div class="salas sala_amarilla" onclick="sala_amarilla()">SALA AMARILLA</div>
                    <div class="salas sala_verde" onclick="sala_verde()">SALA VERDE</div>
                    <div class="detalle_curso">
                        <div class="curso_titulo">
                            <div class="logo valign"><img src="<?php echo $url['path']; ?>img/hada_chica.png" alt="" /></div>
                            <div class="titulo valign"><h1>Cursos Online</h1><h2>Jardin Valle Encantado</h2></div>
                            <div class="botones valign">
                                <div class="boton" onclick="ver_cuentos()"><img src="<?php echo $url['path']; ?>online/cuentos.png" alt="" /><span>Cuentos</span></div>
                                <div class="boton" onclick="ver_canciones()"><img src="<?php echo $url['path']; ?>online/canciones.png" alt="" /><span>Canciones</span></div>
                                <div class="boton" onclick="ver_trabajos()"><img src="<?php echo $url['path']; ?>online/trabajos.png" alt="" /><span>Trabajos</span></div>
                            </div>
                        </div>
                        <div class="curso_lista" id="curso_lista"></div>
                        <div class="curso_contenido" onclick="hide_lista()">
                            <div class="cuentos">
                                <?php
                                    $dir = $url['dir']."online/cuentos";
                                    $cuentos = array_diff(scandir($dir), array('..', '.'));
                                    $x = 1;
                                    foreach($cuentos as $valor){
                                        echo "<div class='flip-".$x." flipbook-viewport'><div class='container'><div class='ff flipbook-".$x."'>";
                                        $dir_ = $dir."/".$valor."/";
                                        if($handler = opendir($dir_)){
                                            $aux_file = [];
                                            while(false !== ($file = readdir($handler))){
                                                    if(is_file($dir_.$file) && $file != "index.html"){
                                                        $aux_file[] = $file;
                                                    }
                                            }
                                            sort($aux_file);
                                            for($i=0; $i<count($aux_file); $i++){
                                                echo "<div style='background-image:url(online/cuentos/".$valor."/".$aux_file[$i]."); background-size: cover'></div>";
                                            }
                                            closedir($handler);
                                        }
                                        echo "</div></div></div>";
                                        $x++;
                                    }
                                ?>
                            </div>
                            <div id="player"></div>
                            <div class="trabajos"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="menu_web">
                <div class="btn_menu"><span></span><span></span><span></span></div>
                <div class="cont_menu">
                    <div class="titulo_menu">Menu</div>
                    <div class="botones_menu">
                        <a href="<?php echo $url['path']; ?>conozcanos" class="btnconozcanos">Conozcanos</a>
                        <a href="<?php echo $url['path']; ?>propuesta-educativa" class="btnpropuesta">Propuesta Educativa</a>
                        <a href="<?php echo $url['path']; ?>horarios" class="btnhorarios">Horarios</a>
                        <a href="<?php echo $url['path']; ?>contacto" class="btncontacto">Contacto</a>
                        <a href="<?php echo $url['path']; ?>visita-virtual">Visita Virtual</a>
                    </div>
                    <div class="infos_menu">
                        <div class="info_bottom">
                            <div class="menu_data_titulo">
                                <div class="menu_data_hada"><img src="<?php echo $url['path']; ?>img/hada_chica.png" alt=""></div>
                                <div class="menu_data_nombre valign"><div class="menu_data_nombre_1">Valle Encantado</div><div class="menu_data_nombre_2">Jardin Infantil - Sala Cuna</div></div>
                            </div>
                            <div class="menu_data">Alberto Valenzuela Llanos 2705</div>
                            <div class="menu_data">227589500</div>
                            <div class="menu_data">Whatsapp +56962856227</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIXenuYoczpO6oh4uzeOj11b7Nvg8zrFM&callback=initMap" async defer></script>
    </body>
</html>