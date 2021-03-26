<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
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
        return datatables($query)
        ->addColumn('checkbox', 'users.btn.checkbox')
        ->addColumn('options', 'users.btn.options')
        ->addColumn('level', 'users.btn.level')
        ->addColumn('status', 'users.btn.status')
        ->rawColumns([
                'level',
                'options',
                'checkbox',
                'status',

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
        return User::query()->where(function($query){
            if(request()->has('level')){
                return $query->where('roles_name' , request('level') )->orderBy('id', 'DESC');
            }
            
        });

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
                            ['text'=>'<i class="fa fa-plus">انشاء عضو جديد</i>', 'className'=>'btn btn-primary btn-rounded',
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
                'name'=>'email',
                'data'=>'email',
                'title'=>'البريد الالكترونى',
            ],[
                'name'=>'level',
                'data'=>'level',
                'title'=>'الصلحيات',
            ],[
                'name'=>'status',
                'data'=>'status',
                'title'=>'الحالة',
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
