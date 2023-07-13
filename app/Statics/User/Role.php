<?php

namespace App\Statics\User;

class Role
{
    static $SUPER_ADMIN = 1;
    static $DEVELOPER = 2;

    static function getAll()
    {
        return [
            self::$SUPER_ADMIN,
            self::$DEVELOPER,
        ];
    }

    static function getAllForCreate()
    {
        return [
            [
                'id' => self::$SUPER_ADMIN,
                'name' => 'Super Admin',
                'permissions' => [
                    Permission::$USER_ACCESS,
                    Permission::$USER_SHOW,
                    Permission::$USER_CREATE,
                    Permission::$USER_EDIT,
                    Permission::$USER_DELETE,
                    Permission::$USER_RESET_PASSWORD,
                    Permission::$USER_UNBLOCK,
                    Permission::$USER_REMOVE_IP,
                    Permission::$USERS_LAST_SEEN,
                    Permission::$USERS_LOG_ACTIVITY,

                    Permission::$MENU_ACCESS,
                    Permission::$MENU_CREATE,
                    Permission::$MENU_EDIT,
                    Permission::$MENU_DELETE,

                    Permission::$ROLE_ACCESS,
                    Permission::$ROLE_CREATE,
                    Permission::$ROLE_EDIT,

                    Permission::$PERMISSION_ACCESS,
                    Permission::$PERMISSION_CREATE,
                    Permission::$PERMISSION_EDIT,

                    Permission::$SECURITY,
                ],
                'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$UTILITY,
                    Menu::$UTILITY_USER,
                    Menu::$UTILITY_ROLE,
                    Menu::$UTILITY_MENU,
                    Menu::$UTILITY_PERMISSION,
                    Menu::$UTILITY_SECURITY,

                    Menu::$USERS_ACTIVITY,
                    Menu::$USERS_ACTIVITY_LAST_SEEN,
                    Menu::$USERS_ACTIVITY_LOG_ACTIVITY,
                ],
            ],
            [
                'id' => self::$DEVELOPER,
                'name' => 'Developer',
                'permissions' => [
                    Permission::$USER_ACCESS,
                    Permission::$USER_SHOW,
                    Permission::$USER_CREATE,
                    Permission::$USER_EDIT,
                    Permission::$USER_DELETE,
                    Permission::$USER_RESET_PASSWORD,
                    Permission::$USER_UNBLOCK,
                    Permission::$USER_REMOVE_IP,
                    Permission::$USERS_LAST_SEEN,
                    Permission::$USERS_LOG_ACTIVITY,
                    Permission::$DECRYPT,

                    Permission::$MENU_ACCESS,
                    Permission::$MENU_CREATE,
                    Permission::$MENU_EDIT,
                    Permission::$MENU_DELETE,

                    Permission::$ROLE_ACCESS,
                    Permission::$ROLE_CREATE,
                    Permission::$ROLE_EDIT,

                    Permission::$PERMISSION_ACCESS,
                    Permission::$PERMISSION_CREATE,
                    Permission::$PERMISSION_EDIT,

                    Permission::$SECURITY,
                ],
                'menus' => [
                    Menu::$DASHBOARD,

                    Menu::$UTILITY,
                    Menu::$UTILITY_USER,
                    Menu::$UTILITY_ROLE,
                    Menu::$UTILITY_MENU,
                    Menu::$UTILITY_PERMISSION,
                    Menu::$UTILITY_SECURITY,
                    
                    Menu::$USERS_ACTIVITY,
                    Menu::$USERS_ACTIVITY_LAST_SEEN,
                    Menu::$USERS_ACTIVITY_LOG_ACTIVITY,
                ],
            ],
        ];
    }
}
