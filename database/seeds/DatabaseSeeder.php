<?php

use App\Models\Answer;
use App\Models\IncorrectAnswer;
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
        factory(IncorrectAnswer::class, 10)->create();
    }
}
