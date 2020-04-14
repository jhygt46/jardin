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
$in->add('id_user', 'int(4)', 0, null, 1, 1);
$in->add('nombre', 'varchar(255) COLLATE utf8_spanish2_ci', 0, 'Eliana');
$in->add('correo', 'varchar(255) COLLATE utf8_spanish2_ci', 0, 'elibruzzo@hotmail.com');
$in->add('pass', 'varchar(32) COLLATE utf8_spanish2_ci', 0, 'bed319758c912ff419e1f0722468e572');
$in->add('code_cookie', 'varchar(50) COLLATE utf8_spanish2_ci', 0, '');
$in->add('fecha_creado', 'datetime', 0, '');
$in->add('tipo', 'tinyint(1)', 0, 0);
$in->add('perm_ingreso', 'tinyint(1)', 0, 1);
$in->add('perm_prestamo', 'tinyint(1)', 0, 1);
$in->add('perm_devolucion', 'tinyint(1)', 0, 2);
$in->add('perm_edicion', 'tinyint(1)', 0, 1);
$in->add('eliminado', 'tinyint(1)', 0, 0);
$in->add_tabla();

$in->crearTable('_jardinva_cursos');
$in->add('id_cur', 'int(4)', 0, null, 1, 1);
$in->add('nombre', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('parent_id', 'int(4)', 0);
$in->add('orders', 'int(4)', 0);
$in->add('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_alumnos');
$in->add('id_alu', 'int(4)', 0, null, 1, 1);
$in->add('nmatricula', 'int(4)', 0);
$in->add('nombres', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('apellido_p', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('apellido_m', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('rut', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('sexo', 'tinyint(1)', 0);
$in->add('direccion', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('fecha_nacimiento', 'date', 0);
$in->add('fecha_matricula', 'date', 0);
$in->add('fecha_ingreso', 'date', 0);
$in->add('fecha_creado', 'datetime', 0);
$in->add('fecha_retiro', 'date', 0);
$in->add('motivo_retiro', 'tinyint(1)', 0);
$in->add('observaciones', 'text', 0);
$in->add('nombre_apoderado', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('telefono_apoderado', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('email_apoderado', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('nombre_01', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('celular_01', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('email_01', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('nombre_02', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('celular_02', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('email_02', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('orders', 'int(4)', 0);
$in->add('rr', 'int(4)', 0);
$in->add('id_cur', 'int(4)', 0, null, null, null, 1, 1, 0);
$in->add('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_libros');
$in->add('id_lib', 'int(4)', 0, null, 1, 1);
$in->add('nombre', 'varchar(255) COLLATE utf8_spanish2_ci', 0);
$in->add('qr', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('fecha_ingreso', 'datetime', 0);
$in->add('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_boletas');
$in->add('id_bol', 'int(4)', 0, null, 1, 1);
$in->add('numero', 'smallint(2)', 0);
$in->add('dia', 'smallint(2)', 0);
$in->add('mes', 'smallint(2)', 0);
$in->add('ano', 'smallint(2)', 0);
$in->add('tipo', 'tinyint(1)', 0);
$in->add('nula', 'tinyint(1)', 0);
$in->add('matricula', 'int(4)', 0);
$in->add('mjardin', 'int(4)', 0);
$in->add('msalacuna', 'int(4)', 0);
$in->add('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_prestamos');
$in->add('id_pre', 'int(4)', 0, null, 1, 1);
$in->add('id_lib', 'int(4)', 0, null, null, null, 1, 3, 0);
$in->add('id_alu', 'int(4)', 0, null, null, null, 1, 2, 0);
$in->add('id_user_presto', 'int(4)', 0); // REFERENCIA??
$in->add('fecha_presto', 'datetime', 0);
$in->add('id_user_devolvio', 'int(4)', 0); // REFERENCIA??
$in->add('fecha_devolvio', 'datetime', 0);
$in->add('email', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_material');
$in->add('id_mat', 'int(4)', 0, null, 1, 1);
$in->add('titulo', 'varchar(80) COLLATE utf8_spanish2_ci', 0);
$in->add('tipo', 'tinyint(1)', 0);
$in->add('preview', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('youtube', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('video', 'varchar(30) COLLATE utf8_spanish2_ci', 0);
$in->add('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->crearTable('_jardinva_material_fotos');
$in->add('id_maf', 'int(4)', 0, null, 1, 1);
$in->add('nombre', 'varchar(80) COLLATE utf8_spanish2_ci', 0);
$in->add('id_mat', 'int(4)', 0, null, null, null, 1, 6, 0);
$in->add('eliminado', 'tinyint(1)', 0);
$in->add_tabla();

$in->ejecutar(true);
$in->detalle(2);
$in->process();
//$in->llenar_data('http://www.usinox.cl/aux.php?aux=');
