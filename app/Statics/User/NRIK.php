<?php

namespace App\Statics\User;

use Illuminate\Support\Facades\App;

class NRIK
{
    static $SUPER_ADMIN = '00000000';
    static $DEVELOPER = '99999999';
    static $ADI = '99999998';
    static $RENDY = '26011214';
    static $KUSDHIAN = '28451215';
    static $FIQQI = '42101120';
    static $KAUTSAR = '46050522';
    static $WILDAN = '47071022';

    static function getAllForCreate()
    {
        $user = [
            ['nrik' => self::$SUPER_ADMIN, 'roles' => [Role::$SUPER_ADMIN]],
        ];

        if (App::environment(['local', 'development'])) {
            $userDev = [
                ['nrik' => self::$DEVELOPER, 'roles' => [Role::$DEVELOPER, Role::$SUPER_ADMIN]],
                ['nrik' => self::$ADI, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$RENDY, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$KUSDHIAN, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$FIQQI, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$KAUTSAR, 'roles' => [Role::$DEVELOPER]],
                ['nrik' => self::$WILDAN, 'roles' => [Role::$DEVELOPER]],
            ];

            $user = array_merge($user, $userDev);
        }

        return $user;
    }
}
