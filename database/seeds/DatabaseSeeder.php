<?php

use App\Category;
use App\Role;
use App\User;
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
        // $this->call(UsersTableSeeder::class);
        //factory('App\User', 20)->create();
        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->profile()->save(factory(App\Profile::class)->make());
        });
        factory('App\Company', 20)->create();

        $categories = [
            'Технологи',
            'Инженер',
            'Анагаах ухаан',
            'Программ хангамж',
            'Шинжлэх ухаан'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
        factory('App\Job', 20)->create();

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW()
        ]);
        $admin->roles()->attach($adminRole);
    }
}
