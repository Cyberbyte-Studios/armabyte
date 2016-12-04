<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function user(Request $request)
    {
        return $request->getUserInfo();
    }

    public function userInfo(Request $request)
    {
        $notificationController = new NotificationController();
        return [
            'user' => $request->user(),
            'audits' => $notificationController->audits(),
            'notifications' => $notificationController->notifications($request)
        ];
    }
}
