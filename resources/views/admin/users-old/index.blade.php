@extends('admin.layouts.main',[
								'page_header'		=> 'المستخدمين',
								'page_description'	=> 'عرض المستخدمين',
                                'link' => url('admin/users')

								])
@section('content')
    <div class="ibox ibox-primary">
        <div class="ibox-title">
            <div class="pull-right">
                <a href="{{url('admin/users/create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>اضافة مستخدم جديد
                </a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="">
            {!! Form::open([
                'method' => 'GET'
            ]) !!}
            <div class="col-md-3">
                <div class="">
                    <label for="">&nbsp;</label>
                    {!! Form::text('name',old('name'),[
                        'class' => 'form-control',
                        'placeholder' => 'الاسم'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::text('role_name',old('role_name'),[
                        'class' => 'form-control',
                        'placeholder' => 'اسم الصلاحية'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::text('from',old('from'),[
                        'class' => 'form-control datepicker',
                        'placeholder' => 'بداية تاريخ الاضافة',
                                'autocomplete' => 'off',
                    ]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::text('to',old('to'),[
                        'class' => 'form-control datepicker',
                        'placeholder' => 'انتهاء تاريخ الاضافة',
                                'autocomplete' => 'off',
                    ]) !!}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-flat btn-block btn-primary">بحث</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="ibox-content">
            @if(!empty($users) && count($users)>0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th class="text-center">الصلاحيات</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody>
                        @php $count = 1; @endphp
                        @foreach($users as $user)
                            <tr id="removable{{$user->id}}">
                                <td>{{$count}}</td>
                                <td>{{optional($user)->name}}</td>
                                <td>{{optional($user)->email}}</td>
                                <td>

                                    @foreach($user->roles as $role)
                                        <div class="col-lg-4">
                                            <label style="    background-color: #19A689;
    color: white;
    width: 200px;
    text-align: center;
    padding: 6px 0px;
    border-radius: 6px;">{{$role->name}}</label>
                                        </div>
                                    @endforeach
                                </td>

                                <td class="text-center">
                                    {!! \App\MyHelper\Helper::toggleBooleanView($user , url('admin/users/toggle-boolean/'.$user->id.'/is_active'),'is_active') !!}
                                </td>

                                <td class="text-center"><a href="{{url('admin/users/' . $user->id .'/edit')}}"
                                                           class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                @if($user->id === 1 )
                                    <td class="text-center danger">لا يمكن الحذف</td>
                                @else
                                    <td class="text-center">
                                        <button id="{{$user->id}}" data-token="{{ csrf_token() }}"
                                                data-route="{{url('admin/users/'.$user->id)}}" type="button"
                                                class="destroy btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                @endif
                            </tr>
                            @php $count ++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $users->render() !!}
            @else
                <div>
                    <h3 class="text-info" style="text-align: center">No data to show </h3>
                </div>
            @endif


        </div>
    </div>
@stop

@section('script')
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'showImageNumberLabel': false,

        })
    </script>
@stop
