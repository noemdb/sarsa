<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 150; $i++) { 
            factory(App\Models\sys\Task::class)->times(1)->create();
        }
    }
}
