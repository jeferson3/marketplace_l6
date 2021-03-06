<?php

use App\Store;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->insert([
        //     'name' => 'Administrador',
        //     'email' => 'admin@email.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     'remember_token' => 'mkcdnkvndkvnkdnv',
        // ]); //adiciona um user no banco

        factory(User::class, 40)->create()->each(function($user){
            $user->store()->save(factory(Store::class)->make());
        });
    
    }
}
