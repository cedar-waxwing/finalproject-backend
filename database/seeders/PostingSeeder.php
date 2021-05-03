<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Posting::factory()->count(20)->create();
    }
}
