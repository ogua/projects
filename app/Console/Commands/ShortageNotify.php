<?php

namespace App\Console\Commands;

use App\Notifications\SendEmailNotofication;
use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ShortageNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:shottage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify User of Shottage';

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
     * @return int
     */
    public function handle()
    {
     
     DB::enableQuerylog();
     $all = Product::all();

     $quantity = [];

     foreach ($all as $row) {
       //get product quantit
       $qty = $row->quantuty;
       $alert = $row->alert;

       if ($alert > $qty) {
         array_push($quantity, $row->productname);
       }
     }

     if (!empty($quantity)) {
         $tostring = implode(",", $quantity);

       $message = "The following Products has Met their shottage limit { ".$tostring.' }';

       Notification::route('mail', 'ogua.ahmed18@gmail.com')
            ->notify(new SendEmailNotofication($message));

     }

     

     //USER MNOTIFY

    
     //dd(DB::getQuerylog());

     
    }
}
