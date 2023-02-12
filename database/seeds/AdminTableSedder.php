<?php

use Illuminate\Database\Seeder;

class AdminTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \App\Models\User::create(['name' => 'علي الحجار', 'email' => 'titoash@mail.ru', 'password' => \Hash::make('100200300')]);
        $user->attachRole('tito_admin');
    }
}
