<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\newusernotification;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\notification_user;

class UserNotificationController extends Controller
{
         // mark_as_read
    public function mark_as_read($id)
    {
        $notification =notification_user::findOrFail($id);
        $notification->is_read=true;
        $notification->save();
        return back();
    }

    // mark_as_all_read
    public function mark_as_all_read()
    {

        $all_read = notification_user::where('user_id',Auth::user()->id)->get();

        foreach ($all_read as $read) {
        notification_user::where('user_id',Auth::user()->id)->update([
            'is_read' => true
        ]);
        }

        return back();
    }

    // see_all_notifications
    public function see_all_notifications($user)
    {
        $notifications = notification_user::latest()->where('user_id',Auth::user()->id)->get();
        return view('admin.notification',compact('notifications'));
    }
    public function notifications(){
       $notifications = auth()->user()->notifications;
       return view("partials._notifications",compact('notifications'));
     }



     public function markNotificationsRead(){
         $notifications = auth()->user()->unreadNotifications;
         foreach ($notifications as $notify){
             $notify->markAsRead();
         }
     }

     function userNotify($user_id,$details)
     {
         $notify = new notification_user();
         $notify->user_id = $user_id;
         $notify->data = $details;
         $notify->save();
     }

}

