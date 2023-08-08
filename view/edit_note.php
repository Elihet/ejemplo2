<?php
$id = $producto = $total=$importe = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["producto"])) $producto = $dataToView["data"]["producto"];
if(isset($dataToView["data"]["importe"])) $importe = $dataToView["data"]["importe"];
if(isset($dataToView["data"]["total"])) $total = $dataToView["data"]["total"];

?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=note&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=note&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		 
		<div class="form-group mb-2">
			<label>Valor 1</label>
			<input type="number" class="form-control" onkeydown="calcularConEnter(event)" style="white-space: pre-wrap;" id="valor1" name="valor1"><?php echo $importe; ?></input>
			<label>Valor2</label>
			<input type="number" class="form-control" onkeydown="calcularConEnter(event)" style="white-space: pre-wrap;" id="valor2" name="valor2"><?php echo $importe; ?></input>
				
		</div>
		<div class="form-group mb-2">
			<label>Respuesta</label>

			<textarea class="form-control" style="white-space: pre-wrap;" name="total" id="total"><?php echo $total; ?></textarea>
		</div>
		
	</form>
</div>


<script>
        function calcularConEnter(event) {
            calcula();
        }

        
        function calcula() {
        	var mensaje="";
            var val1 = parseFloat(document.getElementById('valor1').value);
            var val2 = parseFloat(document.getElementById('valor2').value);

            //Calcula el resultado y el residuo
			var resultado = val1 / val2;
			var residuo = val1 % val2;
			if(residuo==0){
				mensaje = "Es número "+val1+" Si es divisible con el numero "+val2;
			}else{
				mensaje = "No es divisible";
 			}

             document.getElementById('total').value = mensaje;
        }
    </script>