<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $newRole = \App\Models\Role::create([
            'name'=>'tito_admin',
            'display_name'=>'مدير الموقع',
            'description'=>'تسمح هذه الصلاحية بالتحكم بجميع متطلبات الموقع بشكل عام',
        ]);

        $newRole = \App\Models\Role::create([
            'name'=>'sup_tito',
            'display_name'=>'الحذف والاضافة والتعديل',
            'description'=>'تسمح هذه الصلاحية بالحذف والاضافة والتعديل من الاقسام والمقالات الخاصة بالموقع ولكن لاتسمح له بالتعديل على الاعدادات الخاصة بالموقع',
        ]);

        $newRole = \App\Models\Role::create([
            'name'=>'client',
            'display_name'=>'زائر',
            'description'=>'تسمح هذه الصلاحية بالاطلاع فقط وليس لديه صلاحية التعديل او الحذف',
        ]);

        $newRole = \App\Models\Role::create([
            'name'=>'user',
            'display_name'=>'اضافة وتعديل',
            'description'=>'تسمح هذه الصلاحية بالاظافة والتعديل فقط',
        ]);
    }
}
