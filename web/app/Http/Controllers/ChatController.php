<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ChatRequest;
use Auth;
use App\Chat;
use DB;

class ChatController extends Controller
{
    protected $chat;

    public function __construct(Chat $chat)
    {
       $this->middleware('auth');
       $this->chat = $chat;
    }

    
    public function getChatList()
    {
        // $res =  DB::table('ss_chat')->get();

        // foreach ($res as $key => $value) {
        //     $user =  DB::table('ss_customers')->where('id',$value->from_pk_no)->first();
        //     DB::table('ss_chat')->where('from_pk_no',$value->from_pk_no)->update(['from_name' => $user->name]);
        // }

        $data               = array();
        $this->resp         = $this->chat->getChatList();
        $data['first_text'] = $this->resp->data['first_text'];
        $data['rows']       = $this->resp->data['data'];
     // dd($data);

        return view('chat.chat',compact('data'));
    }
    public function postChat(ChatRequest $request)
    {
        $this->resp = $this->chat->postChat($request);
        return response()->json($this->resp);

    }

    public function getChat($pid,$to)
    {
        $this->resp = $this->chat->getChat($pid,$to);
        if($this->resp->status == true){
            $rows           = $this->resp->data['data'];
            $post_by        = $this->resp->data['post_by'];
            $html = view('chat._chat_row')->withData($rows)->withCid($post_by)->render();
            
            $this->resp->data  = $html;
        }

        return response()->json($this->resp);
    }


}
