<span class="label
{{ $roles_name == 'Admin' ? 'label-info':''}}
{{ $roles_name == 'Editor' ? 'label-success':''}}
{{ $roles_name == 'User' ? 'label-primary':''}}
">
{{trans('admin.'.$roles_name)}}
</span>
