<?php 
Route::get('/setting', function () {
    $user = \App\User::find(\Auth::user()->id);
    // $user->setSetting('first_name','Admin');
    $user->setSettings([
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
    ]);
    return "registrado";
});
?>