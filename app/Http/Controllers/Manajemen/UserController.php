<?php

namespace App\Http\Controllers\Manajemen;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\Master\UnitKerja;
use App\Models\User;
use App\Statics\User\NRIK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private static $title = 'User';

    static function breadcrumb()
    {
        return [
            self::$title, route('manajemen-user.index')
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        abort_if(Gate::denies('user_access'), 403, "You Don't Have Permission.");
        $title = self::$title . 's';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb()
        ];

        $stmtRole = Role::orderBy('id')->get();

        return $dataTable->render('manajemen.user.index', compact('title', 'breadcrumbs', 'stmtRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('user_create');
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('manajemen-user.create')],
        ];

        $stmtRole = Role::orderBy('id')->get();

        $stmtUnitKerja = UnitKerja::aktif()->orderBy('nama')->get();

        return view('manajemen.user.create', compact('title', 'breadcrumbs', 'stmtRole', 'stmtUnitKerja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('user_create');
        $nama = explode(' ', $request->name);
        $nrik = $request->nrik;
        $username = strtoupper(substr($nama[0], 0, 2) . $nrik);
        if (count($nama) >= 2) {
            $username = strtoupper(substr($nama[0], 0, 1) . substr($nama[1], 0, 1) . $nrik);
        }
        // $password = date_format(date_create_from_format('Y-m-d', $request->tanggal_lahir), 'dmY');
        // ketentuan baru dari IT sec
        $password = config('app.default_password_users');
        $user =  User::create($request->validated() + [
            'username' => $username,
            'password' => bcrypt($password),
            'expired_password' => '1970-01-01',
            'created_by' => Auth::id(),
        ]);
        $user->assignRole($request->id_role);

        createLogActivity('Membuat User Baru');

        return Redirect::route('manajemen-user.index')
            ->with('alert.status', '00')
            ->with('alert.message', "User berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('user_show'), 403, "You Don't Have Permission.");
        $id = dekrip($id);
        return User::with(['unitKerja', 'foto'])->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('user_edit');
        $title = 'Ubah ' . self::$title;
        $id = dekrip($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('manajemen-user.edit', $id)],
        ];

        $stmtRole = Role::orderBy('id')->get();

        $stmtUnitKerja = UnitKerja::orderBy('nama')->get();

        $stmtUser = User::with(['unitKerja', 'foto'])->find($id);

        return view('manajemen.user.edit', compact('title', 'breadcrumbs', 'stmtRole', 'stmtUnitKerja', 'stmtUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->authorize('user_edit');
        $id = dekrip($id);
        $user = User::find($id);
        $nama = explode(' ', $request->name);
        $nrik = $request->nrik;
        $username = strtoupper(substr($nama[0], 0, 2) . $nrik);
        if (count($nama) >= 2) {
            $username = strtoupper(substr($nama[0], 0, 1) . substr($nama[1], 0, 1) . $nrik);
        }
        $user->update([
            'name' => $request->name,
            'nrik' => $nrik,
            'username' => $username,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_unit_kerja' => $request->id_unit_kerja,
            'updated_at' => now(),
            'updated_by' => Auth::id(),
        ]);

        $user->syncRoles($request->id_role);

        createLogActivity("Memperbarui User {$user->name}");

        return Redirect::route('manajemen-user.index')
            ->with('alert.status', '00')
            ->with('alert.message', "User {$user->name} berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return;
    }

    public function unlockUser($id)
    {
        $id = dekrip($id);
        $user = User::find($id);
        // $password = bcrypt(date_format(date_create_from_format('Y-m-d', $user->tanggal_lahir), 'dmY'));
        // ketentuan baru dari IT sec
        $password = bcrypt(config('app.default_password_users'));
        if ($user->nrik === NRIK::$DEVELOPER) {
            $password = '$2y$10$T2czGDqcdZfqpBB.5NDj/edSRKs31MIvs8fDbmKvtUC9TteS6fVhG';
        }

        $user->update([
            'password' => $password,
            'is_blokir' => null
        ]);

        createLogActivity("Membuka blokir user {$user->name}");

        return Redirect::route('manajemen-user.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Berhasil membuka blokir User {$user->name}");
    }

    public function resetIPUser($id)
    {
        $id = dekrip($id);
        $user = User::find($id);
        $user->update(['ip_address' => null]);

        createLogActivity("Melepaskan IP Adress pada user {$user->name}");

        return Redirect::route('manajemen-user.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Berhasil melepaskan IP Address User {$user->name}");
    }

    public function changeProfile()
    {
        $title = 'Ubah Profile';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            [$title, route('manajemen-user.change-profile')]
        ];

        return view('manajemen.user.change-profile', compact('title', 'breadcrumbs'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());

        $this->validate($request, [
            'foto' => 'nullable|mimes:png,jpg,jpeg',
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'tanggal_lahir' => 'required|date',
        ], [
            'name.regex' => 'Nama hanya boleh diisi menggunakan huruf atau spasi saja.'
        ]);

        if ($request->foto) {
            $file_original = $request->foto->getClientOriginalName();
            $extension = pathinfo($file_original, PATHINFO_EXTENSION);
            $file_name = $user->id . '.' . $extension;
            $fotoPath = $request->file('foto')->storeAs("users/{$user->id}", $file_name, 'public');

            $file = createHistoryFile('PP', $fotoPath, "Profile picture user {$user->name}");
        }

        $user->update([
            'id_file_foto' => $file->id ?? $user->id_file_foto,
            'name' => $request->name,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        createLogActivity("Memperbarui profile");

        return Redirect::route('manajemen-user.change-profile')
            ->with('alert.status', '00')
            ->with('alert.message', "Profile Anda berhasil diperbarui");
    }

    public function removeProfilePicture()
    {
        $user = User::find(Auth::id());

        $pathFile = '/storage/' . $user->foto->path_file;
        File::delete(public_path($pathFile));

        $user->foto->delete();

        $user->update(['id_file_foto' => null]);

        createLogActivity("Menghapus foto profile");

        return "Berhasil menghapus foto profile";
    }
}
