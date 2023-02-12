<?php

use Illuminate\Database\Seeder;
use App\Model\Bages;
class Bageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                $newRole = new Bages();
                $newRole->name = 'حقبة رقم 1';
                $newRole->status = '1';
                $newRole->created_by = 1;
                $newRole->save();

                $newRole = new Bages();
                $newRole->name = 'حقبة رقم 2';
                $newRole->status = '1';
                $newRole->created_by = 1;
                $newRole->save();

                $newRole = new Bages();
                $newRole->name = 'حقبة رقم 3';
                $newRole->status = '1';
                $newRole->created_by = 1;
                $newRole->save();

                $newRole = new Bages();
                $newRole->name = 'حقبة رقم 4';
                $newRole->status = '1';
                $newRole->created_by = 1;
                $newRole->save();

                $newRole = new Bages();
                $newRole->name = 'حقبة رقم 5';
                $newRole->status = '1';
                $newRole->created_by = 1;
                $newRole->save();

    }
}
