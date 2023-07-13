<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use App\Models\Profession;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class CrudController extends Controller
{
    private static $title = 'Nasabah';

    static function breadcrumb()
    {
        return [
            self::$title, route('crud.index')
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('crud_access');
        $title = 'Manajemen Nasabah';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb()
        ];

        // $cruds = Crud::orderBy('id')->get();
        $cruds = \DB::table('cruds')->orderBy('id')->get();

        return View::make('manajemen.crud.index', compact('title', 'breadcrumbs', 'cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('crud_create');
        $title = 'Tambah ' . self::$title . ' Baru';

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('crud.create')],
        ];

        $crud = new crud();
        $professions = Profession::all();

        return View::make('manajemen.crud.create', compact('title', 'breadcrumbs', 'crud', 'professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('crud_create');

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:cruds',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'profesi' => 'required',
        ]);

        if ($validator->fails()) {
            $out = [
                "message" => $validator->messages()->all(),
            ];

            foreach ($out as $key => $value) {
                Alert::error('Failed!', $value);
                return back();
            }

            Alert::error('Failed!', $out);
            return back();
        }

        Crud::create($request->all());
        // Crud::create([
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'tgl_lahir' => $request->tgl_lahir,
        //     'profesi' => $request->profesi,
        // ]);

        return redirect(route('crud.index'))
            ->with('alert.status', '00')
            ->with('alert.message', "Nasabah berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('crud_edit');
        $title = 'Ubah Data Nasabah';
        $id = dekrip($id);

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('crud.edit', $id)],
        ];

        $crud = Crud::find($id);
        // $professions = Profession::where('Name', '!=', $crud->nama)->pluck('Name');
        $professions = Profession::all();

        return view('manajemen.crud.create', compact('title', 'breadcrumbs', 'crud', 'professions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('crud_edit');
        $id = dekrip($id);
        $crud = Crud::find($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:cruds,nama,' . $crud->id,
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'profesi' => 'required',
        ]);

        if ($validator->fails()) {
            $out = [
                "message" => $validator->messages()->all(),
            ];

            foreach ($out as $key => $value) {
                Alert::error('Failed!', $value);
                return back();
            }

            Alert::error('Failed!', $out);
            return back();
        }

        $crud->update($request->all());

        return Redirect()->route('crud.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Data Nasabah berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('crud_delete');
        $id = dekrip($id);
        $crud = Crud::find($id);
        $crud->delete();

        return Redirect()->route('crud.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Nasabah berhasil dihapus");
    }
}
