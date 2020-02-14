<?php

session_start();
if(!isset($_SESSION['user']['info']['id_user'])){
    exit;
}

?>
<script>
	function abrir_qr(){

		var cant = document.getElementById("cantidad").value;
		var ti = document.getElementById("tipo").value;
		var tamano = document.getElementById("tamano").value;
		window.open("http://www.jardinvalleencantado.cl/admin/pages/_jardinva_codigosqr_ver.php?cantidad="+cant+"&x="+ti+"&size="+tamano, "_blank", "width=1200,height=700");

	}
</script>
<div class="title">
    <h1>Codigos Qr</h1>
    <ul class="clearfix">
        <li class="back" onclick="backurl()"></li>
    </ul>
</div>
<hr>
<div class="info">
    <div class="fc" id="info-0">
        <div class="minimizar m1"></div>
        <div class="close"></div>
        <div class="name">Configuraci&oacute;n</div>
        <div class="message"></div>
        <div class="sucont">

            <form action="" method="post" class="basic-grey">
                <fieldset>
                    <label>
                        <span>Cantidad:</span>
                        <input id="cantidad" type="text" value="100" require="" placeholder="" />
                        <div class="mensaje"></div>
                    </label>
		    <label>
                        <span>Tipo:</span>
                        <select id="tipo">
				<option value="L">L</option>
				<option value="M">M</option>
				<option value="Q">Q</option>
				<option value="H">H</option>
			</select>
                        <div class="mensaje"></div>
                    </label>
		    <label>
                        <span>Tamaño:</span>
                        <select id="tamano">
				<?php for($i=1; $i<11; $i++){ ?>
				<option value="<?php echo $i; ?>" <?php echo ($i == 5) ? 'selected' : '' ; ?>><?php echo $i; ?></option>
				<?php } ?>
			</select>
                        <div class="mensaje"></div>
                    </label>
                    <label style='margin-top:20px'>
                        <span>&nbsp;</span>
                        <a id='button' onclick="abrir_qr()">Enviar</a>
                    </label>
                </fieldset>
            </form>
            
        </div>
    </div>
</div>
