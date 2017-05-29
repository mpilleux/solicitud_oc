 <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      
      <h4 class="header center orange-text">Solicitud de Orden de Compra</h1>
      


    <form class="col s5" id="formulario_oc">
		<div class="row">
			
			<div class="input-field col s6">
				<select id="centro_costo" name="centro_costo" class="validate" required>
				  <option value="" disabled selected></option>
				  <option value="CC0001HTX01">CC0001HTX01</option>
				  <option value="CC0001HTX02">CC0001HTX02</option>
				  <option value="CC0001HTX03">CC0001HTX03</option>
				  <option value="CC0001HTX04">CC0001HTX04</option>
				</select>
				<label for="centro_costo">Centro de Costo</label>
			</div>
			
			<div class="input-field col s6">
			  <input id="proveedor" name="proveedor" type="text" class="validate" required>
			  <label for="proveedor">Proveedor</label>
			</div>


			<div class="input-field col s6">
			  <input id="monto" name="monto" type="number" class="validate" required>
			  <label for="monto">Monto [$]</label>
			</div>
			
			<div class="input-field col s6">
			  <input type="date" class="datepicker" id="fecha_entrega" name="fecha_entrega" required>
			   <label for="fecha_entrega">Fecha de entrega</label>
			</div>

			<div class="input-field col s12">
			  <textarea id="descripcion" name="descripcion" class="materialize-textarea" data-length="220" required></textarea>
			  <label for="descripcion">Descripción</label>
			</div>
			<div class="input-field col s12">
				<button class="btn waves-effect waves-light" type="button" name="action" onClick="postOC();">Guardar
					<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
    </form>
<script>
   
  $(document).ready(function() {
    $('textarea#descripcion').characterCounter();
	$('.datepicker').pickadate({
		format: 'dd/mm/yyyy',
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15 // Creates a dropdown of 15 years to control year
	  });
	   $('select').material_select();
  });
  
	function objectifyForm(formArray) {//serialize data function

		var returnArray = {};
		for (var i = 0; i < formArray.length; i++){
		returnArray[formArray[i]['name']] = formArray[i]['value'];
		}
		return returnArray;
	}
	
	function postOC(){
		
		var process = function(response){
			console.log(response);
		}
		
		postAPI('<?php echo base_url();?>index.php/main_controller/postOC',process, objectifyForm($('#formulario_oc').serializeArray()));
	}
  
  </script>
  </div>
  </div>
  
  