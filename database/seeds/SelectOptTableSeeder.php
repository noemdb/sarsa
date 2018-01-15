<?php

use Illuminate\Database\Seeder;

class SelectOptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$arr_rol = ['CONTRA'=>'CONTRA','DIRCP'=>'DIRCP','CORCP'=>'CORCP','COMCP'=>'COMCP','ADMIN'=>'ADMIN','USUARIO'=>'USUARIO'];
    	foreach ($arr_rol as $key => $value) {
    		DB::table('select_opts')->insert([
	            'name' => "rol",
	            'value' => $value,
	            'table' => "rols",
	            'view' => "rol.create",
        	]);
    	}

    	$arr_rango = ['MASTER'=>'MASTER','USER'=>'USER'];
    	foreach ($arr_rango as $key => $value) {
    		DB::table('select_opts')->insert([
	            'name' => "rango",
	            'value' => $value,
	            'table' => "rols",
	            'view' => "rol.create",
        	]);
    	}

        $arr_estado = ['Activo'=>'Activo','Desactivo'=>'Desactivo'];
        foreach ($arr_estado as $key => $value) {
            DB::table('select_opts')->insert([
                'table' => "users",
                'name' => "is_active",
                'value' => $value,
                'view' => "rol.index",
            ]);
        }
        
    }
}
