<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    private static $title = 'Dashboard';

    static function breadcrumb()
    {
        return [
            self::$title, route('index')
        ];
    }

    public function index()
    {
        $breadcrumbs = [
            self::breadcrumb()
        ];

        $title = self::$title;

        return view('dashboard', compact('title', 'breadcrumbs'));
    }
}
