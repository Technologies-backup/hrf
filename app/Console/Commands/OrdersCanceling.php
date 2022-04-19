<?php

namespace App\Console\Commands;

use App\CPU\Helpers;
use App\Model\Seller;
use Illuminate\Console\Command;

use function App\CPU\translate;

class OrdersCanceling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:canceling';

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
            $orders = $seller->orders()->where('order_status', 'pending')->get();
            foreach($orders as $order){
                $order->timer = $order->timer - 1;
                if($order->timer == 0){
                    $order->order_status = "canceled";
                    $data = [
                        'title' => translate('Order Canceled'),
                        'description' => "Order #{$order->id} is still not confirmed and has been canceled automatically.",
                        'order_id' => null,
                        'image' => '',
                    ];
                    Helpers::send_push_notif_to_device($seller->cm_firebase_token, $data);

                    $data = [
                        'title' => translate('Order Canceled'),
                        'description' => "We are sorry to inform you that your order #{$order->id} has been automatically canceled.",
                        'order_id' => null,
                        'image' => '',
                    ];
                    Helpers::send_push_notif_to_device($order->customer->cm_firebase_token, $data);
                }
                $order->save();
            }
        }

        $this->info('Timer:Cron Cummand Run successfully!');
    }

}
