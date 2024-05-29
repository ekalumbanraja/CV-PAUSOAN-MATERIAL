<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class DeleteUnpaidOrders extends Command
{
    protected $signature = 'orders:delete-unpaid';
    protected $description = 'Delete unpaid orders older than one day';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $cutoffDate = Carbon::now()->subDay();
        $unpaidOrders = Order::where('status', 'unpaid')->where('created_at', '<', $cutoffDate)->get();

        foreach ($unpaidOrders as $order) {
            $order->delete();
            $this->info('Deleted order ID: ' . $order->id);
        }

        $this->info('Unpaid orders older than one day have been deleted.');
    }
}
