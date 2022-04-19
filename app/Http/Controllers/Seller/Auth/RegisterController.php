<?php

namespace App\Http\Controllers\Seller\Auth;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\CPU\SMS_module;
use App\Http\Controllers\Controller;
use App\Mail\NewSeller;
use App\Mail\SellerWelcome;
use App\Model\Seller;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function App\CPU\translate;

class RegisterController extends Controller
{
    public function create(){
        // return view('seller-views.auth.register');
        return view('landing-page.index');
    }

    public function sendOTP(Request $request){
        $seller = Seller::query()->where('email', $request->email)->first();
        if($seller != null){
            return response()->json(['message' => translate('seller_email_already_exists')], 400);
        }else{
            $token = rand(1000, 9999);

            $phone_verification = Helpers::get_business_settings('phone_verification');
            if ($phone_verification) {
                SMS_module::send($request->phone, $token);
                $response = translate('please_check_your_SMS_for_OTP');

                DB::table('phone_or_email_verifications')->insert([
                    'phone_or_email' => $request->phone,
                    'token' => $token,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return response()->json(['message' => $response], 200);
        }
    }

    public function checkOTP(Request $request){
        $seller = Seller::query()->where('email', $request->email)->first();
        if($seller != null){
            return response()->json(['message' => translate('seller_email_already_exists')], 400);
        }else{
            $otp = DB::table('phone_or_email_verifications')
                ->where('phone_or_email', $request->phone)
                ->where('token', $request->code)
                ->first();

            if($otp != null){
                return response()->json(['message' => translate('Success')], 200);
            }else{
                return response()->json(['message' => __('landing.seller_wrong_otp')], 400);
            }
        }
    }

    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required|unique:sellers',
            'password' => 'required|min:8',
        ]);

        DB::transaction(function ($r) use ($request) {
            $seller = new Seller();
            $seller->f_name = $request->f_name;
            $seller->l_name = $request->l_name;
            $seller->phone = $request->s_phone;
            $seller->email = $request->email;
            // $seller->image = ImageManager::upload('seller/', 'png', $request->file('image'));
            $seller->password = bcrypt($request->password);
            $seller->status = "pending";
            $seller->save();

            $shop = new Shop();
            $shop->seller_id = $seller->id;
            $shop->name = $request->shop_name;
            $shop->address = $request->shop_address;
            $shop->contact = $request->s_phone;
            $shop->image = ImageManager::upload('shop/', 'png', $request->file('logo'));
            // $shop->banner = ImageManager::upload('shop/banner/', 'png', $request->file('banner'));
            $shop->save();

            DB::table('seller_wallets')->insert([
                'seller_id' => $seller['id'],
                'withdrawn' => 0,
                'commission_given' => 0,
                'total_earning' => 0,
                'pending_withdraw' => 0,
                'delivery_charge_earned' => 0,
                'collected_cash' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Mail::to($seller->email)
                        ->send(new SellerWelcome($seller));
            Mail::to('admin@hrfhome.app')
                        ->send(new NewSeller($seller));

        });

        Toastr::success(\App\CPU\translate('seller_registered'));
        return redirect()->route('seller.auth.login');

    }
}
