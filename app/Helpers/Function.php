<?php
if(!function_exists('datatable_lang')){
    function datatable_lang(){
            return [
                'sProcessing'=>trans('admin.sProcessing'),
                'sLengthMenu'=>trans('admin.sLengthMenu'),
                'sZeroRecords'=>trans('admin.sZeroRecords'),
                'sInfo'=>trans('admin.sInfo'),
                'sInfoEmpty'=>trans('admin.sInfoEmpty'),
                'sInfoFiltered'=>trans('admin.sInfoFiltered'),
                'sInfoPostFix'=>trans('admin.sInfoPostFix'),
                'sSearch'=>trans('admin.sSearch'),
                'sUrl'=>trans('admin.sUrl'),
                'sInfoThousands'=>trans('admin.sInfoThousands'),
                'sLoadingRecords'=>trans('admin.sLoadingRecords'),
                'oPaginate'=>[
                'sFirst'=>trans('admin.sFirst'),
                'sPrevious'=>trans('admin.sPrevious'),
                'sNext'=>trans('admin.sNext'),
                'sLast'=>trans('admin.sLast'),
                ],
                'oAria'=>[
                    'sSortAscending'=>trans('admin.sSortAscending'),
                    'sSortDescending'=>trans('admin.sSortDescending'),
                ],
            ];

    }
}

if(!function_exists('lang')){
    function lang(){
        if(session()->has('lang')){
            return session('lang');
        }else{
            session()->put('lang',setting()->main_lang);
            return setting()->main_lang;
        }
    }
}
if(!function_exists('direction')){
    function direction(){
        if(session()->has('lang')){
            if(session('lang') == 'ar'){
                return 'rtl';
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }
    }
}
