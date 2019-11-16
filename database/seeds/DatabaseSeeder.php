<?php

use App\Category;
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
        factory('App\User', 20)->create();
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
    }
}
