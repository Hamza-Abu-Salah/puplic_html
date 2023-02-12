<?php

use App\Model\Door;
use Illuminate\Database\Seeder;

class doorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                $newRole = new Door();
                $newRole->name = 'باب العدالة';
                $newRole->status = '1';
                $newRole->user_id = 1;
                $newRole->laws_id = 1;
                $newRole->save();

                $newRole = new Door();
                $newRole->name = 'باب النزاع';
                $newRole->status = '1';
                $newRole->user_id = 1;
                $newRole->laws_id = 2;
                $newRole->save();

                $newRole = new Door();
                $newRole->name = 'باب القاضي';
                $newRole->status = '1';
                $newRole->user_id = 1;
                $newRole->laws_id = 3;
                $newRole->save();
    }
}
