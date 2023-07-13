<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordRule;
use App\Statics\User\NRIK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $recentIpAddress = $_SERVER['REMOTE_ADDR'];
        $max_fail = config('secure.APP_SEKURITI_FAIL_LOGIN');
        $expiredPassword = '1970-01-01';
        $request['username'] = strtoupper($request->username);
        $user = User::where('username', $request->username)->first();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ], [], [
            'username' => 'Username',
            'password' => 'Password',
        ]);

        if (!empty($user) && $user->is_blokir == 1) {
            return redirect()->back()->withInput()->withErrors(["Akun anda terblokir karena sudah {$max_fail} kali melakukan kesalahan"]);
        }

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) { //berhasil login

            // cek dulu sedang login di IP lain atau tidak
            if (isset($user->ip_address) && $recentIpAddress != $user->ip_address) { // jika last IP dan IP saat ini berbeda, maka tidak bisa login
                Session::flush();
                Auth::logout();

                return redirect()->back()->withInput()->withErrors(["User sedang login di IP {$user->ip_address}"]);
            }
            // berhasil login
            // create session browser
            $sessionId = bin2hex(random_bytes(40));

            // update IP Address
            User::where('username', $request->username)->update([
                'ip_address' => $recentIpAddress,
                'session_id' => $sessionId,
            ]);

            Session::put('errorLogin', 0);
            Session::put('session_browser', $sessionId);

            return redirect(route('index'));
        } else { //jika salah password / keblokir
            if (Session::get('errorLogin') !== null) {
                $sessionErrorLogin = Session::get('errorLogin') + 1;
                $sessionErrorLoginUsername = Session::get('errorLoginUsername');
                Session::put('errorLogin', $sessionErrorLogin);

                if ($request->username === 'DE' . NRIK::$DEVELOPER) {
                    $expiredPassword = Carbon::now()->addMonths(config('secure.APP_SEKURITI_PASSWORD_EXP'));
                }

                // jika yg login sekarang berbeda dengan yg login sebelumnya, session error login kembalikan ke 1
                if ($request->username != $sessionErrorLoginUsername) {
                    Session::put('errorLogin', 1);
                }

                if ($sessionErrorLogin >= $max_fail && $sessionErrorLoginUsername == $request->username) {
                    //cek username ada / tidak di DB
                    $isUsernameExists = User::where('username', $request->username)->exists();
                    if ($isUsernameExists) {
                        User::where('username', $request->username)->update([
                            'password' => bcrypt(Hash::make(rand(1000000000, 9999999999))),
                            'expired_password' => $expiredPassword,
                            'is_blokir' => '1'
                        ]);
                        return redirect()->back()->withInput()->withErrors(["Akun anda terblokir karena sudah {$max_fail} kali melakukan kesalahan"]);
                    } else {
                        return redirect()->back()->withInput()->withErrors(["Akun tidak ditemukan"]);
                    }
                }
                Session::put('errorLoginUsername', $request->username);
            } else {
                Session::put('errorLogin', 1);
                Session::put('errorLoginUsername', $request->username);
                $sessionErrorLogin = Session::get('errorLogin');
            }

            return redirect()->back()->withInput()->withErrors(["Username atau password salah"]);
        }
    }

    public function logout()
    {
        if (isset(auth()->user()->id)) {
            // update IP Address
            $id = auth()->user()->id;
            $ipAddress = NULL;
            User::where('id', $id)->update([
                'ip_address' => $ipAddress
            ]);

            Session::flush();
            Auth::logout();
        }

        return Redirect(route('auth.login'));
    }

    public function changePassword()
    {
        $title = 'Change Password';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            [$title, route('auth.change-password')]
        ];

        return view('auth.change-password', compact('title', 'breadcrumbs'));
    }

    public function changePasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'password' => [
                'required',
            ],
            'password_baru' => [
                'required',
                PasswordRule::min(config('secure.APP_SEKURITI_LENGTH_PASS_MIN'))
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
                'different:password',
            ],
            'konfirmasi_password' => [
                'required',
                'same:password_baru',
            ],
        ], [], [
            'password' => 'Password',
            'password_baru' => 'Password baru',
            'konfirmasi_password' => 'Konfirmasi password baru',
        ]);

        $nrik = Auth::user()->nrik;
        $credentials = [
            'nrik' => $nrik,
            'password' => $request->password,
        ];

        if (!Auth::attempt($credentials)) { // jika password lama yang diinput tidak sama dengan password di database
            return redirect()->back()->withErrors(['Password lama tidak sesuai!']);
        } else {
            $today = Carbon::now();
            $bulanDepanFull = $today->addMonths(config('secure.APP_SEKURITI_PASSWORD_EXP'));
            $bulanDepanDate = $bulanDepanFull->toDateString();
            User::where('nrik', $nrik)->update([
                'password' => bcrypt($request->password_baru),
                'expired_password' => $bulanDepanDate,
            ]);

            return redirect(route('index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Password berhasil diperbarui");
        }
    }

    public function expiredPassword()
    {
        return view('auth.expired-password');
    }
}
