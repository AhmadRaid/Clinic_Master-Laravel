<?php

namespace App\DataTables;

use App\Models\Service;
use App\Models\ServiceTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceTableDataTable extends DataTable
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
            ->addColumn('checkbox', 'service.btn.checkbox')
            ->addColumn('options', 'service.btn.options')
            ->rawColumns([
                'options',
                'checkbox',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     */
    public function query(Service $model)
    {
    return Service::query()->with('department','doctor')->orderBy('id', 'DESC');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('service-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'dom'=>'Blfrtip',
                'lengthMenu'=>[[10,25,50,100],[10,25,50,trans('admin.all_record')]],
                'buttons'=>[
                    ['text'=>'<i class="fa fa-plus">انشاء خدمة جديدة</i>', 'className'=>'btn btn-primary btn-rounded',
                        "action"=>"function(){
                                window.location.href='".\URL::current()."/create';
                            }" ],
                            ['extend'=>'print','className'=>'dt-button btn btn-success btn-rounded','text'=>'<i class="fa fa-print"></i>'],
                            ['extend'=>'csv','className'=>'btn btn-info btn-rounded','text'=>'<i class="fa fa-file">'.trans('admin.export_csv').'</i>'],
                            ['extend'=>'excel','className'=>'btn btn-success btn-sm btn-rounded','text'=>'<i class="fa fa-file">'.trans('admin.export_exl').'</i>'],
                            ['extend'=>'reload','className'=>'btn btn-warning btn-rounded','text'=>'<i class="fas fa-sync"></i>'],
                            ['className'=>'btn btn-danger  ml-2 delBtn btn-rounded','text'=>'<i class="fa fa-trash"></i>'],
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
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()"/>',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'name',
                'data'=>'name',
                'title'=>'الاسم',
            ],[
                'name'=>'description',
                'data'=>'description',
                'title'=>'الوصف',
            ],[
                'name'=>'department',
                'data'=>'department.name',
                'title'=>'القسم',
            ],[
                'name'=>'doctor',
                'data'=>'doctor.name',
                'title'=>'مقدم الخدمة',
            ],[
                'name'=>'detection_price',
                'data'=>'detection_price',
                'title'=>'سعر الكشف',
            ],[
                'name'=>'return_price',
                'data'=>'return_price',
                'title'=>'سعر الاعادة',
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
        return 'service_' . date('YmdHis');
    }
}
