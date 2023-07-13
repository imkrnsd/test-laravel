<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Role;

class RoleController extends Controller
{
    private static $title = 'Role';

    static function breadcrumb()
    {
        return [
            self::$title, route('roles.index')
        ];
    }

    public function index()
    {
        $this->authorize('role_access');
        $title = 'Manajemen Role';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb()
        ];

        $roles = Role::orderBy('id')->get();

        return View::make('manajemen.role.index', compact('title', 'breadcrumbs', 'roles'));
    }

    public function create()
    {
        $this->authorize('role_create');
        $title = 'Tambah ' . self::$title . ' Baru';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('roles.create')],
        ];

        $permissions = Permission::all();
        $menus = Menu::all();
        $role = new Role();
        $rolePermissions = [];
        $roleMenus = [];

        return View::make('manajemen.role.create', compact('title', 'breadcrumbs', 'menus', 'permissions', 'role', 'rolePermissions', 'roleMenus'));
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('role_create');
        $role = Role::create($request->validated());
        $role->syncPermissions($request->permissions);
        $role->menus()->sync($request->menus);

        createLogActivity('Membuat role baru');

        return redirect(route('roles.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Role {$request->name} berhasil ditambahkan.");
    }

    public function edit($id)
    {
        $this->authorize('role_edit');
        $title = 'Ubah ' . self::$title;
        $id = dekrip($id);

        $role = Role::with(['permissions', 'menus'])->find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('roles.edit', $role->id)],
        ];

        $rolePermissions = [];
        foreach ($role->permissions as $item)
            $rolePermissions[] = $item->name;

        $roleMenus = [];
        foreach ($role->menus as $item)
            $roleMenus[] = $item->name;

        $permissions = Permission::all();
        $menus = Menu::all();

        return View::make('manajemen.role.create', compact('title', 'breadcrumbs', 'menus', 'permissions', 'role', 'rolePermissions', 'roleMenus'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->authorize('role_edit');
        $id = dekrip($id);
        $role = Role::find($id);
        $role->update(['name' => $request->name, 'updated_at' => now()]);

        $role->syncPermissions($request->permissions);
        $role->menus()->sync($request->menus);

        createLogActivity("Memperbarui role {$role->name}");

        return redirect(route('roles.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Role {$request->name} berhasil diperbarui.");
    }
}
