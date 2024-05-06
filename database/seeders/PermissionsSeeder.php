<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [ 'admins.create' , 'إضافه مشرف جديد ' , 'admins' , 'المشرفين' ] , 
            [ 'admins.list' , 'عرض كافه المشرفين' , 'admins' , 'المشرفين' ] , 
            [ 'admins.show' , 'عرض بيانات المشرف ' , 'admins' , 'المشرفين' ] , 
            [ 'admins.edit' , 'تعديل بيانات المشرف' , 'admins' , 'المشرفين' ] , 
            [ 'admins.delete' , 'حذف المشرف' , 'admins' , 'المشرفين' ] , 
            [ 'admins.password.edit' , 'تعديل كلمه المرور' , 'admins' , 'المشرفين' ] , 

            [ 'teachers.create' , 'إضافه دكتور جديد' , 'teachers' , 'الدكاتره' ] , 
            [ 'teachers.list' , 'عرض كافه الدكاتره' , 'teachers' , 'الدكاتره' ] , 
            [ 'teachers.show' , 'عرض بيانات الدكتور' , 'teachers' , 'الدكاتره' ] , 
            [ 'teachers.edit' , 'تعديل بيانات الدكتور' , 'teachers' , 'الدكاتره' ] , 
            [ 'teachers.delete' , 'حذف الدكتور' , 'teachers' , 'الدكاتره' ] , 
            [ 'teachers.password.edit' , 'تعديل كلمه المرور' , 'teachers' , 'الدكاتره' ] , 

            [ 'assistants.create' , 'إضافه مساعد جديد ' , 'assistants' , 'المساعدين' ] , 
            [ 'assistants.list' , 'عرض كافه المساعدين' , 'assistants' , 'المساعدين' ] , 
            [ 'assistants.show' , 'عرض بيانات المساعد' , 'assistants' , 'المساعدين' ] , 
            [ 'assistants.edit' , 'تعديل بيانات المساعد' , 'assistants' , 'المساعدين' ] , 
            [ 'assistants.delete' , 'حذف المساعد' , 'assistants' , 'المساعدين' ] , 
            [ 'assistants.password.edit' , 'تعديل كلمه المرور' , 'assistants' , 'المساعدين' ] , 

            [ 'slides.create' , 'إضافه شريحه جديده ' , 'slides' , 'عارض الصور' ] , 
            [ 'slides.list' , 'عرض كافه الشرائح' , 'slides' , 'عارض الصور' ] , 
            [ 'slides.show' , 'عرض بيانات الشريحه' , 'slides' , 'عارض الصور' ] , 
            [ 'slides.edit' , 'تعديل الشريحه' , 'slides' , 'عارض الصور' ] , 
            [ 'slides.delete' , 'حذف' , 'slides' , 'عارض الصور' ] , 

        ];   


        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission[0]  ,
                    'label' => $permission[1] ,  
                    'group_name' => $permission[2] , 
                    'group_name_label' => $permission[3] , 
                ]
            );
        }     
    }
}
