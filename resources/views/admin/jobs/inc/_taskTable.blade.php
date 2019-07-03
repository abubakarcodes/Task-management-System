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
  @if(session()->get('jobtasks'))
  @forelse(session()->get('jobtasks') as $key => $value)
  <tr>
   
    <td>{{$key}}</td>
    <td>{{$value['task_name']}}</td>
    <td>{{$value['task_type']}}</td>
    @if(!isset($show))
    <td>
      <a class="remove_task" data-url="{{ route('admin.job.task.remove' , $key) }}"><i class="fa fa-trash"></i></a>
    </td>
    @endif

  </tr>
  @empty

  <p>no data fund</p>

  @endforelse

  @endif
</tbody>
</table>