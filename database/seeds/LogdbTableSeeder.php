<?php

use Illuminate\Database\Seeder;

class LogdbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 15; $i++) { 
            factory(App\Models\sys\Logdb::class)->times(1)->create();
        }
    }
}
