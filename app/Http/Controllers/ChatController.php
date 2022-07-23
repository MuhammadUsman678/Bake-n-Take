<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
class ChatController extends Controller
{
    public function index()
    {
       
            $user=User::whereRole_id('3')->whereStatus('1')->whereHas('shop')->get();
            
            return view('admin.chat.index',compact('user'));
      
    }
    public function chat($id)
    {
        $user=User::whereRole_id('3')->whereStatus('1')->whereHas('shop')->get();
        $users =User::find($id);
        $mychat=Chat::whereIn('user_id',[auth()->user()->id,$users->id])->whereIn('sender_id',[auth()->user()->id,$users->id])->orderBy("created_at")->get();
       
   
        return view('admin.chat.index',compact('users','mychat','user'));
    }
    public function getMessages(Request $request)
    {
       
        $user=User::whereRole_id('3')->whereStatus('1')->whereHas('shop')->get();
       $users =User::find($request->sender);
       $mychat=Chat::whereIn('user_id',[$request->user,$request->sender])->whereIn('sender_id',[$request->user,$request->sender])->orderBy("created_at")->get();
        // return $course;
        return view('admin.partials.chat',compact('users','mychat','user'));
    }

    public function storeMessage(Request $request)
    {
        $record = $request->except('_token');
        // date_default_timezone_set('Asia/Karachi');
        // dd($record);
       
        $chat=new chat();
        $chat->user_id=$request->user;
        $chat->sender_id=$request->sender;
       $chat->message=$request->message;
       $chat->save();
       $user=User::whereRole_id('3')->whereStatus('1')->whereHas('shop')->get();
       $users =User::find($request->sender);
       $mychat=Chat::whereIn('user_id',[$request->user,$request->sender])->whereIn('sender_id',[$request->user,$request->sender])->orderBy("created_at")->get();
        // return $course;
        return view('admin.partial.chat',compact('users','mychat','user'));

    }
    public function shopindex()
    {
       
            $user=User::whereRole_id('1')->get();
            return view('shop.chat.index',compact('user'));
      
    }
    public function shopchat($id)
    {
        $user=User::whereRole_id('1')->get();
        $users =User::find($id);
        $mychat=Chat::whereIn('user_id',[auth()->user()->id,$users->id])->whereIn('sender_id',[auth()->user()->id,$users->id])->orderBy("created_at")->get();
       
   
        return view('shop.chat.index',compact('users','mychat','user'));
    }
}
