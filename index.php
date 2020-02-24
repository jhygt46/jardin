<?php

    function url(){
        $url = explode("/", $_SERVER["REQUEST_URI"]);
        for($i=0; $i<count($url); $i++){
            if(($_SERVER["HTTP_HOST"] == "localhost" && $i != 1 && $url[$i] != "") || ($_SERVER["HTTP_HOST"] != "localhost" && $url[$i] != "")){
                $aux['url'][] = $url[$i];
            }
        }
        if($_SERVER["HTTP_HOST"] == "localhost"){
            $aux['dir_base'] = $_SERVER["DOCUMENT_ROOT"]."/";
            $aux['dir'] = $aux['dir_base'].$url[1]."/";
            $aux['path'] = "/".$url[1]."/";
        }else{
            $a = explode("/", $_SERVER["DOCUMENT_ROOT"]);
            array_pop($a);
            $aux['dir_base'] = implode("/", $a)."/";
            $aux['dir'] = $_SERVER["DOCUMENT_ROOT"]."/";
            $aux['path'] = "/";
        }
        return $aux;
    }

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
        }elseif($pagina == "visita-virtual"){
            require $url['dir']."admin/libro.php";
            exit;
        }else{
            die("ERROR 404 NOT FOUND");
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
        <script src="<?php echo $url['path']; ?>js/base.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIXenuYoczpO6oh4uzeOj11b7Nvg8zrFM&signed_in=true"></script>
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
                        <div class="boton color1"><a href="" class="btnvisita">Visita Virtual</a></div>
                        <div class="boton color2"><a href="" class="btncontacto">Contacto</a></div>
                        <div class="boton color3"><a href="" class="btnhorarios">Horarios</a></div>
                        <div class="boton color4"><a href="" class="btnpropuesta">Propuesta Educativa</a></div>
                        <div class="boton color5"><a href="" class="btnconozcanos">Con&oacute;zcanos</a></div>
                    </div>
                    <div class="contenedor box">
                        <div class="ada"><img src="<?php echo $url['path']; ?>img/hada.png" alt=""></div>
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
            <div class="visita_virtual" style="display: none">
                <div class="panorama vhalign" id="panorama">

                    <div class="pan entrada visible imgpan" style="width: 970px">
                        <div class="punto pos_entrada" rel="1" back="0">Entrar</div>
                        <img class='img' src='panorama/entrada.jpg' alt='' />
                    </div>                                        
                    <div class="pan entrada imgpan" style="width: 1363px">
                        <div class="punto back" rel="0">Volver</div>
                        <div class="punto pos_patio" rel="5">Patio</div>
                        <div class="punto pos_biblioteca" rel="12">Biblioteca</div>
                        <div class="punto pos_salas" rel="2">Salas</div>
                        <div class="punto pos_sala_verde" rel="13">Sala Verde (2do Piso)</div>
                        <div class="punto pos_sala_naranja" rel="11">Sala Naranja</div>
                        <div class="punto pos_cocina" rel="10">Cocina</div>
                        <img class='img' src='panorama/entrada2.jpg' alt='' />
                    </div>                                         
                    <div class="pan pasillo imgpan" style="width: 1049px">
                        <div class="punto back" rel="1">Volver</div>
                        <div class="punto pos_sala_azul" rel="3">Sala Azul</div>
                        <div class="punto pos_sala_roja" rel="4">Sala Roja</div>
                        <div class="punto pos_patio" rel="6">Patio Sala Cuna</div>
                        <div class="punto pos_sala_amarilla" rel="7">Sala Amarilla</div>
                        <div class="punto pos_bano_sala_duna" rel="8">Ba&ntilde;o Sala Cuna</div>
                        <div class="punto pos_bano_jardin" rel="9">Ba&ntilde;o Jardin</div>
                        <img class='img' src='panorama/salas.jpg' alt='' />
                    </div>
                    <div class="pan Sala_Cuna_Mayor">
                        <div class="punto back" rel="2">Volver</div>
                        <div class="fotos clearfix">
                            <div class="foto_prin"><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/0febe87dfcaed4d272ce35e55218c2e5.jpg' alt='' /></div></div>
                            <div class="listado_fotos">
                                <ul class='clearfix' style='width: 750px'>
                                    <li><img class='imgp' src='admin/images/uploads/1/0febe87dfcaed4d272ce35e55218c2e5.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/d527fadd5ccf37322088face650026a1.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/6e637f00dc017a98e66bb364a622d00b.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/aede630590e5c62273ac6e85071d9743.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/84367f0143a1df24a3d3ecd8ef4e02d3.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Medio_Menor">
                        <div class="punto back" rel="2">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/7101384e04d88cee525b6ade9059e0bc.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/7101384e04d88cee525b6ade9059e0bc.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/746e0dc9fbdab0ff650c741170fd4047.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/62349b07ff408d4994396f81a402fb42.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/ac9738a0a364c3d09ec5dd0944977b0b.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/f74b5b7afc1ebe9efae8be6f1a96815f.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>                                      
                    <div class="pan patio imgpan" style="width: 1499px">
                        <div class="punto back" rel="1">Volver</div>
                        <img class='img' src='panorama/patio_grande_01.jpg' alt='' />
                    </div>
                    <div class="pan Patio_Sala_Cuna">
                        <div class="punto back" rel="2">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/734eb30be30301ff722924785e8ee75b.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/734eb30be30301ff722924785e8ee75b.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/3e06330314ff8bea176acc4512fb9780.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/e2835e13f715261d9ecf58c5b70bc82b.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/c2ffb621ae1e6ed3f1a5620555626974.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Sala_Cuna_Intermedio">
                        <div class="punto back" rel="2">Volver</div>
                        <div class='fotos clearfix' >
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/a710ce2407fc804f65c4fc9122fd8d0b.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/a710ce2407fc804f65c4fc9122fd8d0b.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/8e8fae52a0bca4be514b7168ddd89a49.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/11d89a7f6cfb2309cf1225fd51c843b0.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/251cf7c376ab6153f561ad523c3614f3.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/6d3b3ccf924d6fcd88f53fd021b29a72.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Bano_Sala_Cuna">
                        <div class="punto back" rel="2">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/e3279017a1f2bddfeddadaaa5843700b.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/e3279017a1f2bddfeddadaaa5843700b.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/b3feef787ea1a279e90e151604968956.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/18b71ec09be0be6cc4611a9f17db5565.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Bano_Sala_Cuna_2">
                        <div class="punto back" rel="2">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/b4fe90db4f28d9f88b9faa68b7f8943a.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix' style='padding-top: 5px;'>
                                    <li><img class='imgp' src='admin/images/uploads/1/b4fe90db4f28d9f88b9faa68b7f8943a.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/75fda8ca0c227e41df46c46ce0cb2931.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/c31c4aea166263bec3538fc0efdaad64.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Cocina">
                        <div class="punto back" rel="1">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/cbb078d1f5dd6bda063952b9730650e3.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/cbb078d1f5dd6bda063952b9730650e3.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/9462ae1f9316114eee31c8d766023157.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/368bac0069958fb244e37ee0ec143c47.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Medio_Mayor">
                        <div class="punto back" rel="1">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/56b73a9e57270a9be6a68b5c917f5051.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/56b73a9e57270a9be6a68b5c917f5051.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/4071dfce4fe0de30e22b134bdd7936f3.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/7ab5dfda0317d1521ce1b30220541a29.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/a512be53f7bb1fa46c981178debbddee.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/c37d716b32225f66bf95a858d1c8cd8e.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>                                       
                    <div class="pan Biblioteca">
                        <div class="punto back" rel="1">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/b74c43770e1044830077ac5285ad0fa8.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix' >
                                    <li><img class='imgp' src='admin/images/uploads/1/b74c43770e1044830077ac5285ad0fa8.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/cd0db667c05d6e355fc038d346452d1c.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Sala_Verde imgpan" style="width: 1772px">
                        <div class="punto back" rel="1">Volver</div>
                        <div class="punto pos_sala_actividades" rel="14">Sala Actividades</div>
                        <div class="punto pos_sala_siesta" rel="15">Sala Siesta</div>
                        <div class="punto pos_bano_sala_cuna" rel="16">Ba&ntilde;o Sala Cuna</div>
                        <img class='img' src='panorama/sala_verde.jpg' alt='' />
                    </div>
                    <div class="pan Sala_Actividades">
                        <div class="punto back" rel="13">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/6b158f2975141298cf89188a0c1e5c62.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/6b158f2975141298cf89188a0c1e5c62.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/7d3db857ca6e10aea422bbc1039ab519.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/88882d6c10221da2dc9cec3cf509ea0c.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/b50cc8b21aa3f897fab7cb6399aeda56.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Sala_Siesta">
                        <div class="punto back" rel="13">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/76e8f2982f3ac82bc4b5b6ddf10243bc.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/76e8f2982f3ac82bc4b5b6ddf10243bc.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/ba60b06c6cd1cc17150724ae0a71ca43.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/2d805d6e6bce72c42e2b063d4a8cbf30.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/12d0726de002f950679b911375e40333.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pan Bano_Sala_Cuna">
                        <div class="punto back" rel="13">Volver</div>
                        <div class='fotos clearfix'>
                            <div class='foto_prin'><div class="cont_img"><img class='imgx' src='admin/images/uploads/1/e8c95d4cfd7c375b4822bca3f092ef3d.jpg' alt='' /></div></div>
                            <div class='listado_fotos'>
                                <ul class='clearfix'>
                                    <li><img class='imgp' src='admin/images/uploads/1/e8c95d4cfd7c375b4822bca3f092ef3d.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/00f12975d6e4d9d317483365aac2839e.jpg' alt='' /></li>
                                    <li><img class='imgp' src='admin/images/uploads/1/5ab14a496bc31b622800d8864ca908ef.jpg' alt='' /></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="menu_web">
                <div class="btn_menu"><span></span><span></span><span></span></div>
            </div>
        </div>
    </body>
    
</html>