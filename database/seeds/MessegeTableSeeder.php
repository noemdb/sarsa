<?php

use Illuminate\Database\Seeder;

class MessegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 200; $i++) { 
            factory(App\Models\sys\Messege::class)->times(1)->create();
        }
    }
}
