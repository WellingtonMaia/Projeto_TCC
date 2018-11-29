<div class="iten-task time">
   <div class="usr">
      <div class="img" title="{{ Helper::getObjectUser($time->users_id)->name }}">
         <img src="{{ Helper::getImageUser($time->users_id) }}">
      </div>
      <label>{{ Helper::getFirstNameWithObject($time->users_id) }}</label>
   </div>
   <span class="date-time">{{ \Carbon\Carbon::parse($time->date)->format('d/m/Y') }}</span>
   <span class="timepicker start">{{ $time->time_start }}</span>                        
   <span class="timepicker stop">{{ $time->time_stop }}</span>                        
   <span class="timepicker value">{{ $time->time_value }}</span>
   <div class="block-a">
      @if($time->users_id == Auth::user()->id)
         <a class="btn btn-info editTime" href="" data-id="{{ $time->id }}"><i class="fa fa-edit"></i></a>
         <a class="btn btn-danger removeTime" href="" data-id="{{ $time->id }}" ><i class="fa fa-trash"></i></a>
      @endif
   </div>
</div>