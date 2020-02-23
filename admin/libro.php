<?php

if($_SERVER["HTTP_HOST"] == "localhost"){
    define("DIR_BASE", $_SERVER["DOCUMENT_ROOT"]."/");
    define("DIR", DIR_BASE."jardin/");
}else{
    define("DIR_BASE", "/var/www/html/");
    define("DIR", DIR_BASE."jardin/");
}

require_once DIR."admin/class/libro_class.php";
$libro = new Libro();

$lib = $libro->get_libro();
$usr = $libro->get_user();

if($usr['user'] == 1){
	$prestados = $libro->prestados_user($usr['id_user']);
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
        <link href="https://fonts.googleapis.com/css?family=Sriracha&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/admin/css/libro.css" media="all" />
        <script src="/js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <script>
		var id_alu = 0;
		var id_lib = <?php echo (isset($lib["id_lib"])) ? $lib["id_lib"] : 0 ; ?>;
		var qr = "<?php echo $_GET["id"]; ?>";
		<?php if($usr["user"] == 1){ ?>
		<?php if($usr["perm_prestamo"] == 1){ ?>
		<?php $alumnos = json_encode($libro->get_alumnos()); ?>
		var alumnos = <?php echo $alumnos; ?>;
		function buscar_alumno_sin_bolsa(e){ 
			var txt = e.value.toLowerCase();
			var max = 10;
			var mostradas = 0;
			document.getElementById("lista_alumnos_sin_bolsa").innerHTML = "";
			document.getElementById("enviar_sin_bolsa").style.display = "none";
			for(var i=0, ilen=alumnos.length; i<ilen; i++){
				if(alumnos[i].nombre.toLowerCase().indexOf(txt) != -1){
					if(max >= mostradas){
						document.getElementById("lista_alumnos_sin_bolsa").appendChild(item_alumnos_sin_bolsa(alumnos[i].id, alumnos[i].nombre));
						mostradas++;
					}
				}
			}
		}
		function item_alumnos_sin_bolsa(id, nombre){
			var div = create_element_class("item_alumno");
			div.onclick = function(){ seleccionar_alumno_sin_bolsa(id, nombre) };
			div.innerHTML = nombre;
			return div;
		}
		function create_element_class(clase){
    			var Div = document.createElement('div');
    			Div.className = clase;
    			return Div;
		}
		function seleccionar_alumno_sin_bolsa(id, nombre){
			id_alu = id;
			document.getElementById("lista_alumnos_sin_bolsa").innerHTML = "";
			document.getElementById("buscar_alumno_sin_bolsa").value = nombre;
			document.getElementById("enviar_sin_bolsa").style.display = "block";
		}
		var m = 0;
		function mostrar_prestamos(){
			if(m == 0){
				document.getElementById("cont_datos").style.display = "block";
				m = 1;
			}else{
				document.getElementById("cont_datos").style.display = "none";
				m = 0;
			}
		}
		<?php } ?>
		<?php } ?>
		<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
		<?php if($lib["estado"]["prestado"] == 0 && $usr["perm_prestamo"] == 1){ ?>
		function buscar_alumno(e){ 
			var txt = e.value.toLowerCase();
			var max = 10;
			var mostradas = 0;
			document.getElementById("lista_alumnos").innerHTML = "";
			document.getElementById("prestar").style.display = "none";
			for(var i=0, ilen=alumnos.length; i<ilen; i++){
				if(alumnos[i].nombre.toLowerCase().indexOf(txt) != -1){
					if(max >= mostradas){
						document.getElementById("lista_alumnos").appendChild(item_alumnos(alumnos[i].id, alumnos[i].nombre, alumnos[i].count));
						mostradas++;
					}
				}
			}
		}
		function item_alumnos(id, nombre, count){
			var div = create_element_class("item_alumno");
			div.onclick = function(){ seleccionar_alumno(id, nombre) };
			div.innerHTML = nombre + " (" + count + ")";
			return div;
		}
		function create_element_class(clase){
    			var Div = document.createElement('div');
    			Div.className = clase;
    			return Div;
		}
		function seleccionar_alumno(id, nombre){
			id_alu = id;
			document.getElementById("lista_alumnos").innerHTML = "";
			document.getElementById("buscar_alumno").value = nombre;
			document.getElementById("prestar").style.display = "block";
		}
		<?php } ?>
		<?php } ?>
		<?php if($usr["user"] == 1){ ?>
		<?php if($usr["perm_ingreso"] == 1 || $usr["perm_edicion"] == 1){ ?>
		function enviar_libro(n){
			var nombre = "";
			if(n == 1){ nombre = document.getElementById("ingresar_libro").value; }
			if(n == 2){ nombre = document.getElementById("editar_libro").value; }
			if(nombre != ""){
    				var send = { accion: 'nuevo_libro', nombre: nombre, qr: qr, id_lib: id_lib };
    				$.ajax({
        				url: '/admin/ajax/libro.php',
        				type: "POST",
        				data: send,
        				success: function(data){ if(JSON.parse(data).op == 1){ location.reload(); return false; }},
					error: function(e){ console.log(e); }
    				});
			}else{
				alert("Debe ingresar el nombre del libro");
			}
		}
		<?php } ?>
		<?php } ?>
		<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
		<?php if($lib["estado"]["prestado"] == 0 && $usr["perm_prestamo"] == 1){ ?>
		var flag_prestamo = 0;
		function enviar_prestamo(){
			if(flag_prestamo == 0){
				if(id_alu > 0){
					flag_prestamo = 1;
    					var send = { accion: 'prestar_libro', id_lib: id_lib, id_alu: id_alu };
    					$.ajax({
        					url: '/admin/ajax/libro.php',
        					type: "POST",
        					data: send,
        					success: function(data){ if(JSON.parse(data).op == 1){ location.reload(); return false; }else{ flag_prestamo = 0; alert(JSON.parse(data).msg) }},
						error: function(e){ alert(e); }
    					});
				}else{
					alert("Debe seleccionar alumno");
				}
			}
		}
		var flag_sin_bolsa = 0;
		function enviar_sin_bolsa(){
			if(id_alu > 0){
				if(flag_sin_bolsa == 0){
					flag_sin_bolsa = 1;
					var send = { accion: 'sin_bolsa', id_alu: id_alu };
    					$.ajax({
        					url: '/admin/ajax/libro.php',
        					type: "POST",
        					data: send,
        					success: function(data){ if(JSON.parse(data).op == 1){ location.reload(); return false; }else{ flag_sin_bolsa = 0; alert(JSON.parse(data).msg); }},
						error: function(e){ alert(e); }
    					});
				}
			}else{
				alert("Debe seleccionar alumno");
			}
		}
		<?php } ?>
		<?php } ?>

		<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
		<?php if($lib["estado"]["prestado"] == 1 && ($usr["perm_prestamo"] == 2 || ($usr["perm_prestamo"] == 1 && $usr["id_user"] == $lib["estado"]["id_user_presto"]))){ ?>
		var flag_devoucion = 0;
		function devolver_prestamo(){
			if(flag_devoucion == 0){
				flag_devoucion = 1;
				var send = { accion: 'devolver_libro', id_lib: id_lib };
    				$.ajax({
        				url: '/admin/ajax/libro.php',
        				type: "POST",
        				data: send,
        				success: function(data){ if(JSON.parse(data).op == 1){ location.reload(); return false; }else{ flag_devoucion = 0; alert(JSON.parse(data).msg); }},
					error: function(e){ alert(e); }
    				});
			}
		}
		<?php } ?>
		<?php } ?>
		
		<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
		<?php if($usr["perm_edicion"] == 1){ ?>
		function mostrar_editar(){
			document.getElementById("edit_nom").style.display = "block";
			document.getElementById("edit_acc").style.display = "none";
		}
		<?php } ?>
		<?php } ?>
	
	</script>
	<style>
		
	</style>
    </head>
    <body>
	
	<?php if($lib["lib"] == 0 && $usr["user"] == 1){ ?>
	<?php if($usr["perm_ingreso"] == 1){ ?>
	<div class="ingresar_libro">
		<div class="libro_titulo">Ingresar Nombre del Libro</div>
		<div class="libro_nombre"><input type="text" id="ingresar_libro" value=""></div>
		<div class="ingresar" onclick="enviar_libro(1)">Ingresar</div>
	</div>
	<?php } ?>
	<?php } ?>

	<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
	<?php if($usr["perm_edicion"] == 1){ ?>
	<div class="ingresar_libro" id="edit_nom" style="display: none">
		<div class="libro_titulo">Editar Nombre del Libro</div>
		<div class="libro_nombre"><input type="text" id="editar_libro" value="<?php echo $lib["nombre"]; ?>"></div>
		<div class="ingresar" onclick="enviar_libro(2)">Editar</div>
	</div>
	<?php } ?>
	<?php } ?>

	<?php if($lib["lib"] == 1){ ?>
	<?php if($usr["user"] == 0){ ?><div class="encabezado">Jardin Valle Encantado</div><div class="hada"><img src="/img/hada.png" alt="" /></div><?php } ?>
	<div class="nombre_libro" id="edit_acc" <?php if($lib["lib"] == 1 && $usr["user"] == 1){ if($usr["perm_edicion"] == 1){ ?>onclick="mostrar_editar()"<?php }} ?>>
		<div class="nombre"><?php echo $lib["nombre"]; ?></div>
		<div class="alumno">Prestado a <?php echo $lib["estado"]["nombre"]; ?></div>
		<div class="fecha">Fecha entrega <?php echo date("d-m-Y", strtotime($lib["estado"]["fecha_presto"]) + 432000); ?></div>
	</div>
	<?php } ?>

	<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
	<?php if($lib["estado"]["prestado"] == 0 && $usr["perm_prestamo"] == 1){ ?>
	<div class="busqueda_alumno">
		<div class="busqueda_titulo">Prestar Libro</div>
		<div class="ingreso_nombre"><input type="text" id="buscar_alumno" onkeyup="buscar_alumno(this)"></div>
		<div class="lista" id="lista_alumnos">
		<?php for($i=0; $i<count($usr["ultimos_alumnos"]); $i++){ ?>
			<div class="item_alumno" onclick="seleccionar_alumno(<?php echo $usr["ultimos_alumnos"][$i]["id"]; ?>, '<?php echo $usr["ultimos_alumnos"][$i]["nombre"]; ?>')"><?php echo $usr["ultimos_alumnos"][$i]["nombre"]; ?> - (<?php echo $usr["ultimos_alumnos"][$i]["count"]; ?>)</div>
		<?php } ?>
		</div>
		<div class="prestar" id="prestar" onclick="enviar_prestamo()">Prestar</div>
	</div>
	<?php } ?>
	<?php } ?>

	<?php if($lib["lib"] == 1 && $usr["user"] == 1){ ?>
	<?php if($lib["estado"]["prestado"] == 1 && ($usr["perm_prestamo"] == 2 || ($usr["perm_prestamo"] == 1 && $usr["id_user"] == $lib["estado"]["id_user_presto"]))){ ?>
	<div class="devolucion_libro">
		<div class="devolver" id="devolver" onclick="devolver_prestamo()">Devolver</div>
	</div>
	<?php } ?>
	<?php } ?>
	<?php if($usr["user"] == 1 && count($prestados) > 0){ ?>
	<div class="prestados">
		<div class="titulo" onclick="mostrar_prestamos()"><div class="mas"></div><div class="menos"></div><div class="texto">Libros Prestados (<?php echo count($prestados); ?>)</div></div>
		<div class="cont_datos" id="cont_datos">
			<?php for($i=0; $i<count($prestados); $i++){ $dias = (time() - strtotime($prestados[$i]['fecha_presto']))/86400; ?>
			<div class="datos">
				<div class="alumno"><?php echo $prestados[$i]['nombres']; ?> <?php echo $prestados[$i]['apellido_p']; ?> <?php echo $prestados[$i]['apellido_m']{0}."."; ?> (<?php echo intval($dias); ?> dias)</div>
				<div class="libro"><?php echo $prestados[$i]['nombre']; ?></div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<?php if($usr["user"] == 1){ ?>
	<?php if($usr["perm_prestamo"] == 1){ ?>
	<div class="busqueda_alumno">
		<div class="busqueda_titulo">Aviso sin bolsa</div>
		<div class="ingreso_nombre"><input type="text" id="buscar_alumno_sin_bolsa" onkeyup="buscar_alumno_sin_bolsa(this)"></div>
		<div class="lista" id="lista_alumnos_sin_bolsa"></div>
		<div class="prestar" id="enviar_sin_bolsa" onclick="enviar_sin_bolsa()">Sin Bolsa</div>
	</div>
	<?php } ?>
	<?php } ?>

    </body>
</html>

<?php

/*
echo "<pre>";
print_r($lib);
echo "</pre>";

echo "<pre>";
print_r($usr);
echo "</pre>";

echo "<pre>";
print_r($prestados);
echo "</pre>";
*/

?>