<?php

use App\Models\Question;
use App\Models\Quiz;
use App\Models\System;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Question::class, 10)->create();
    }
}
