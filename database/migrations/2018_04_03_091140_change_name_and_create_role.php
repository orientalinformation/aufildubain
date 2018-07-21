<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\Permission;

class ChangeNameAndCreateRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //delete role 
        $deleteRole = Role::where('name', '=', 'developer')->first();
        $deleteRole->delete();

        // change role
        $changeAdmin = Role::where('name', '=', 'admin')->first();
        $changeAdmin->name =  'SuperAdmin';
        $changeAdmin->display_name = 'SuperAdmin';
        $changeAdmin->save();

        // create role
        $permissArr = [];
        $permissions = Permission::where('table_name', '!=', '')->get();

        foreach ($permissions as $key => $permission) {
            array_push($permissArr, $permission->id);
        }

        $role = new Role();
        $role->name =  'manager';
        $role->display_name = 'Manager';
        $role->save();
        $role->permissions()->sync($permissArr);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
