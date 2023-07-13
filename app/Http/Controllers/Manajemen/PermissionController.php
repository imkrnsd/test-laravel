<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{
    private static $title = 'Akses';

    static function breadcrumb()
    {
        return [
            self::$title, route('permissions.index')
        ];
    }

    public function index()
    {
        $this->authorize('permission_access');
        $title = 'Manajemen Akses';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb()
        ];

        $permissions = Permission::filter(request(['name']))
            ->orderBy('id')
            ->paginate(10);

        return View::make('manajemen.permission.index', compact('title', 'breadcrumbs', 'permissions'));
    }

    public function create()
    {
        $this->authorize('permission_create');
        $title = 'Tambah Akses Baru';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('permissions.create')],
        ];

        $permission = new Permission();

        return View::make('manajemen.permission.create', compact('title', 'breadcrumbs', 'permission'));
    }

    public function store(PermissionRequest $request)
    {
        $this->authorize('permission_create');
        Permission::create($request->validated());

        createLogActivity('Membuat Akses Baru');

        return redirect(route('permissions.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Akses {$request->name} berhasil ditambahkan.");
    }

    public function edit($id)
    {
        $this->authorize('permission_edit');
        $title = 'Ubah Akses';

        $permission = Permission::find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('permissions.edit', $permission->id)],
        ];

        return View::make('manajemen.permission.create', compact('title', 'breadcrumbs', 'permission'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->authorize('permission_edit');
        $permission = Permission::find($id);
        $permission->update([
            'id' => $request->id,
            'name' => $request->name,
        ]);

        createLogActivity("Memperbarui Akses {$request->name}");

        return redirect(route('permissions.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Akses {$request->name} berhasil diperbarui.");
    }
}
