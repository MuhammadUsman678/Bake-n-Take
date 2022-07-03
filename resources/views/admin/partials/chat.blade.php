
@foreach($mychat as $mycomm)
<div class="chat @if($mycomm->user_id!=auth()->user()->id) chat-left @else chat-right @endif ">
    <div class="chat-avatar">
        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
            <img src="@if(!empty($mycomm->image)) {{ asset('productimages/'.auth()->user()->image)}} @else {{ asset('app-assets/images/portrait/small/avatar-s-7.jpg')}} @endif" alt="avatar" height="40" width="40" />
        </a>
    </div>
    <div class="chat-body">
        {{-- <div class="chat-content">
            <p>{{$comm->message}}.</p>
            <p>Could you please help me to find it out?</p>
        </div> --}}
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

