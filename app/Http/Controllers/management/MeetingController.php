<?php

namespace App\Http\Controllers\management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Input as Input;
use Storage;
use App\Order;
use App\Document;
use App\Work;
use App\Client;
use App\User;
use App\Report;
use App\Meeting;
use Sentinel;

class MeetingController extends Controller
{
    //
    public function list()
    {
        $meetings = Meeting::all();
        // dd($meetings);

        return view('pages.management.meeting.list', compact('meetings'));
    }
}
