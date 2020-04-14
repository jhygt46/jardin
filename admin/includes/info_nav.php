<?php
    	
		$array[0]["nombre"] = "Alumnos";
        $array[0]["link"] = "pages/_jardinva_info_alumnos.php";
        $array[1]["nombre"] = "Cursos";
        $array[1]["link"] = "pages/_jardinva_crear_cursos.php";
        $array[2]["nombre"] = "Boletas";
        $array[2]["link"] = "pages/_jardinva_crear_boletas.php";
    
    	if(isset($array)){
        
        	$aux["ico"] = 4;
        	$aux["categoria"] = "Informacion";
        	$aux["subcategoria"] = $array;
        	$menu[] = $aux;
        	unset($aux);
        	unset($array);
        
    	}
		
    	$array[0]["nombre"] = "Ingresar Usuarios";
    	$array[0]["link"] = "pages/crear_usuario.php";
        $array[1]["nombre"] = "Prestamos";
        $array[1]["link"] = "pages/_jardinva_prestamos.php";
		$array[2]["nombre"] = "Codigos QR";
        $array[2]["link"] = "pages/_jardinva_codigoqr.php";
    
    	if(isset($array)){
    
        	$aux["ico"] = 2;
        	$aux["categoria"] = "Biblioteca";
        	$aux["subcategoria"] = $array;
        	$menu[] = $aux;
        	unset($aux);
        	unset($array);
    	}

		$array[0]["nombre"] = "Ingresar Material";
    	$array[0]["link"] = "pages/_jardinva_crear_material.php";
    
    	if(isset($array)){
    
        	$aux["ico"] = 3;
        	$aux["categoria"] = "Curso Online";
        	$aux["subcategoria"] = $array;
        	$menu[] = $aux;
        	unset($aux);
        	unset($array);
        
    	}

?>