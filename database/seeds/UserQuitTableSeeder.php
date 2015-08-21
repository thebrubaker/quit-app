<?php

use Illuminate\Database\Seeder;

class UserQuitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->name = 'Joel Brubaker';
        $user->email = 'joel@rescuescg.com';
        $user->password = bcrypt('rescue2014');
        $user->save();

        $quit = new App\Quit;
        $quit->quit_date = Carbon\Carbon::now()->subDays(3);
        $quit->packs_per_week = 2;
        $quit->cigarettes_per_pack = 20;
        $quit->cost_per_pack = 7.50;

        $user->quit()->save($quit);

        $user = new App\User;
        $user->name = 'Adam Brohannon';
        $user->email = 'adam@rescuescg.com';
        $user->password = bcrypt('rescue2014');
        $user->save();

        $quit = new App\Quit;
        $quit->quit_date = Carbon\Carbon::now()->subDays(10);
        $quit->packs_per_week = 3;
        $quit->cigarettes_per_pack = 25;
        $quit->cost_per_pack = 9.00;

        $user->quit()->save($quit);

        $user = new App\User;
        $user->name = 'Michelle Kitson';
        $user->email = 'michelle@rescuescg.com';
        $user->password = bcrypt('rescue2014');
        $user->save();

        $quit = new App\Quit;
        $quit->quit_date = Carbon\Carbon::now()->subDays(25);
        $quit->packs_per_week = 1;
        $quit->cigarettes_per_pack = 15;
        $quit->cost_per_pack = 6.50;

        $user->quit()->save($quit);
    }
}
