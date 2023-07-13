<?php

namespace App\Http\Controllers;

use App\DataTables\LogActivityDataTable;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KonfigurasiController extends Controller
{
    public function decrypt(Request $request)
    {
        return dekrip($request->encrypt);
    }

    public function lastSeen()
    {
        $title = 'Last Seen User';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            [$title, route('konfigurasi.last-seen')]
        ];

        $stmtRole = Role::orderBy('id')->get();

        $stmtUser = User::with('roles')
            ->whereNotNull('last_seen')
            ->searchByName(request(['nama']))
            ->filter(request(['role']))
            ->orderBy('last_seen', 'DESC')
            ->paginate(10);

        return view('konfigurasi.last-seen', compact('title', 'breadcrumbs', 'stmtRole', 'stmtUser'));
    }

    public function userActivity(LogActivityDataTable $dataTable)
    {
        $title = 'Catatan Aktivitas User';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            [$title, route('konfigurasi.log-activity')]
        ];

        $stmtRole = Role::orderBy('id')->get();

        $stmtUser = User::orderBy('id')->get();

        return $dataTable->render('konfigurasi.log-activity', compact('title', 'breadcrumbs', 'stmtRole', 'stmtUser'));
    }

    public function sekuriti()
    {
        $title = 'Konfigurasi Keamanan';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            [$title, route('manajemen-sekuriti.index')]
        ];

        return view('manajemen.sekuriti', compact('title', 'breadcrumbs'));
    }

    public function sekuritiUpdate(Request $request)
    {
        $this->validate($request, [
            'max_fail_login' => 'required|numeric|min:1',
            'session_timeout' => 'required|numeric|min:1',
            'min_pass' => 'required|numeric|min:1',
            'exp_pass' => 'required|numeric|min:1',
        ]);

        $path = base_path('config/secure.php');
        $openFile = fopen($path, 'w');
        $content = "<?php 
        return [ 
            'APP_SEKURITI_FAIL_LOGIN' => " . $request->max_fail_login . ",
            'APP_SEKURITI_SESSION_TIME' => " . $request->session_timeout . ",
            'APP_SEKURITI_LENGTH_PASS_MIN' => " . $request->min_pass . ",
            'APP_SEKURITI_PASSWORD_EXP' => " . $request->exp_pass . "
        ,];";
        fwrite($openFile, $content);
        fclose($openFile);

        createLogActivity('Memperbarui konfigurasi keamanan');

        return Redirect::route('manajemen-sekuriti.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Keamanan berhasil diperbarui");
    }
}
