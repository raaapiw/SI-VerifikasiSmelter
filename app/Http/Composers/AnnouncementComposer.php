<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Announcement;
use App\Order;

class AnnouncementComposer {

    public function compose(View $view) {
        // $orders_ = Order::all();
        $announcements = Announcement::where('is_active','=',1)->get();
        $view->with('announcements', $announcements);
            // ->with('orders_', $orders_);
    }
}

