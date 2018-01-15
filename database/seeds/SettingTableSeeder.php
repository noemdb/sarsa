<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            factory(App\Models\sys\Setting::class)->times(1)->create();
        }

        $arr_admin = 
        [
        //view report
        'numregpag_userlist' => '10',
        'numregpag_profilelist' => '10',
        'numregpag_rollist' => '10',

        //view topnavbar
        'topnavbar_messages' => 'true',
        'topnavbar_tasks' => 'false',
        'topnavbar_alerts' => 'false',
        'topnavbar_logdbs' => 'false',
        'topnavbar_loginouts' => 'false',

        //sidebar nivel 1
        'sidebar_search' => 'false',
        'sidebar_dashboard' => 'true',
        'sidebar_modelos' => 'true',
        'sidebar_chart' => 'true',
        'sidebar_forms' => 'false',
        'sidebar_tables' => 'true',

        //sidebar nivel 2
        'sidebar_models_users' => 'true',
        'sidebar_models_profiles' => 'true',
        'sidebar_models_rols' => 'true',
        'sidebar_models_messenges' => 'true',
        'sidebar_models_tasks' => 'false',
        'sidebar_models_alerts' => 'true',
        'sidebar_models_logdbs' => 'false',
        'sidebar_models_loginouts' => 'false',    
        
        //sidebar nivel 3
        'sidebar_models_users_crud' => 'true',
        'sidebar_models_users_chart' => 'true',
        'sidebar_models_profiles_crud' => 'true',
        'sidebar_models_profiles_chart' => 'true',
        'sidebar_models_rols_chart' => 'true',
        'sidebar_models_rols_crud' => 'true',
        'sidebar_models_messenges_crud' => 'true',
        'sidebar_models_messenges_chart' => 'true',
        'sidebar_models_tasks_crud' => 'true',
        'sidebar_models_tasks_chart' => 'true',
        'sidebar_models_alerts_crud' => 'false',
        'sidebar_models_alerts_chart' => 'true',
        'sidebar_models_logdbs_crud' => 'true',
        'sidebar_models_logdbs_chart' => 'false',
        'sidebar_models_loginouts_crud' => 'false',
        'sidebar_models_loginouts_chart' => 'false'
        ];


        foreach ($arr_admin as $key => $value) {

            DB::table('settings')->insert([
                'user_id' => "1",
                'name' => $key,
                'value' => $value,
            ]);
        }
    }
}
