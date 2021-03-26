<?php

namespace App\DataTables;

use App\Models\PatientReports;
use Yajra\DataTables\Services\DataTable;

class PatientReportDataTable extends DataTable
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
            ->eloquent($query)
        ->addColumn('checkbox', 'reports.btn.checkbox')
        ->addColumn('edit', 'reports.btn.edit')
        ->addColumn('delete', 'reports.btn.delete')
        ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return PatientReports::query()->with('patient')->orderBy('id', 'DESC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('booking-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'dom'=>'Blfrtip',
                        'lengthMenu'=>[[10,25,50,100],[10,25,50,trans('admin.all_record')]],
                        'buttons'=>[
                            ['text'=>'<i class="fa fa-plus">انشاء حجز جديد</i>', 'className'=>'btn btn-primary',
                            "action"=>"function(){
                                window.location.href='".\URL::current()."/create';
                            }" ],
                                ['extend'=>'print','className'=>'dt-button btn btn-warning','text'=>'<i class="fa fa-print"></i>'],
                                ['extend'=>'csv','className'=>'btn btn-info','text'=>'<i class="fa fa-file">'.trans('admin.export_csv').'</i>'],
                                ['extend'=>'excel','className'=>'btn btn-success btn-sm btn-rounded','text'=>'<i class="fa fa-file">'.trans('admin.export_exl').'</i>'],
                                ['extend'=>'reload','tag'=>null,'className'=>'btn btn-default','text'=>'<i class="fa fa-refresh"></i>'],
                                ['className'=>'btn btn-warning  ml-2 delBtn','text'=>'<i class="fa fa-trash"></i>'],
                        ],
                        'initComplete'=>"function () {
                            this.api().columns([1,2,3,4]).every(function () {
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
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()"/>',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ], [
                'name' => 'id',
                'data' => 'id',
                'title' => '#',
            ],
            [
                'name'=>'patient.name',
                'data'=>'patient.name',
                'title'=>'اسم المريض',
            ],[
                'name'=>'appointment',
                'data'=>'appointment',
                'title'=>'موعد الحجز',
            ],[
                'name'=>'attachments',
                'data'=>'attachments',
                'title'=>'المرفقات',
            ],[
            'name' => 'edit',
            'data' => 'edit',
            'title' => 'تعديل',
            'exportable' => false,
            'printable' => false,
            'searchable' => false,
            'orderable' => false,
        ],
            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => 'حذف',
                'exportable' => false,
                'printable' => false,
                'searchable' => false,
                'orderable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PatientReports_' . date('YmdHis');
    }
}
