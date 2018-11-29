<?php

use Illuminate\Database\Seeder;

class CompleteProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Advert::class, 100)->create();
    }
}
