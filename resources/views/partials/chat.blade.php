
@foreach($mychat as $mycomm)
<div class="chat @if($mycomm->user_id!=auth()->user()->id) chat-left @else chat-right @endif ">
  
    <div class="chat-body">
  
        <div class="chat-content">
          
                <strong class="text-dark">{{$mycomm->message}}</strong>


                <small class="@if($mycomm->user_id!=auth()->user()->id) chat-left @else text-primary @endif ">
                    @if($mycomm->user_id!=auth()->user()->id)  @else  @endif
                </small>
           
                <small class="text-dark">{{date('d-M-y | h:i',strtotime($mycomm->created_at))}}</small>
           
        </div>
    </div>
</div>
@endforeach

