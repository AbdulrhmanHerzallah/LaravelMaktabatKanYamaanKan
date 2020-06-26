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
        // $this->call(UserSeeder::class);


/*
        $commit = App\Models\Commit::all();
        App\Models\Project::all()->each(function ($pro) use ($commit) {
            $pro->commits()->attach(
                $commit->random(rand(1, 100))->pluck('id')->toArray()
            );
        });
*/


        $user = App\Models\User::all();
        App\Models\Project::all()->each(function ($pro) use ($user) {
            $pro->users()->attach(
                $user->random(rand(1, 100))->pluck('id')->toArray()
            );
        });

    }
}
