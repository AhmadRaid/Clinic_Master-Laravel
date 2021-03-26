<?php

namespace App\DataTables;

use App\Models\Booking;
use Yajra\DataTables\Services\DataTable;

class BookingDataTable extends DataTable
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
        ->addColumn('checkbox', 'bookings.btn.checkbox')
        ->addColumn('options', 'bookings.btn.options')
        ->rawColumns([
                'options',
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
        return Booking::query()->with('user','service')->orderBy('id', 'DESC');
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
                            ['text'=>'<i class="fa fa-plus">انشاء حجز جديد</i>', 'className'=>'btn btn-primary btn-rounded',
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
                'name'=>'user.name',
                'data'=>'user.name',
                'title'=>'المريض',
            ],[
                'name'=>'service.name',
                'data'=>'service.name',
                'title'=>'الخدمه',
            ],[
                'name'=>'date',
                'data'=>'date',
                'title'=>'التاريخ',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'time',
                'data'=>'time',
                'title'=>'الوقت',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'type',
                'data'=>'type',
                'title'=>'نوع الحجز',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],[
                'name'=>'price',
                'data'=>'price',
                'title'=>'السعر',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ], [
            'name' => 'options',
            'data' => 'options',
            'title' => 'خيارات',
            'exportable' => false,
            'printable' => false,
            'searchable' => false,
            'orderable' => false,
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
        return 'Booking_' . date('YmdHis');
    }
}
