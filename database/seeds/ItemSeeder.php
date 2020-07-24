<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Item::class, 25)->create()->each(function ($item) {
            $item->specs()->saveMany(
                factory(App\Specification::class, 5)->make());
        });
    }
}
