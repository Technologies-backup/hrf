<?php

namespace App\Mail;

use App\Model\BusinessSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellerStatusChange extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $seller;

    public function __construct($seller, $status)
    {
        $this->seller = $seller;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $seller = $this->seller;
        $logo = BusinessSetting::query()->where('type', 'company_web_logo')->first();
        if($logo != null){
            $logo = asset("storage/app/public/company") . "/" . $logo->value;
        }
        return $this->view('email-templates.seller-status',['seller'=>$seller, 'logo' => $logo, 'status' => $this->status]);
    }
}
