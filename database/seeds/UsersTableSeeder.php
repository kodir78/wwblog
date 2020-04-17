<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         DB::table('users')->truncate();

        // generate 3 users/author

        if (env('APP_ENV') == 'local')
        {
            $faker = \Faker\Factory::create();
            $users = [
                [
                    'name' => "Kodir Zaelani",
                    'slug' => 'kodir-zaelani',
                    'email' => "kodir.petani@gmail.com ",
                    'password' => bcrypt('secret12'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Abdul Fattah",
                    'slug' => 'abdul-fattah',
                    'email' => "abdul@gmail.com",
                    'password' => bcrypt('secret12'),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Edo Masaru",
                    'slug' => 'edo-masaru',
                    'email' => "edo@test.com",
                    'password' => bcrypt('secret'),
                    'bio' => $faker->text(rand(250, 300))
                ],
            ];
        }
        else
        {
            $users = [
                'name' => "Administrator",
                'slug' => 'admin',
                'email' => "admin@test.com",
                'password' => bcrypt('admin'),
                'bio' => "I'm an Administrator"
            ];
        }

        DB::table('users')->insert($users);
    }
}
