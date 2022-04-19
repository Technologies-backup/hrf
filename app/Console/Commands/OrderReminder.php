<?php

namespace App\Console\Commands;

use App\CPU\Helpers;
use App\Model\Seller;
use Illuminate\Console\Command;

use function App\CPU\translate;

class OrderReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sellers =  Seller::query()->whereHas('orders', function($query){
            $query->where('order_status', 'pending');
        })->get();

        foreach($sellers as $seller){
            $orders = $seller->orders()->where('order_status', 'pending')->count();
            if($orders > 0){
                $data = [
                    'title' => translate('Orders Reminder'),
                    'description' => "You have {$orders} order/s that are still pending.",
                    'order_id' => null,
                    'image' => '',
                ];
                Helpers::send_push_notif_to_device($seller->cm_firebase_token, $data);
            }
        }

        $this->info('Timer:Cron Cummand Run successfully!');
    }

}
