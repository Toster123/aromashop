<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class MainDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'title' => 'user',
        ]);
        DB::table('roles')->insert([
            'title' => 'admin',
        ]);
        DB::table('roles')->insert([
            'title' => 'support',
        ]);
        DB::table('roles')->insert([
            'title' => 'order_manager',
        ]);
        DB::table('roles')->insert([
            'title' => 'content_manager',
        ]);

        //
        DB::table('statuses')->insert([
            'title' => 'Pending',
            'description' => 'Your order is awaiting confirmation from our employees, if they need, they will contact you',
        ]);
        DB::table('statuses')->insert([
            'title' => 'Accepted',
            'description' => 'Your order has been confirmed and we will ship it to you shortly',
        ]);
        DB::table('statuses')->insert([
            'title' => 'Paid',
            'description' => 'Your order has been paid and we will ship it to you shortly',
        ]);
        DB::table('statuses')->insert([
            'title' => 'During delivery',
            'description' => 'Your order has been sent. He will arrive at your indicated date during the checkout process',
        ]);
        DB::table('statuses')->insert([
            'title' => 'Deliveried',
            'description' => 'Your order has already arrived! You just have to pick it up',
        ]);
        DB::table('statuses')->insert([
            'title' => 'Rejected',
            'description' => 'Your order has been rejected! You may not have contacted our staff to clarify order details',
        ]);



        //------
        DB::table('categories')->insert([
            'title' => 'Clocks',
            'description' => 'Roliks and other popular brands',
        ]);
        DB::table('categories')->insert([
            'title' => 'Phones',
            'description' => 'Xiaomi, Sumsung, Huawei and more',
        ]);
        DB::table('categories')->insert([
            'title' => 'Labtops',
            'description' => 'Asus, Dell, HP, Microsoft and more',
        ]);

        //
        DB::table('colors')->insert([
            'title' => 'Red',
        ]);
        DB::table('colors')->insert([
            'title' => 'Blue',
        ]);
        DB::table('colors')->insert([
            'title' => 'Black',
        ]);

        //
        DB::table('brands')->insert([
            'title' => 'HP',
        ]);
        DB::table('brands')->insert([
            'title' => 'Asus',
        ]);
        DB::table('brands')->insert([
            'title' => 'Dell',
        ]);
    }
}
