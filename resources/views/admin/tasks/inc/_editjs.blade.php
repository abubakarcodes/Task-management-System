<script type="text/javascript">
	$(document).ready(function(){

		addOptionsOnChange();
		
		showOptionOnEdit();
		
		
	});


	function addOptionsOnChange(){
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
				$("#options_val").val(null);
			}



		});
			
		}

	function showOptionOnEdit(){
			$(window).on("load" , function(){
			if($("#input_type").val() == "CheckBox" || $("#input_type").val() == "Dropdown" ){
				$("#type_change").html('<textarea placeholder="Enter option per line" id="options"  class="form-control"></textarea>');
				var options = $("#options_val").val();
				$("#options").val(options);
			}
			else{
				$("#options").remove();
			}
		});
	}
</script>