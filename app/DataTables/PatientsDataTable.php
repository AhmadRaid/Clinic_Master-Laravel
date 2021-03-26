<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PatientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('options', 'Patients.btn.options')
        ->addColumn('add', 'Patients.btn.add')
        ->rawColumns([
                'add',
                'options',


            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return User::query()->with('patients')->where('roles_name','User') ;

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
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'dom'=>'Blfrtip',
                        'lengthMenu'=>[[10,25,50,100],[10,25,50,trans('admin.all_record')]],
                        'buttons'=>[
                            ['text'=>'<i class="fa fa-plus">انشاء مريض</i>', 'className'=>'btn btn-primary btn-rounded',
                            "action"=>"function(){
                                window.location.href='".url('patient/add')."';
                            }" ],
                                ['extend'=>'print','className'=>'dt-button btn btn-success btn-rounded','text'=>'<i class="fa fa-print"></i>'],
                                ['extend'=>'csv','className'=>'btn btn-info btn-rounded','text'=>'<i class="fa fa-file">'.trans('admin.export_csv').'</i>'],
                                ['extend'=>'excel','className'=>'btn btn-success btn-sm btn-rounded','text'=>'<i class="fa fa-file">'.trans('admin.export_exl').'</i>'],
                                ['extend'=>'reload','className'=>'btn btn-warning btn-rounded','text'=>'<i class="fas fa-sync"></i>'],
                        ],
                        'initComplete'=>"function () {
                            this.api().columns([1,2]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                        'language'=>datatable_lang(),
                    ]);
                  //  ->buttons(  Button::make('create'),  Button::make('export'), Button::make('print'), Button::make('reset'), Button::make('reload')
                    
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'=>'name',
                'data'=>'id',
                'title'=>'رقم',
            ],[
                'name'=>'name',
                'data'=>'name',
                'title'=>'الاسم',
            ],[
                'name'=>'mobile',
                'data'=>'patients.mobile',
                'title'=>'رقم الموبايل',
            ],[
                'name'=>'city',
                'data'=>'patients.city',
                'title'=>'المدينة',
            ],[
                'name'=>'gender',
                'data'=>'patients.gender',
                'title'=>'النوع',
            ],[
                'name'=>'add',
                'data'=>'add',
                'title'=>'اضافات',
            ],[
                'name'=>'options',
                'data'=>'options',
                'title'=>'خيارات',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ]
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
