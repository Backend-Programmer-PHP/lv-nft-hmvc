<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Models\Admins_Model;
use App\Modules\Dashboard\Models\Role_Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolePermission extends Controller
{

    public function __construct()
    {

    }

    public function access()
    {
        $admin_id = auth()->user("admin")->id;
        $getRole = DB::table('role')
            ->leftJoin('admins_role', 'role.id', '=', 'admins_role.role_id')
            ->where("admins_id", $admin_id)
            ->get();
        echo "<table border='1'>";
        //Get role
        if (!empty($getRole[0])) {
            foreach ($getRole as $role) {
                //echo  $role->role_id . "<br/>";
                //get link access
                $permission = DB::table('role_permission')
                    ->rightJoin('permission', 'permission.id', '=', 'role_permission.permission_id')
                    ->where("role_permission.role_id", $role->role_id)
                    ->get();
                foreach ($permission as $item) {
                    //var_dump($item);
                    ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo $item->ClassName; ?></td>
                        <td><?php echo $item->note; ?></td>
                    </tr>
                <?php
                }
            }
        } else {
            echo "Access is denied";
        }
        echo "</table>";
    }
}
