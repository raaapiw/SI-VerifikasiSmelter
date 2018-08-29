<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Announcement;

class AnnouncementComposer {

    public function compose(View $view) {
        $announcements = Announcement::where('is_active','=',1)->get();
        $view->with('announcements', $announcements);
    }
}