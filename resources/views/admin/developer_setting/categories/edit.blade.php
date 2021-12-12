@extends('admin.layouts.main',[
                                'page_header'       => 'اقسام الاعدادات',
                                'page_description'  => "تعديل القسم",
                                 'link' => url('admin/developer/settings/categories')
                                ])

@section('content')
<div class="box">
    <!-- form start -->
    {!! Form::model($record,[
                            'action'=>['Admin\SettingCategoryController@update',$record->id],
                            'id'=>'myForm',
                            'role'=>'form',
                            'method'=>'PUT',
                            'files' => true

                            ])!!}
    <div class="box-body">
        @include('admin.developer_setting.categories.form')
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">حفظ</button>
    </div>
    {!! Form::close()!!}
</div>
@stop

