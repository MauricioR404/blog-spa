<?php

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
        /**
         * Desabilitar la revision de la llaves foreanas
         */
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(UsersTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PhotoTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
