<table class="table table-custom table-white m-t-10">
  <thead>
    <tr>
     <th>Sr No.</th>
     <th>Task</th>
     <th>Type</th>
     <th>Action</th>
   </tr>
 </thead>
 <tbody>
 @foreach($jobTasks as $key => $jobtask)
  <tr>
    
    <td>{{$key}}</td>
    <td>{{$jobtask->name}}</td>
    <td>{{$jobtask->task_type}}</td>
    <td>
      <a class="remove_task" data-url="{{ route('admin.job.task.edit.remove' , $jobtask->id) }}"><i class="fa fa-trash"></i></a>
    </td>
  

  </tr>
  
  @endforeach
</tbody>
</table>