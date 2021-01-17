<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@cs.in',
            'password' => bcrypt('Umbrella@2014'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id', 'id')->all();
        
        $role->syncPermissions($permissions);
       // $role->givePermissionTo($permissions);

        $user->assignRole([$role->id]);
        //
    }
}
