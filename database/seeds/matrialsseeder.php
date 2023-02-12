<?php

use App\Model\Materials;
use Illuminate\Database\Seeder;

class matrialsseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newRole = new Materials();
        $newRole->title = 'مادة 2';
        $newRole->content = 'ها وصف للمادة الخاصة بها ولكننا ناكد بانه تست وليس قانون اجباري للمادة';
        $newRole->status = '1';
        $newRole->door_by = 1;
        $newRole->created_by = 1;
        $newRole->save();

        $newRole = new Materials();
        $newRole->title = 'مادة 5';
        $newRole->content = 'ها وصف للمادة الخاصة بها ولكننا ناكد بانه تست وليس قانون اجباري للمادة';
        $newRole->status = '1';
        $newRole->door_by = 1;
        $newRole->created_by = 1;
        $newRole->save();

        $newRole = new Materials();
        $newRole->title = 'مادة 8';
        $newRole->content = 'ها وصف للمادة الخاصة بها ولكننا ناكد بانه تست وليس قانون اجباري للمادة';
        $newRole->status = '0';
        $newRole->door_by = 2;
        $newRole->created_by = 1;
        $newRole->save();

        $newRole = new Materials();
        $newRole->title = 'مادة 10';
        $newRole->content = 'ها وصف للمادة الخاصة بها ولكننا ناكد بانه تست وليس قانون اجباري للمادة';
        $newRole->status = '1';
        $newRole->door_by = 3;
        $newRole->created_by = 1;
        $newRole->save();
    }
}
