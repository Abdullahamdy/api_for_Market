@extends('admin.layouts.main',[
                                'page_header'       => 'الاعدادات',
                                'page_description'  => 'اعدادات التطبيق',
                                 'link' => url('admin/developer/setting')
                                ])
@section('content')
        <!-- general form elements -->
<div class="box box-primary">
    <!-- form start -->
    {!! Form::model($model,[
                            'action'=>'Admin\DeveloperSetting@store',
                            'id'=>'myForm',
                            'role'=>'form',
                            'method'=>'POST',
                            'files' => true
                            ])!!}

    <div class="box-body">

        @include('admin.developer_setting.form')

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
        </div>

    </div>
    {!! Form::close()!!}

</div><!-- /.box -->

@endsection
