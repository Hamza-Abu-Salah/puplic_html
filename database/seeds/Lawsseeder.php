<?php

use App\Model\Laws;
use Illuminate\Database\Seeder;

class Lawsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newRole = new Laws();
        $newRole->name = 'قانون رقم 1';
        $newRole->status = '1';
        $newRole->created_by = 1;
        $newRole->bages_id = 1;
        $newRole->save();

        $newRole = new Laws();
        $newRole->name = 'قانون رقم 2';
        $newRole->status = '1';
        $newRole->created_by = 1;
        $newRole->bages_id = 2;
        $newRole->save();

        $newRole = new Laws();
        $newRole->name = 'قانون رقم 1';
        $newRole->status = '1';
        $newRole->created_by = 1;
        $newRole->bages_id = 3;
        $newRole->save();
    }
}
