<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class CreateAdminUserSeeder extends Seeder
{
    public function run()
{
    
        $user = User::create([
        'name' => 'Omar', 
        'email' => 'omaraz12@gmail.com',
        'password' => bcrypt('#@3fsdr32'),
        'roles_name' => ["owner"],
        'Status' => 'مفعل',
        ]);

        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);


}
}
