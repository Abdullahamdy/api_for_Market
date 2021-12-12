@extends('admin.layouts.main',[
                                    'page_header'       => 'المستخدمين',
                                    'page_description'  => 'تعديل مستخدم',
                                    'link' => ''
                                ])
@section('content')
    <!-- general form elements -->
    <div class="ibox ibox-primary">
        <!-- form start -->
        {!! Form::model($model,[
                                'url'=>url('admin/users/'.$model->id),
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'PUT',
                                'files' => true
                                ])!!}

        <div class="ibox-content">
            <div class="clearfix"></div>
            <br>
            @include('admin.users.form')

            <div class="ibox-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>

        </div>
        {!! Form::close()!!}

    </div><!-- /.box -->

@endsection
