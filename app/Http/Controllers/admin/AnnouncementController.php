<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\User;
use \Input as Input;

class AnnouncementController extends Controller
{
    //

    // public function __construct()
    // {
    //     $announcements = Announcement::all();

    //     view::share('announcements', $this->announcements);
    // }

    public function list ()
    {
        $announcement = Announcement::all();
        // dd($announcements);

        return view('pages.admin.announcement.list', compact('announcement'));
        
        
    }

    public function edit ($id)
    {
        $announcement = Announcement::find($id);

        return view('pages.admin.announcement.form', compact('announcement'));
    }

    public function create()
    {
        
        //dd($announcement);

        return view('pages.admin.announcement.form', compact('announcement'));
    }

    public function store(Request $request)
    {
        
    
        $data = [
            'user_id' => $request->user_id,
            'field' => $request->field
        ];
        $announcement = Announcement::create($data);
        
        return redirect()->route('admin.announcement.list');

    }


    public function update(Request $request, $id)
    {
        
        $announcement = Announcement::find($id);
        $data = [

            'user_id' => $request->user_id,
            'field' => $request->field
        ];
        $announcement->fill($data)->save();
        // $announcement->update($data);
        
        
        return redirect()->route('admin.announcement.list');

    }

    public function active($id)
    {
        $announcement = Announcement::find($id);
    
        $data = [
            'is_active' => 1,
        ];
        // $announcement->fill($data)->save();
        $announcement->update($data);
        
        return redirect()->route('admin.announcement.list');

    }


    public function not_active(Request $request, $id)
    {
        
        $announcement = Announcement::find($id);
        $data = [

            'user_id' => $request->user_id,
            'field' => $request->field
        ];
        $announcement->fill($data)->save();
        
        return redirect()->route('admin.announcement.list');

    }


    public function destroy($id)
    {
        //

        $announcement = Announcement::find($id)->delete();
        
        return redirect()->route('admin.announcement.list');
    }
}
