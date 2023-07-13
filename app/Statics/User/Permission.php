<?php

namespace App\Statics\User;

class Permission
{
    // permissions
    static $PERMISSION_ACCESS = 6900;
    static $PERMISSION_CREATE = 6901;
    static $PERMISSION_EDIT = 6902;

    // roles
    static $ROLE_ACCESS = 7900;
    static $ROLE_CREATE = 7901;
    static $ROLE_EDIT = 7902;

    // menus
    static $MENU_ACCESS = 8900;
    static $MENU_CREATE = 8901;
    static $MENU_EDIT = 8902;
    static $MENU_DELETE = 8903;

    // users
    static $USER_RESET_PASSWORD = 9001;
    static $USER_UNBLOCK = 9002;
    static $USER_REMOVE_IP = 9003;
    static $USERS_LAST_SEEN = 9004;
    static $USERS_LOG_ACTIVITY = 9005;
    static $USER_ACCESS = 9900;
    static $USER_SHOW = 9901;
    static $USER_CREATE = 9902;
    static $USER_EDIT = 9903;
    static $USER_DELETE = 9904;
    static $DECRYPT = 9909;

    // security
    static $SECURITY = 9999;
}
