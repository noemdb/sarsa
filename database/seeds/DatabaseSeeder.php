<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersAdminTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(RolsTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(MessegeTableSeeder::class);
        $this->call(AlertTableSeeder::class);
        $this->call(LoginoutTableSeeder::class);
        $this->call(LogdbTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(SelectOptTableSeeder::class);
    }
}
