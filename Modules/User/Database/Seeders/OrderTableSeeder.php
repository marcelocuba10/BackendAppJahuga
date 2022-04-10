<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Order::create([
            'title' => 'Order 001',
            'description' => 'Description for Order 001',
            'category' => 'Cat Order 001',
            'address' => 'Addres for Order 001',
            'customer' => 'Marcelo Cuba',
        ]);
    }
}
