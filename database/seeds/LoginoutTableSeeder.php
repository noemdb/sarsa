<?php

use Illuminate\Database\Seeder;

class LoginoutTableSeeder extends Seeder
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
            factory(App\Models\sys\Loginout::class)->times(1)->create();
        }
    }
}
