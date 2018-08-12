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
use Sentinel;

class WorkController extends Controller
{
    //
    public function list()
    {
        $works = Work::all();

        return view('pages.management.work.list', compact('works'));
    }

}
