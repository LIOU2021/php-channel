<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Queue\ActionQueue;
use App\Queue\Channel\UserChannelQueue;
use Illuminate\Http\Request;
use SplQueue;

class TestController extends Controller
{
    public function index()
    {

        $channel = new ActionQueue(UserChannelQueue::class);
        $channel->push([User::class,'create']);
        $channel->push([User::class,'update']);
        $channel->push([User::class,'delete']);
        dd(
            $channel->all(),
            $channel->count()
        );
        
    }

}
