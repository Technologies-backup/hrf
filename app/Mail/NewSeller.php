<?php

namespace App\Mail;

use App\Model\BusinessSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSeller extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $seller;

    public function __construct($seller)
    {
        $this->seller = $seller;
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
        return $this->view('email-templates.new-seller',['seller'=>$seller, 'logo' => $logo]);
    }
}
