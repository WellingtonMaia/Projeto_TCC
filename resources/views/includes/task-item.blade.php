<div class="iten-task">
   <div class="item" data-status="{{ $task->status }}">
      <label>
         <input type="checkbox" name="completed" data-id="{{ $task->id }}" data-status="{{ $task->status }}" class="task-completed" @if($task->status == "C") checked="checked" @endif>
         <span class="check-bottom"></span>
      </label>
      <a class="link" href="{{ url('projects/tasks/show-info/'.$task->id) }}">
         <span class="task-users">
            @foreach($task->users as $user)
            <span class="user" title="{{ $user->name }}">    
               {{ Helper::getFirstName($user) }}                             
            </span>
            @endforeach
         </span>
         <h3 title="{{ $task->name }}">{{ $task->name }}</h3>
         <div class="hidden">{{ $task->description }}</div>                                 
         <div class="dates begin">( Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format('d/m/Y ') }} </div>
         <div class="dates final"> Vence: {{  \Carbon\Carbon::parse($task->final_date)->format('d/m/Y') }} )</div>                               
      </a>
      <a class="btn btn-info editTask" data-id="{{ $task->id }}" href=""><i class="fa fa-edit"></i></a></a>
      <a class="btn btn-danger removeTask" data-id="{{ $task->id }}}" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>

   </div>
</div>