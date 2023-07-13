<?php

namespace App\Http\Controllers\Manajemen;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\Role;
use App\Services\MenuService;
use App\Statics\User\Role as StaticRole;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{

    private static $title = 'Menu';

    static function breadcrumb()
    {
        return [
            self::$title, route('menus.index')
        ];
    }

    public function index()
    {
        $this->authorize('menu_access');
        $title = self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb()
        ];

        $html = '<table class=\'table align-middle table-row-dashed fs-6 gy-5 kt_default_datatable\'>'
            . '<thead><tr class=\'text-muted fw-bold fs-7 text-uppercase gs-0\'><th>Title</th><th>Route</th><th>Icon</th><th>Roles</th><th>Order</th><th class=\'text-center\'>Action</th></tr></thead>';
        $menu = [
            'children' => MenuService::getMenus(0, StaticRole::getAll()),
        ];
        $html .= $this->printMenu($menu);
        $html .= '</table>';

        return View::make('manajemen.menu.index', compact('title', 'breadcrumbs', 'html'));
    }

    public function create()
    {
        $this->authorize('menu_create');
        $title = 'Tambah ' . self::$title . ' Baru';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('menus.create')],
        ];

        $menu = new Menu();
        $menus = $this->picklistMenu([
            'children' => MenuService::getMenus(0, StaticRole::getAll())
        ]);
        $roles = Role::all();
        $menuRoles = [];

        return View::make('manajemen.menu.create', compact('title', 'breadcrumbs', 'roles', 'menu', 'menus', 'menuRoles'));
    }

    public function store(MenuRequest $request)
    {
        $this->authorize('menu_create');
        $menu = Menu::create($request->validated());

        $menu->roles()->sync($request->roles);

        createLogActivity('Membuat menu baru');

        return redirect(route('menus.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Menu {$request->name} berhasil ditambahkan.");
    }

    public function edit($id)
    {
        $this->authorize('menu_edit');
        $title = 'Ubah ' . self::$title;
        $id = dekrip($id);

        $query = Menu::with(['roles']);
        $menu = $query->find($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('menus.edit', $id)],
        ];

        $menus = $this->picklistMenu([
            'children' => MenuService::getMenus(0, StaticRole::getAll())
        ]);
        $roles = Role::all();
        $menuRoles = [];

        foreach ($menu->roles as $role) {
            $menuRoles[] = $role->id;
        }

        return View::make('manajemen.menu.create', compact('title', 'breadcrumbs', 'roles', 'menu', 'menus', 'menuRoles'));
    }

    public function update(MenuRequest $request, $id)
    {
        $this->authorize('menu_edit');
        $id = dekrip($id);
        $menu = Menu::find($id);
        $menu->update([
            'route' => $request->route,
            'name' => $request->name,
            'icon' => $request->icon,
            'order' => $request->order,
            'parent_id' => $request->parent_id,
            'updated_at' => now(),
        ]);

        $menu->roles()->sync($request->roles);

        createLogActivity("Memperbarui menu {$menu->name}");

        return redirect(route('menus.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Menu {$request->name} berhasil diperbarui.");
    }

    public function delete($id)
    {
        $id = dekrip($id);
        $menu = Menu::find($id);
        $menu->roles()->sync([]);
        $menu->delete();

        createLogActivity("Menghapus menu {$menu->name}");

        return redirect(route('menus.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Menu {$menu->name} berhasil dihapus.");
    }

    private function picklistMenu($menu, $titlePadding = 0)
    {
        if ($menu['children'] == []) return '';

        $padding = '';
        for ($i = 0; $i < $titlePadding; $i++)
            $padding .= '&nbsp;';

        $html = [];
        foreach ($menu['children'] as $child) {
            $menu = new Menu();
            $menu->id = $child['id'];
            $menu->name = $padding . $child['id'] . ' ' . $child['title'];

            $html[] = $menu;

            if ($child['children'] != []) {
                $html = array_merge($html, $this->picklistMenu($child, $titlePadding + 5));
            }
        }

        return $html;
    }

    private function printMenu($menu, $titlePadding = 0)
    {
        if ($menu['children'] == []) return '';

        $padding = '';
        for ($i = 0; $i < $titlePadding; $i++)
            $padding .= '&nbsp;';

        $html = '<tbody>';
        foreach ($menu['children'] as $child) {
            $html .= "<tr>
                        <td>{$padding}{$child['id']} - {$child['title']} </td>
                        <td>{$child['route']}</td>
                        <td>{$child['icon']}</td>
                        <td>" . implode(", ", $child['roleNames']) . "</td>
                        <td class='text-center'>{$child['order']}</td>
                        <td>";
            if (Gate::allows('menu_edit')) {
                $routeEdit = route('menus.edit', enkrip($child['id']));
                $html .= '<a href="' . $routeEdit . '" class="btn btn-small btn-secondary me-2">Ubah</a>';
            }
            if (Gate::allows('menu_delete')) {
                $routeDelete = route('menus.delete', enkrip($child['id']));
                $html .= '<a href="' . $routeDelete . '" class="btn btn-small btn-danger me-2" data-menu="' . $child['title'] . '" onclick="confirmation(event)">Hapus</a>';
            }
            $html .= "</td>
                </tr>
                {$this->printMenu($child,$titlePadding + 5)}
            ";
        }
        $html .= '</tbody>';
        return $html;
    }
}
