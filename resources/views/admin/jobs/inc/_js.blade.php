<script>
  $(document).ready(function(){
       $('#job_task').change(function(){
            var taskType = $(this).find('option:selected').attr('data-tasktype');
            var taskName = $(this).find('option:selected').attr('data-taskName');
            $('#task_name').val(taskName);
            $('#task_type').val(taskType);
       });
    var array = new Array();
   $(document).on('click', '#add_task' , function(){
      var jobTask = $('#job_task').val();
        var taskType = $('#task_type').val();
        var taskName = $('#task_name').val();



            var url = '{{route('admin.job.task')}}';
            // here -1 shows that jobtask is not in array
           if($.inArray(jobTask, array) == -1)
           {
	           	array.push(jobTask);
	           	            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    job_task: jobTask,
                    task_type: taskType,
                    task_name: taskName,
                    

                },
                headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},

                success: function ($data) {
                    $('#job_task').val(jobTask);
                    $('#task_type').val(taskType);
                    $('#task_name').val(taskName);
                    
                    
                    $("#results").html('').append($data);
                    $( '#error_task' ).html('');

                },
                error:function(response){
                    if( response.status === 422 ) {
                        //process validation errors here.
                        $errors = response.responseJSON; //this will get the errors response data.
                        errorsHtml = '<div class="alert alert-danger"><ul>';
                        $.each( $errors.errors, function( key, value ) {
                            console.log(value[0]);
                            errorsHtml += '<li class="list-unstyled">' + value[0] + '</li>'; //showing only the first error.
                        });
                        errorsHtml += '</ul></div>';

                        $( '#error_task' ).html( errorsHtml );
                    }
                }
            });
	           	
           }
           else
           {
           		alert('You cannot add same task in a Job');
           }
          	
          	

        });
        

         $(document).on("click", ".remove_task", function () {

            var url = $(this).attr('data-url');
            //remove id from array of the jobTask that is deleted
            if($.inArray(job_task , array)){
            	array.pop(job_task);
            }
            console.log(url);
            $.ajax({
                url: url,
                type: 'GET',
                headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},
                success: function ($data) {

                    $("#results").html('').append($data);
                }

            });
        });
});

</script>