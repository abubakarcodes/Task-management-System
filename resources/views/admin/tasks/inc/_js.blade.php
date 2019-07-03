<script type="text/javascript">
	$(document).ready(function(){
		$("#input_type").on('change' , function(){
			
			if($("#input_type").val() == "CheckBox" || $("#input_type").val() == "Dropdown")
			{
				
				$("#options").remove();
				
				$("#type_change").html('<textarea placeholder="Enter option per line" id="options"  class="form-control"></textarea>');
				$("#options").on("focusout", function(){
					var options = $("#options").val();
					$("#options_val").val(options);
					// console.log($("#options_val").val());
				});
			}
			else{
				$("#options").remove();
			}



		});



		
	});
</script>