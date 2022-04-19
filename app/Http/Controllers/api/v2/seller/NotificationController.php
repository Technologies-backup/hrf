<?php

namespace App\Http\Controllers\api\v2\seller;

use App\CPU\Helpers;
use App\Http\Controllers\Controller;
use App\Model\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function App\CPU\translate;

class NotificationController extends Controller
{
    public function get_notifications(Request $request)
    {
        try {
            $data = Helpers::get_seller_by_token($request);

            if ($data['success'] == 1) {
                $seller = $data['data'];
            } else {
                return response()->json([
                    'auth-001' => translate('Your existing session token does not authorize you any more')
                ], 401);
            }
            return response()->json(
                $seller['notifications'], 
                200
            );
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }
}
