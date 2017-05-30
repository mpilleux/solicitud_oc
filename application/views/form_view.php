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
			  <input id="proveedor" name="proveedor" type="text" class="validate required" required>
			  <label for="proveedor">Proveedor</label>
			</div>


			<div class="input-field col s6">
			  <input id="monto" name="monto" type="number" class="validate required" required>
			  <label for="monto">Monto [$]</label>
			</div>
			
			<div class="input-field col s6">
			  <input type="date" class="validate datepicker required" id="fecha_entrega" name="fecha_entrega" required>
			   <label for="fecha_entrega">Fecha de entrega</label>
			</div>

			<div class="input-field col s12">
			  <textarea id="descripcion" name="descripcion" class="validate materialize-textarea required" data-length="220" required></textarea>
			  <label for="descripcion">Descripción</label>
			</div>
			<div class="input-field col s12">
				<button class="btn waves-effect waves-light" type="button" name="action" onClick="postOC();">Guardar
					<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
		
		
	  <!-- Modal Structure -->
	  <div id="modal1" class="modal">
		<div class="modal-content">
		  <h4>Resultado</h4>
		  <p id="modal_response"></p>
		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onClick="location.reload();">Cerrar</a>
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
	function validateRequired(){
	
		var $val=0;

		//check text fields
		$(".required").each(function(){
			
			if (!$(this).val() || ($(this).val())== ""){
				  $(this).addClass("invalid");
				  $val = 1
				  console.log($(this));
			}
			else{
				$(this).removeClass("invalid");
			}
		  
		});
		if(!$("#centro_costo").val() || $("#centro_costo").val()==""){
			 $(this).addClass("invalid");
				  $val = 1
				  console.log($(this));
		}
		
		if ($val > 0) {
			alert('Por favor ingrese todos los datos.');
			return false;
		}  
	   return true;
	}
  
	function objectifyForm(formArray) {//serialize data function

		var returnArray = {};
		for (var i = 0; i < formArray.length; i++){
			returnArray[formArray[i]['name']] = formArray[i]['value'];
		}
		return returnArray;
	}
	
	function postOC(){
		
		var process = function(response){
			if(response && response.hasOwnProperty("status")  && response.status == "success"){
				$('#modal_response').html(response.message);
				$('#modal1').modal('open');
			}else{
				if(response && response.hasOwnProperty("status") && response.status=="error"){
					$('#modal_response').html(response.message);
					$('#modal1').modal('open');
				}else{
					$('#modal_response').html("Ocurrió un error");
					$('#modal1').modal('open');
				}
			}
		}
		
		if(validateRequired())
			postAPI('<?php echo base_url();?>index.php/main_controller/postOC',process, objectifyForm($('#formulario_oc').serializeArray()));
	}
	
	$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
  
  </script>
  </div>
  </div>
  
  