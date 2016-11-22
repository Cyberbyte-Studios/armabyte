<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications(Request $request)
    {
        return $request->user()->unreadNotifications;
    }
    public function notificationsRead(Request $request)
    {
        return $request->user()->unreadNotifications->markAsRead();
    }

    public function audits()
    {
        return DB::table('audits')->orderBy('created_at')->paginate(15);
    }
}
