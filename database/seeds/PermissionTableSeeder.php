<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'المراحل الداراسية',
            'قائمة المراحل الداراسية',
            'الصفوف',
            'قائمة الصفوف الداراسية',
            'الاقسام',
            'قائمة الاقسام الداراسية',
           'الطلاب',
        'اضافة طالب جديد',
            'قائمة الطلاب',
        'ترقية الطلاب',
        'المعلمين',
        'قائمة المعلمين',
        'اولياء الامور'
            ,'قائمة اولياء الامور',
'المستخدمين',
'الحسابات',
'الحضور والغياب',
'الامتحانات',
'المكتبة ',
'حصص اونلاين',
'الاعدادات',


        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
