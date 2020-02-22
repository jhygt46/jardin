<?php
set_time_limit(0);

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

require_once DIR."/admin/class/install_class.php";
$in = new Install();

$in->crearTable('usuarios');
$in->addCampo('id_user', 'int(4)', 0, null, 1, 1);
$in->addCampo('nombre', 'varchar(255) COLLATE utf8_spanish2_ci', 0, 'Diego');
$in->addCampo('correo', 'varchar(255) COLLATE utf8_spanish2_ci', 0, 'Buena@Nelson');
$in->addCampo('pass', 'varchar(32) COLLATE utf8_spanish2_ci', 0, 'purospuntitos');
$in->addCampo('code_cookie', 'varchar(50) COLLATE utf8_spanish2_ci', 0, '');
$in->addCampo('fecha_creado', 'datetime', 0, '');
$in->addCampo('intentos', 'smallint(2)', 0, 0);
$in->addCampo('block', 'tinyint(1)', 0, 0);
$in->addCampo('fecha_block', 'datetime', 0, '');
$in->addCampo('admin', 'tinyint(1)', 0, 1);
$in->addCampo('tipo', 'tinyint(1)', 0, 1);
$in->addCampo('perm_ingreso', 'tinyint(1)', 0, 1);
$in->addCampo('perm_existente', 'tinyint(1)', 0, 1);
$in->addCampo('perm_prestamo', 'tinyint(1)', 0, 1);
$in->addCampo('perm_devolucion', 'tinyint(1)', 0, 2);
$in->addCampo('perm_historial', 'tinyint(1)', 0, 1);
$in->addCampo('perm_edicion', 'tinyint(1)', 0, 1);
$in->addCampo('eliminado', 'tinyint(1)', 0, 0);
$in->add_tabla();

$in->crearTable('_jardinva_cursos');
$in->addCampo('id_cur', 'int(4)', 0, null, 1, 1);
$in->addCampo('nombre', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('parent_id', 'int(4)', 0);
$in->addCampo('orders', 'int(4)', 0);
$in->addCampo('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_alumnos');
$in->addCampo('id_alu', 'int(4)', 0, null, 1, 1);
$in->addCampo('nmatricula', 'int(4)', 0);
$in->addCampo('nombres', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('apellido_p', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('apellido_m', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('rut', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('sexo', 'tinyint(1)', 0);
$in->addCampo('direccion', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('fecha_nacimiento', 'date', 0);
$in->addCampo('fecha_matricula', 'date', 0);
$in->addCampo('fecha_ingreso', 'date', 0);
$in->addCampo('fecha_creado', 'datetime', 0);
$in->addCampo('fecha_retiro', 'date', 0);
$in->addCampo('motivo_retiro', 'tinyint(1)', 0);
$in->addCampo('observaciones', 'text', 0);
$in->addCampo('nombre_apoderado', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('telefono_apoderado', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('email_apoderado', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('nombre_01', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('celular_01', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('email_01', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('nombre_02', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('celular_02', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('email_02', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('orders', 'int(4)', 0);
$in->addCampo('rr', 'int(4)', 0);
$in->addCampo('id_cur', 'int(4)', 0, null, null, null, 1, 1, 0);
$in->addCampo('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_libros');
$in->addCampo('id_lib', 'int(4)', 0, null, 1, 1);
$in->addCampo('nombre', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('codigo', 'varchar(20) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('qr', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->addCampo('fecha_ingreso', 'datetime', 0);
$in->addCampo('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_boletas');
$in->addCampo('id_bol', 'int(4)', 0, null, 1, 1);
$in->addCampo('numero', 'smallint(2)', 0);
$in->addCampo('dia', 'smallint(2)', 0);
$in->addCampo('mes', 'smallint(2)', 0);
$in->addCampo('ano', 'smallint(2)', 0);
$in->addCampo('tipo', 'tinyint(1)', 0);
$in->addCampo('nula', 'tinyint(1)', 0);
$in->addCampo('matricula', 'int(4)', 0);
$in->addCampo('mjardin', 'int(4)', 0);
$in->addCampo('msalacuna', 'int(4)', 0);
$in->addCampo('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_prestamos');
$in->addCampo('id_pre', 'int(4)', 0, null, 1, 1);
$in->addCampo('id_lib', 'int(4)', 0, null, null, null, 1, 3, 0);
$in->addCampo('id_alu', 'int(4)', 0, null, null, null, 1, 2, 0);
$in->addCampo('id_user_presto', 'int(4)', 0); // REFERENCIA??
$in->addCampo('fecha_presto', 'datetime', 0);
$in->addCampo('id_user_devolvio', 'int(4)', 0); // REFERENCIA??
$in->addCampo('fecha_devolvio', 'datetime', 0);
$in->addCampo('email', 'tinyint(1)', 0);
$in->addCampo('estado', 'tinyint(1)', 0);
$in->addCampo('comentario', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add_tabla();


$in->ejecutar(true);
$in->process();
/*
$in->llenar_data('http://www.jardinvalleencantado.cl/aux.php?aux=');
*/
