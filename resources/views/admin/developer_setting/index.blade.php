@extends('admin.layouts.main',[
                                'page_header'       => 'الاعدادات',
                                'page_description'  => 'اعدادات التطبيق',
                                 'link' => url('admin/developer/setting')
                                ])
@section('content')
    <div class="ibox box-primary">
        <div class="ibox-title">
            <div class="pull-right">
                <a href="{{url('admin/developer/setting/create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> اضافة اعداد جديد
                </a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="ibox-content">

            @if(!empty($records) && count($records)>0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <th>#</th>
                        <th> القسم </th>
                        <th> (label) اسم  </th>
                        <th>(field) اسم</th>
                        <th>القيمة</th>
                        <th>validations</th>
                        <th>(field) نوع</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody>
                        @php $count = 1; @endphp
                        @foreach($records as $setting)
                            <tr id="removable{{$setting->id}}">
                                <td>{{$setting->level}}</td>
                                <td>{{optional($setting->category)->name}}</td>
                                <td>{{optional($setting)->display_name}}</td>
                                <td>{{optional($setting)->key}}</td>
                                <td>{{optional($setting)->value}}</td>
                                <td>{{optional($setting->validation)->value}}</td>
                                <td>{{optional($setting)->data_type}}</td>
                                <td class="text-center"><a href="{{url('admin/developer/setting/' . $setting->id .'/edit')}}" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a></td>
                                <td class="text-center">
                                    <button id="{{$setting->id}}" data-token="{{ csrf_token() }}" data-route="{{URL::route('setting.destroy',$setting->id)}}"  type="button" class="destroy btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @php $count ++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $records->render() !!}
            @else
                <div>
                    <h3 class="text-info" style="text-align: center"> لا توجد بيانات للعرض </h3>
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
            'showImageNumberLabel':false,

        })
    </script>
@stop
