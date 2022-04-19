<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Model\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function get_notifications(Request $request)
    {
        try {
            return response()->json(
                $request->user()->notifications,
                200
            );
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }
}
