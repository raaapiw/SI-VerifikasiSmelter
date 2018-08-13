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
use Sentinel;

class ReportController extends Controller
{
    //
    public function list()
    {
        $reports = report::all();

        return view('pages.management.report.list', compact('reports'));
    }
}
