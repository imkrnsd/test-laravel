<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Statics\User\Role as StaticRole;
use App\Statics\User\Permission as StaticPermission;
use App\Statics\User\Menu as StaticMenu;
use App\Statics\User\NRIK as StaticNRIK;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            ['id' => StaticPermission::$USER_ACCESS, 'name' => 'user_access'],
            ['id' => StaticPermission::$USER_SHOW, 'name' => 'user_show'],
            ['id' => StaticPermission::$USER_CREATE, 'name' => 'user_create'],
            ['id' => StaticPermission::$USER_EDIT, 'name' => 'user_edit'],
            ['id' => StaticPermission::$USER_DELETE, 'name' => 'user_delete'],
            ['id' => StaticPermission::$USER_UNBLOCK, 'name' => 'user_unblock'],
            ['id' => StaticPermission::$USER_REMOVE_IP, 'name' => 'user_remove_ip'],
            ['id' => StaticPermission::$USER_RESET_PASSWORD, 'name' => 'user_reset_password'],
            ['id' => StaticPermission::$USERS_LAST_SEEN, 'name' => 'user_last_seen'],
            ['id' => StaticPermission::$USERS_LOG_ACTIVITY, 'name' => 'user_log_activity'],
            ['id' => StaticPermission::$DECRYPT, 'name' => 'decrypt'],

            ['id' => StaticPermission::$MENU_ACCESS, 'name' => 'menu_access'],
            ['id' => StaticPermission::$MENU_CREATE, 'name' => 'menu_create'],
            ['id' => StaticPermission::$MENU_EDIT, 'name' => 'menu_edit'],
            ['id' => StaticPermission::$MENU_DELETE, 'name' => 'menu_delete'],

            ['id' => StaticPermission::$PERMISSION_ACCESS, 'name' => 'permission_access'],
            ['id' => StaticPermission::$PERMISSION_CREATE, 'name' => 'permission_create'],
            ['id' => StaticPermission::$PERMISSION_EDIT, 'name' => 'permission_edit'],

            ['id' => StaticPermission::$ROLE_ACCESS, 'name' => 'role_access'],
            ['id' => StaticPermission::$ROLE_CREATE, 'name' => 'role_create'],
            ['id' => StaticPermission::$ROLE_EDIT, 'name' => 'role_edit'],

            ['id' => StaticPermission::$SECURITY, 'name' => 'security'],
        ];

        collect($permissions)->each(function ($data) {
            Permission::create($data);
        });

        // create menus
        $menus = [
            ['id' => StaticMenu::$DASHBOARD, 'name' => 'Dashboard', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 1],

            ['id' => StaticMenu::$UTILITY, 'name' => 'Manajemen', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 98],
            ['id' => StaticMenu::$UTILITY_USER, 'name' => 'Manajemen User', 'route' => 'manajemen-user.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 1],
            ['id' => StaticMenu::$UTILITY_MENU, 'name' => 'Manajemen Menu', 'route' => 'menus.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 2],
            ['id' => StaticMenu::$UTILITY_ROLE, 'name' => 'Manajemen Role', 'route' => 'roles.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 3],
            ['id' => StaticMenu::$UTILITY_PERMISSION, 'name' => 'Manajemen Akses', 'route' => 'permissions.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 4],
            ['id' => StaticMenu::$UTILITY_SECURITY, 'name' => 'Manajemen Keamanan', 'route' => 'manajemen-sekuriti.index', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$UTILITY, 'order' => 5],

            ['id' => StaticMenu::$USERS_ACTIVITY, 'name' => 'Aktivitas User', 'route' => 'index', 'icon' => 'fa-dashboard', 'parent_id' => 0, 'order' => 99],
            ['id' => StaticMenu::$USERS_ACTIVITY_LAST_SEEN, 'name' => 'Users Last Seen', 'route' => 'konfigurasi.last-seen', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$USERS_ACTIVITY, 'order' => 1],
            ['id' => StaticMenu::$USERS_ACTIVITY_LOG_ACTIVITY, 'name' => 'Catatan Aktivitas User', 'route' => 'konfigurasi.log-activity', 'icon' => 'fa-dashboard', 'parent_id' => StaticMenu::$USERS_ACTIVITY, 'order' => 2],
        ];

        collect($menus)->each(function ($data) {
            Menu::create($data);
        });

        // create roles
        $roles = StaticRole::getAllForCreate();
        foreach ($roles as $role) {
            $roleDb = Role::create(['id' => $role['id'], 'name' => $role['name']]);
            $roleDb->givePermissionTo($role['permissions']);
            $roleDb->menus()->sync($role['menus']);
        }

        // assign users to roles
        $user_nriks = StaticNRIK::getAllForCreate();
        foreach ($user_nriks as $nrik) {
            $user = User::where('nrik', $nrik['nrik'])->first();
            $user->assignRole($nrik['roles']);
        }
    }
}
