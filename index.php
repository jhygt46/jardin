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

    $material[] = crear_objeto("Te quiero tanto, MAMÁ", 1, [3], 1, null, "cuento1prev.jpg", 1180, 600);
    $material[] = crear_objeto("La cebra Camila", 1, [1], 2, null, "cuento2prev.jpg", 1120, 572);
    $material[] = crear_objeto("¿Como te sientes?", 1, [2], 4, null, "cuento3prev.jpg", 972, 600);
    $material[] = crear_objeto("La pequeña oruga glotona", 1, [3, 4], 5, null, "cuento4prev.jpg", 1600, 600);    
    $material[] = crear_objeto("La casa de Dorita", 1, [3, 4], 6, null, "cuento5prev.jpg", 1728, 600);
    $material[] = crear_objeto("Te quiero, papi", 1, [3, 4], 7, null, "cuento6prev.jpg", 1500, 600);
    $material[] = crear_objeto("La selva loca", 1, [1], 8, null, "cuento7prev.jpg", 900, 600);
    $material[] = crear_objeto("Buenas noches, gorila", 1, [2], 9, null, "cuento8prev.jpg", 2132, 600);    
    $material[] = crear_objeto("Mis papis trabajan", 1, [3, 4], 10, null, "cuento9prev.jpg", 1200, 600);
    $material[] = crear_objeto("¡A bañarse!", 1, [3, 4], 11, null, "cuento10prev.jpg", 1200, 600);
    $material[] = crear_objeto("El autobus de Maisy", 1, [1], 12, null, "cuento11prev.jpg", 2132, 600);
    $material[] = crear_objeto("Mi primer libro del cuerpo", 1, [2], 13, null, "cuento12prev.jpg", 2132, 600);
    $material[] = crear_objeto("El camaleón de colores", 1, [4], 14, null, "cuento13prev.jpg", 1712, 689);
    $material[] = crear_objeto("Visito al doctor", 1, [3], 15, null, "cuento14prev.jpg", 2132, 600);
    $material[] = crear_objeto("Colibri", 1, [3], 16, null, "cuento15prev.jpg", 1600, 600);
    $material[] = crear_objeto("Nacho va a la escuela", 1, [4], 17, null, "cuento16prev.jpg", 1500, 600);
    $material[] = crear_objeto("El carnaval de los animales", 1, [4], 18, null, "cuento17prev.jpg", 1600, 600);
    $material[] = crear_objeto("La vaca en su hamaca", 1, [4], 19, null, "cuento18prev.jpg", 1200, 600);
    $material[] = crear_objeto("El dinosaurio y sus amigos", 1, [4], 20, null, "cuento19prev.jpg", 1200, 600);
    $material[] = crear_objeto("Clo-clo Clotilde y los tres huevos", 1, [3], 21, null, "cuento20prev.jpg", 1200, 600);
    $material[] = crear_objeto("A veces me confunden", 1, [3], 22, null, "cuento21prev.jpg", 1200, 600);
    $material[] = crear_objeto("Los Colores", 1, [1], 23, null, "cuento22prev.jpg", 1600, 600);
    $material[] = crear_objeto("La cama de Mamá", 1, [1], 24, null, "cuento23prev.jpg", 1600, 600);
    $material[] = crear_objeto("Lola cuenta patos", 1, [1], 25, null, "cuento24prev.jpg", 1120, 600);
    $material[] = crear_objeto("Lola descubre el agua", 1, [1], 26, null, "cuento25prev.jpg", 944, 600);
    $material[] = crear_objeto("El libro del Osito", 1, [1], 27, null, "cuento26prev.jpg", 876, 600);
    $material[] = crear_objeto("Gastón Ratón y Gastoncito", 1, [1], 28, null, "cuento27prev.jpg", 1102, 600);
    $material[] = crear_objeto("Buenas noches monstruo verde", 1, [1], 29, null, "cuento28prev.jpg", 1056, 600);
    $material[] = crear_objeto("Elmer y el clima", 1, [1], 30, null, "cuento29prev.jpg", 1054, 600);
    $material[] = crear_objeto("Federico y su hermanita", 1, [1], 31, null, "cuento30prev.jpg", 1168, 600);
    $material[] = crear_objeto("Las Canciones de Edu", 1, [1], 32, null, "cuento31prev.jpg", 1070, 600);
    $material[] = crear_objeto("Había una vez un barco", 1, [1], 33, null, "cuento32prev.jpg", 1114, 600);
    $material[] = crear_objeto("Federico no presta", 1, [1], 34, null, "cuento33prev.jpg", 1272, 600);
    $material[] = crear_objeto("Federico dice no", 1, [1], 35, null, "cuento34prev.jpg", 1196, 600);
    $material[] = crear_objeto("Que esconde el pequeño Edu", 1, [1], 36, null, "cuento35prev.jpg", 1170, 600);
    $material[] = crear_objeto("Dinosauria de viaje", 1, [1], 37, null, "cuento36prev.jpg", 1148, 600);
    $material[] = crear_objeto("Caillou Por favor y Gracias", 1, [1], 38, null, "cuento37prev.jpg", 1124, 600);
    $material[] = crear_objeto("Y YO que?", 1, [1], 39, null, "cuento38prev.jpg", 1204, 600);
    $material[] = crear_objeto("Formas", 1, [1], 40, null, "cuento39prev.jpg", 1086, 600);
    $material[] = crear_objeto("Me llamo NO", 1, [1], 41, null, "cuento40prev.jpg", 944, 600);
    $material[] = crear_objeto("Como reconocer a un monstruo", 1, [1], 42, null, "cuento41prev.jpg", 1016, 600);
    $material[] = crear_objeto("El pequeño Edu tiene hambre", 1, [1], 43, null, "cuento42prev.jpg", 1420, 600);
    $material[] = crear_objeto("Tito no usa pañal", 1, [1], 44, null, "cuento43prev.jpg", 1120, 600);
    $material[] = crear_objeto("¿Quien eres Tigre?", 1, [1], 45, null, "cuento44prev.jpg", 1422, 600);
    $material[] = crear_objeto("Colectivos", 1, [1], 46, null, "cuento45prev.jpg", 1146, 600);
    $material[] = crear_objeto("Música de Mar", 1, [1], 47, null, "cuento46prev.jpg", 1250, 600);
    $material[] = crear_objeto("Entramos en el bosque", 1, [1], 48, null, "cuento47prev.jpg", 968, 600);
    $material[] = crear_objeto("Shh....! Me hice pis", 1, [1], 49, null, "cuento48prev.jpg", 968, 600);
    $material[] = crear_objeto("Con papel de chocolate", 1, [1], 50, null, "cuento49prev.jpg", 968, 600);
    $material[] = crear_objeto("Barcos", 1, [1], 51, null, "cuento50prev.jpg", 968, 600);
    $material[] = crear_objeto("Gatito", 1, [1], 52, null, "cuento51prev.jpg", 968, 600);
    $material[] = crear_objeto("Lola va a la plaza", 1, [1], 53, null, "cuento52prev.jpg", 968, 600);
    $material[] = crear_objeto("Animales Bebe", 1, [1], 54, null, "cuento53prev.jpg", 968, 600);
    $material[] = crear_objeto("Gastón Ratón y Gastoncito salen de paseo", 1, [1], 55, null, "cuento54prev.jpg", 968, 600);
    $material[] = crear_objeto("Callou es mio", 1, [1], 56, null, "cuento55prev.jpg", 1072, 600);
    $material[] = crear_objeto("Ojitos Inquietos", 1, [1], 57, null, "cuento56prev.jpg", 912, 600);
    $material[] = crear_objeto("Mi Hamster", 1, [1], 58, null, "cuento57prev.jpg", 890, 600);
    $material[] = crear_objeto("Toca y descubre", 1, [1], 59, null, "cuento58prev.jpg", 930, 600);
    $material[] = crear_objeto("El Pipi de Tento", 1, [1], 60, null, "cuento59prev.jpg", 996, 600);
    $material[] = crear_objeto("Mis Peces", 1, [1], 61, null, "cuento60prev.jpg", 900, 600);
    $material[] = crear_objeto("En el Circo", 1, [1], 62, null, "cuento61prev.jpg", 968, 600);
    $material[] = crear_objeto("A Comer", 1, [1], 63, null, "cuento62prev.jpg", 900, 600);
    $material[] = crear_objeto("Mundo en miniatura", 1, [1], 64, null, "cuento63prev.jpg", 900, 600);
    $material[] = crear_objeto("Al Agua", 1, [1], 65, null, "cuento64prev.jpg", 920, 600);
    $material[] = crear_objeto("La granja de Teo", 1, [1], 66, null, "cuento65prev.jpg", 972, 600);
    $material[] = crear_objeto("A dormir", 1, [1], 67, null, "cuento66prev.jpg", 986, 600);
    $material[] = crear_objeto("Animales en el vecindario", 1, [1], 68, null, "cuento67prev.jpg", 932, 600);
    $material[] = crear_objeto("Me río", 1, [1], 69, null, "cuento68prev.jpg", 914, 600);
    $material[] = crear_objeto("En la escuela", 1, [1], 70, null, "cuento69prev.jpg", 916, 600);
    $material[] = crear_objeto("Gato tiene sueño", 1, [1], 71, null, "cuento70prev.jpg", 900, 600);
    $material[] = crear_objeto("Un mostruo muy dormilon", 1, [1], 72, null, "cuento71prev.jpg", 1046, 600);
    $material[] = crear_objeto("En el mar", 1, [1], 73, null, "cuento72prev.jpg", 954, 600);
    $material[] = crear_objeto("Primeras palabras", 1, [1], 74, null, "cuento73prev.jpg", 900, 600);
    $material[] = crear_objeto("Muu Muu", 1, [1], 75, null, "cuento74prev.jpg", 934, 600);
    $material[] = crear_objeto("Dame un abrazo fuerte", 1, [1], 76, null, "cuento75prev.jpg", 996, 600);
    $material[] = crear_objeto("Los colores", 1, [1], 77, null, "cuento76prev.jpg", 906, 600);
    $material[] = crear_objeto("Entonces soy feliz", 1, [1], 78, null, "cuento77prev.jpg", 994, 600);
    $material[] = crear_objeto("Mis opuestos", 1, [1], 79, null, "cuento78prev.jpg", 902, 600);
    $material[] = crear_objeto("Feliz cumpleaños Mauro", 1, [1], 80, null, "cuento79prev.jpg", 940, 600);
    $material[] = crear_objeto("Quiero a mi papá", 1, [1], 81, null, "cuento80prev.jpg", 898, 600);
    $material[] = crear_objeto("Cubo", 1, [1], 82, null, "cuento81prev.jpg", 922, 600);
    $material[] = crear_objeto("En el pantano de mil colores", 1, [1], 83, null, "cuento82prev.jpg", 898, 600);
    $material[] = crear_objeto("Opuestos", 1, [1], 84, null, "cuento83prev.jpg", 912, 600);
    $material[] = crear_objeto("El carrusel de las formas", 1, [1], 85, null, "cuento84prev.jpg", 936, 600);
    $material[] = crear_objeto("Pájaros en la cabeza", 1, [1], 86, null, "cuento85prev.jpg", 902, 600);
    $material[] = crear_objeto("Las familias", 1, [1], 87, null, "cuento86prev.jpg", 902, 600);
    $material[] = crear_objeto("Constructor", 1, [1], 88, null, "cuento87prev.jpg", 954, 600);
    $material[] = crear_objeto("Cuantos ves", 1, [1], 89, null, "cuento88prev.jpg", 898, 600);






    $material[] = crear_objeto("¿Dónde está la cebra?", 2, [1], null, "cgG73CoTz6U", "cancion1prev.jpg");
    $material[] = crear_objeto("Si Estás Feliz", 2, [2], null, "lU8zZjBV53M", "cancion4prev.jpg");
    $material[] = crear_objeto("Estaba el señor Don Gato", 2, [2, 4], null, "9Oyz_egsKI4", "cancion2prev.jpg");
    $material[] = crear_objeto("Ronda de los Conejos", 2, [2, 4], null, "bdKVVZYefDI", "cancion3prev.jpg");
    $material[] = crear_objeto("Mi carita redondita", 2, [3, 4], null, "6r_qz5XnK-M", "cancion8prev.jpg");
    $material[] = crear_objeto("Cinco patitos", 2, [3, 4], null, "Vqq3BwgsI0U", "cancion9prev.jpg");
    $material[] = crear_objeto("La vaca Lola", 2, [3, 4], null, "0dkHZYeIGIk", "cancion5prev.jpg");
    $material[] = crear_objeto("Perro Amigo", 2, [3, 4], null, "eMvt0ikkbkg", "cancion6prev.jpg");
    $material[] = crear_objeto("Las Ruedas del Autobus", 2, [1], null, "EwZ3KhAh448", "cancion7prev.jpg");
    $material[] = crear_objeto("El Zoológico", 2, [2], null, "UJezG8dP4Nc", "cancion8prev.jpg");
    $material[] = crear_objeto("La selva loca", 2, [1], null, "JxN_rbCLdso", "cancion9prev.jpg");
    $material[] = crear_objeto("El camaleón de colores", 2, [4], null, "jxv9YEE8Wuc", "cancion10prev.jpg");
    $material[] = crear_objeto("¡A bañarse!", 2, [4], null, "okKiWXi7Hsg", "cancion11prev.jpg");
    $material[] = crear_objeto("Visito al doctor", 2, [4], null, "hBb04SzOizo", "cancion12prev.jpg");
    $material[] = crear_objeto("Hipopotamos", 2, [4], null, "DYzxoGkRCFM", "cancion13prev.jpg");
    $material[] = crear_objeto("A guardar a guardar cada cosa en su lugar", 2, [4], null, "HCynKopZ6Z4", "cancion14prev.jpg");
    $material[] = crear_objeto("Las Canciones del Zoo 2", 2, [4], null, "UJezG8dP4Nc", "cancion15prev.jpg");
    $material[] = crear_objeto("El oso y los ositos", 2, [3], null, "FHR5h385LhU", "cancion16prev.jpg");
    $material[] = crear_objeto("La Vaca Lechera", 2, [4], null, "s7LWD0ebo2Y", "cancion17prev.jpg");
    $material[] = crear_objeto("Mauro el dinosaurio", 2, [4], null, "iL5nlEq3t4U", "cancion18prev.jpg");
    $material[] = crear_objeto("La Gallina Pintadita", 2, [3], null, "FyVOMX_P3mg", "cancion19prev.jpg");
    $material[] = crear_objeto("La Familia", 2, [3], null, "EwBeSYtSKn4", "cancion20prev.jpg");
    $material[] = crear_objeto("Mi perro Chocolo aprende", 2, [1], null, "wwHTvq-OLHg", "cancion21prev.jpg");
    $material[] = crear_objeto("La hormiguita", 2, [1], null, "tEpufVWNHPw", "cancion22prev.jpg");
    $material[] = crear_objeto("El marinero Baila", 2, [1], null, "uTK_7MOFV4s", "cancion23prev.jpg");
    $material[] = crear_objeto("Pie Pie Pie", 2, [1], null, "SJGvFI9vwEo", "cancion24prev.jpg");
    $material[] = crear_objeto("Fui al Mercado", 2, [1], null, "-YLMgR82cHo", "cancion25prev.jpg");
    $material[] = crear_objeto("La- ballena -Lola", 2, [1], null, "b5PZQ-M6ulA", "cancion26prev.jpg");
    $material[] = crear_objeto("Bugy Bugy", 2, [1], null, "BqOMVDZHYQw", "cancion27prev.jpg");
    $material[] = crear_objeto("Dos Pecesitos", 2, [1], null, "DQb5F26YoLA", "cancion28prev.jpg");
    $material[] = crear_objeto("Cucu Cucu cantaba la rana", 2, [1], null, "56C3xVLMXxk", "cancion29prev.jpg");
    $material[] = crear_objeto("El Monstruo de los colres", 2, [1], null, "dMrn3_cXPR4", "cancion30prev.jpg");
    $material[] = crear_objeto("Cinco ranitas saltaban", 2, [1], null, "pxr-thRvVwE", "cancion31prev.jpg");
    $material[] = crear_objeto("La cancion de la luna", 2, [1], null, "6q38BWTrk8w", "cancion32prev.jpg");
    $material[] = crear_objeto("La Araña chiquitita", 2, [1], null, "HAcM4cZm_DI", "cancion33prev.jpg");
    $material[] = crear_objeto("Mi carita redondita", 2, [1], null, "BvFM2Qx3hSU", "cancion34prev.jpg");
    $material[] = crear_objeto("La mancha del tigre", 2, [1], null, "P3GYSVd_ivo", "cancion35prev.jpg");
    $material[] = crear_objeto("El Oso Goloso", 2, [1], null, "06ydZ2kP4Ek", "cancion36prev.jpg");
    $material[] = crear_objeto("La Jirafa y el Mono", 2, [1], null, "06ydZ2kP4Ek", "cancion37prev.jpg");
    $material[] = crear_objeto("Roco el Huron", 2, [1], null, "hxIIEfP78fA", "cancion38prev.jpg");
    $material[] = crear_objeto("En el fondo del mar", 2, [1], null, "omkpNvrOJVE", "cancion39prev.jpg");

    




    $material[] = crear_objeto("Clo Clo Clotilde", 3, [1], null, null, "clo-clo-clotilde.jpg", null, null, "Clo-Clo-Clotilde.mp4", 640, 352);
    $material[] = crear_objeto("Dino el Dinosuario", 3, [2], null, null, "dino-el-dinosuario.jpg", null, null, "Dino-el-Dinosuario.mp4", 640, 352);
    $material[] = crear_objeto("Autobus de maisy", 3, [2], null, null, "autobus-de-maisy.jpg", null, null, "autobus-de-maisy.mp4", 1920, 1080);
    $material[] = crear_objeto("Donde estan mis patatillas", 3, [2], null, null, "Donde-estan-mis-patatillas.jpg", null, null, "Donde-estan-mis-patatillas.mp4", 640, 480);
    $material[] = crear_objeto("El circo internacional de Dumbo", 3, [2], null, null, "El-circo-internacional-de-Dumbo.jpg", null, null, "El-circo-internacional-de-Dumbo.mp4", 640, 352);
    $material[] = crear_objeto("Los tres cerditos", 3, [2], null, null, "Los-tres-cerditos.jpg", null, null, "Los-tres-cerditos.mp4", 640, 480);
    $material[] = crear_objeto("Me quiero comer un niño", 3, [2], null, null, "me-quiero-comer-un-nino.jpg", null, null, "me-quiero-comer-un-nino.mp4", 1920, 1080);
    $material[] = crear_objeto("Quien viene", 3, [2], null, null, "quien-viene.jpg", null, null, "Quien-viene.mp4", 640, 480);
    $material[] = crear_objeto("Sito esta malito", 3, [2], null, null, "sito-esta-malito.jpg", null, null, "Sito-esta-malito.mp4", 640, 352);
    $material[] = crear_objeto("Cocorico", 3, [2], null, null, "cocorico.jpg", null, null, "cocorico.mp4", 640, 352);
    $material[] = crear_objeto("Gorilon", 3, [2], null, null, "gorilon.jpg", null, null, "gorilon.mp4", 640, 352);
    $material[] = crear_objeto("La Cuncuna", 3, [2], null, null, "la-cuncuna.jpg", null, null, "La-cuncuna.mp4", 640, 352);
    $material[] = crear_objeto("Animales de la granja", 3, [2], null, null, "animales-de-la-granja.jpg", null, null, "animales-de-la-granja.mp4", 640, 352);
    $material[] = crear_objeto("El ratoncito valiente", 3, [2], null, null, "el-ratoncito-valiente.jpg", null, null, "el-ratoncito-valiente.mp4", 640, 352);
    $material[] = crear_objeto("Que veo", 3, [2], null, null, "que-veo.jpg", null, null, "que-veo.mp4", 640, 352);
    $material[] = crear_objeto("Que le pasa a Tinita", 3, [2], null, null, "que-le-pasa-a-tinita.jpg", null, null, "que-le-pasa-a-tinita.mp4", 640, 352);
    $material[] = crear_objeto("Mi día de suerte", 3, [2], null, null, "mi-dia-de-suerte.jpg", null, null, "mi-dia-de-suerte.mp4", 640, 352);
    $material[] = crear_objeto("El ratón que se comió la luna", 3, [2], null, null, "el-raton-que-se-comio-la-luna.jpg", null, null, "el-raton-que-se-comio-la-luna.mp4", 640, 352);
    $material[] = crear_objeto("La clase de las abejitas", 3, [2], null, null, "la-clase-de-las-abejitas.jpg", null, null, "la-clase-de-las-abejitas.mp4", 640, 352);
    $material[] = crear_objeto("El tacto los sentidos y algo mas", 3, [2], null, null, "el-tacto-los-sentidos-y-algo-mas.jpg", null, null, "el-tacto-los-sentidos-y-algo-mas.mp4", 640, 352);
    $material[] = crear_objeto("Los tres cerditos y el lobo", 3, [2], null, null, "los-tres-cerditos-y-el-lobo.jpg", null, null, "los-tres-cerditos-y-el-lobo.mp4", 640, 352);
    $material[] = crear_objeto("Manualidad titere con bolsa", 3, [2], null, null, "manualidad-titeres-con-bolsa-reciclable.jpg", null, null, "manualidad-titeres-con-bolsa-reciclable.mp4", 640, 352);
    $material[] = crear_objeto("Ya no me asusto", 3, [2], null, null, "ya-no-me-asusto.jpg", null, null, "ya-no-me-asusto.mp4", 640, 352);
    $material[] = crear_objeto("Donde esta", 3, [2], null, null, "donde-esta.jpg", null, null, "donde-esta.mp4", 640, 352);
    $material[] = crear_objeto("En el circo", 3, [2], null, null, "en-el-circo.jpg", null, null, "en-el-circo.mp4", 640, 352);
    $material[] = crear_objeto("Mi primer hermanito", 3, [2], null, null, "mi-primer-hermanito.jpg", null, null, "mi-primer-hermanito.mp4", 640, 352);
    $material[] = crear_objeto("Vaya apetito tiene el zorrito", 3, [2], null, null, "vaya-apetito-tiene-el-zorrito.jpg", null, null, "vaya-apetito-tiene-el-zorrito.mp4", 640, 352);
    $material[] = crear_objeto("No te rías pepe", 3, [2], null, null, "no-te-rias-pepe.jpg", null, null, "no-te-rias-pepe.mp4", 640, 352);
    $material[] = crear_objeto("Lobito sentimental", 3, [2], null, null, "lobito-sentimental.jpg", null, null, "lobito-sentimental.mp4", 640, 352);
    $material[] = crear_objeto("Tengo un perrito", 3, [2], null, null, "tengo_un_perrito.jpg", null, null, "tengo_un_perrito.mp4", 640, 352);
    $material[] = crear_objeto("A veces me confunden", 3, [2], null, null, "a_veces_me_confunden.jpg", null, null, "a_veces_me_confunden.mp4", 640, 352);
    $material[] = crear_objeto("El osito panda estaba enojado", 3, [2], null, null, "el_osito_panda_estaba_enojado.jpg", null, null, "el_osito_panda_estaba_enojado.mp4", 640, 352);
    $material[] = crear_objeto("Mauro es un dinosaurio", 3, [2], null, null, "mauro_es_un_dinosaurio.jpg", null, null, "mauro_es_un_dinosaurio.mp4", 640, 352);
    $material[] = crear_objeto("El estofado del lobo", 3, [2], null, null, "el-estofado-del-lobo.jpg", null, null, "el-estofado-del-lobo.mp4", 640, 352);
    $material[] = crear_objeto("Presentacion mounstro de la laguna", 3, [2], null, null, "presentacion_mounstro_de_la_laguna.jpg", null, null, "presentacion_mounstro_de_la_laguna.mp4", 640, 352);
    $material[] = crear_objeto("El apetito del zorrito", 3, [2], null, null, "dia_del_libro.jpg", null, null, "dia_del_libro.mp4", 640, 352);
    $material[] = crear_objeto("Día de campo de Don Chancho", 3, [2], null, null, "dia-de-campo-de-don-chancho.jpg", null, null, "dia-de-campo-de-don-chancho.mp4", 640, 352);
    $material[] = crear_objeto("Musical de la Familia", 3, [2], null, null, "musical-de-la-familia.jpg", null, null, "musical-de-la-familia.mp4", 640, 352);
    $material[] = crear_objeto("Figuras Geometricas", 3, [2], null, null, "figuras-geometricas.jpg", null, null, "figuras-geometricas.mp4", 640, 352);
    $material[] = crear_objeto("Cocodrilo y Raton", 3, [2], null, null, "cocodrilo-y-raton.jpg", null, null, "cocodrilo-y-raton.mp4", 640, 352);
    $material[] = crear_objeto("Animales Salvajes El Mono", 3, [2], null, null, "animales-salvajes-el-mono.jpg", null, null, "animales-salvajes-el-mono.mp4", 640, 352);
    $material[] = crear_objeto("Las Frutas Los Colores", 3, [2], null, null, "las-frutas-los-colores.jpg", null, null, "las-frutas-los-colores.mp4", 640, 352);
    $material[] = crear_objeto("Los Colores Gaston y Gastoncito", 3, [2], null, null, "los-colores-gaston-y-gastoncito.jpg", null, null, "los-colores-gaston-y-gastoncito.mp4", 640, 352);
    $material[] = crear_objeto("Mi familia", 3, [2], null, null, "mi-familia.jpg", null, null, "mi-familia.mp4", 640, 352);
    $material[] = crear_objeto("Autos", 3, [2], null, null, "autos.jpg", null, null, "autos.mp4", 640, 352);
    $material[] = crear_objeto("Conejito y sus emociones", 3, [2], null, null, "conejito-y-sus-emociones.jpg", null, null, "conejito-y-sus-emociones.mp4", 640, 352);
    $material[] = crear_objeto("Saludo", 3, [2], null, null, "saludo.jpg", null, null, "saludo.mp4", 640, 352);
    $material[] = crear_objeto("Familia", 3, [2], null, null, "familia.jpg", null, null, "familia.mp4", 640, 352);
    $material[] = crear_objeto("La importancia de bañarse", 3, [2], null, null, "la-importancia-de-banarse.jpg", null, null, "la-importancia-de-banarse.mp4", 640, 352);
    $material[] = crear_objeto("Avión", 3, [2], null, null, "avion.jpg", null, null, "avion.mp4", 640, 352);
    $material[] = crear_objeto("Elefante y colores", 3, [2], null, null, "elefante-y-colores.jpg", null, null, "elefante-y-colores.mp4", 640, 352);

    $material[] = crear_objeto("Saludo", 3, [2], null, null, "saludo2.jpg", null, null, "saludo2.mp4", 640, 352);
    $material[] = crear_objeto("Pintura Simetrica", 3, [2], null, null, "pintura-simetrica.jpg", null, null, "pintura-simetrica.mp4", 640, 352);
    $material[] = crear_objeto("Los Numeros", 3, [2], null, null, "los-numeros.jpg", null, null, "los-numeros.mp4", 640, 352);
    $material[] = crear_objeto("Las Plantas", 3, [2], null, null, "las-plantas.jpg", null, null, "las-plantas.mp4", 640, 352);
    $material[] = crear_objeto("Barco", 3, [2], null, null, "barco.jpg", null, null, "barco.mp4", 640, 352);
    $material[] = crear_objeto("Lavado de manos", 3, [2], null, null, "lavado-de-manos.jpg", null, null, "lavado-de-manos.mp4", 640, 352);
    $material[] = crear_objeto("Paleta de emociones", 3, [2], null, null, "paleta-de-emociones.jpg", null, null, "paleta-de-emociones.mp4", 640, 352);
    $material[] = crear_objeto("A lavarse los dientes", 3, [2], null, null, "a-lavarse-los-dientes.jpg", null, null, "a-lavarse-los-dientes.mp4", 640, 352);
    $material[] = crear_objeto("Pato", 3, [2], null, null, "pato.jpg", null, null, "pato.mp4", 640, 352);
    $material[] = crear_objeto("Gallina", 3, [2], null, null, "gallina.jpg", null, null, "gallina.mp4", 640, 352);
    


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
            
        }else{
            header('HTTP/1.1 404 Not Found', true, 404);
            include('./404.php');
            exit;
        }
    }else{
        $style_conozcanos = "opacity: 1; top: 0px";
    }

    $dir = $url['dir']."online/cuentos";
    $cuentos = array_diff(scandir($dir), array('..', '.'));
    foreach($cuentos as $valor){
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
                $fotos_cuentos[$valor][] = $aux_file[$i];
            }
            closedir($handler);
        }
    }

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165015206-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-165015206-1');
        </script>

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
            var fotos_cuentos = <?php echo json_encode($fotos_cuentos); ?>;
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
            <div class="web" style="display: none">
                <div class="contenido">
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
                <div class="curso">
                    <div class="hada valign"><img src="<?php echo $url['path']; ?>img/hada.png" alt=""></div>
                    <div class="mensaje"><div class="valign msg">En estos momentos que estamos cuidándonos para que no se propague el coronavirus y nos piden que no salgamos de casa.<br/>Nuestro compromiso es continuo con todas las familias del Valle Encantado, queremos seguir colaborando para estimular y que los niños y niñas a través del juego y de los cuentos puedan seguir aprendiendo.</div></div>
                    <div class="ver_cursos" onclick="curso_paso_3()">Ingresa aquí</div>
                    <div class="volver" onclick="ver_sitio()">Deseo ir al sitio</div>
                    <div class="detalle_curso">
                        <div class="curso_titulo">
                            <div class="new_logo valign">
                                <div class="dlogo"><img src="<?php echo $url['path']; ?>img/hada_chica.png" alt="" /></div>
                                <div class="dtitulo"><div class="valign"><h1>Cursos Online</h1><h2>Jardin Valle Encantado</h2></div></div>
                            </div>
                            <div class="botones valign">
                                <div class="boton" onclick="ver_cuentos()"><img src="<?php echo $url['path']; ?>online/cuentos.png" alt="" /><span>Cuentos</span></div>
                                <div class="boton" onclick="ver_trabajos()"><img src="<?php echo $url['path']; ?>online/cuentos.png" alt="" /><span>Cuentos Narrados</span></div>
                                <div class="boton" onclick="ver_canciones()"><img src="<?php echo $url['path']; ?>online/canciones.png" alt="" /><span>Canciones</span></div>
                            </div>
                        </div>
                        <div class="curso_lista" id="curso_lista"></div>
                        <div class="curso_contenido" onclick="hide_lista()">
                            <div class="pagina_inicio"></div>
                            <div class="cuentos">
                                <div class='flipbook-viewport'><div class='container'></div></div>
                            </div>
                            <div id="player"></div>
                            <div class="trabajos">
                                <video id="video" class="vhalign" width="100%" height="100%"></video>
                            </div>
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
                            <!--
                            <div class="menu_data_titulo">
                                <div class="menu_data_hada"><img src="<?php echo $url['path']; ?>img/hada_chica.png" alt=""></div>
                                <div class="menu_data_nombre valign"><div class="menu_data_nombre_1">Valle Encantado</div><div class="menu_data_nombre_2">Jardin Infantil - Sala Cuna</div></div>
                            </div>
                            -->
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
