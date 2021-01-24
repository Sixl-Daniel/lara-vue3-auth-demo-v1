<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Base\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function list(){
        return Event::all();
    }
}
