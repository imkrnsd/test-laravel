<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent(
                $query->with(['roles', 'unitKerja', 'foto'])
                    ->filter(request(['role', 'status_blokir']))
            )
            ->addIndexColumn()
            ->editColumn('id_file_foto', function ($row) {
                if (!$row->id_file_foto) {
                    return '-';
                }
                $path = "/storage/" . $row->foto?->path_file;
                return '<a href="' . $path . '" target="blank">Lihat</a>';
            })
            ->editColumn('tanggal_lahir', function ($row) {
                return dateWithFullMonthFormat($row->tanggal_lahir);
            })
            ->addColumn('role', function ($row) {
                return $row->roles->pluck('name')->implode(', ');
            })
            ->editColumn('is_blokir', function ($row) {
                $btnUnblock = '-';
                $routeUnblock = route('manajemen-user.buka-blokir', enkrip($row->id));
                if ($row->is_blokir === 1) {
                    $btnUnblock = '<span class="badge badge-light-danger">
                                        <a href="' . $routeUnblock . '"
                                            style="color:inherit; text-decoration: none">
                                            User Terblokir
                                        </a>
                                </span>';
                }
                if (!Gate::allows('user_unblock')) {
                    $btnUnblock = '-';
                }
                return $btnUnblock;
            })
            ->editColumn('ip_address', function ($row) {
                $btnIp = '';
                $routeIp = route('manajemen-user.lepas-ip', enkrip($row->id));
                if ($row->ip_address) {
                    $btnIp = '
                        <span class="badge badge-light-primary">
                            <a href="' . $routeIp . '">' . $row->ip_address . '</a>
                        </span>
                    ';
                }
                if (!Gate::allows('user_remove_ip')) {
                    $btnIp = '';
                }
                return $btnIp;
            })
            ->addColumn('aksi', function ($row) {
                $btnUpdate = '-';
                $routeEdit = route('manajemen-user.edit', enkrip($row->id));
                if (Gate::allows('user_edit')) {
                    $btnUpdate = '<a href="' . $routeEdit . '" class="btn btn-primary btn-sm">Ubah</a>';
                }
                return $btnUpdate;
            })
            ->editColumn('id_unit_kerja', function ($row) {
                return $row->unitKerja->nama;
            })
            ->rawColumns(['id_file_foto', 'role', 'is_blokir', 'ip_address', 'aksi']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-sm-2'f><'col-sm-10'>>" . "<'row'<'col-sm-12'tr>>" . "<'row'<'col-sm-1 mt-1'l><'col-sm-4 mt-3'i><'col-sm-7'p>>")
            ->buttons([''])
            ->scrollX(true)
            ->scrollY('500px')
            ->fixedColumns(['left' => 3, 'right' => 3])
            ->language(['processing' => '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'])
            ->orderBy(1, 'asc')
            ->parameters([
                "lengthMenu" => [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ]
            ])
            ->addTableClass('table align-middle table-rounded table-striped table-row-gray-300 fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('No.')->searchable(false)->orderable(false)->addClass('text-center'),
            Column::make('name')->title('Nama'),
            Column::make('nrik')->title('NRIK'),
            Column::make('username'),
            Column::make('id_file_foto')
                ->title('Foto')
                ->searchable(false)
                ->orderable(false)
                ->width(100)
                ->addClass('text-center min-w-100px'),
            Column::make('tanggal_lahir'),
            Column::make('email'),
            Column::make('role')->searchable(false),
            Column::make('id_unit_kerja')->title('Unit Kerja'),
            Column::computed('is_blokir')->title('Status Blokir')
                ->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
            Column::make('ip_address')->searchable(false)->title('IP Address')->addClass('text-center'),
            Column::computed('aksi')
                ->searchable(false)
                ->orderable(false)
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center min-w-100px'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
