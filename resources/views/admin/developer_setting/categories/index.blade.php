@extends('admin.layouts.main',[
                                'page_header'       => 'اقسام الاعدادات',
                                'page_description'  => "الأقسام",
                                 'link' => url('admin/developer/settings/categories')
                          ])

@section('content')
    <div class="ibox-content">
        <div class="pull-right">
            <a href="{{url('admin/developer/settings/categories/create')}}" class="btn btn-primary">
                <i class="fa fa-plus"></i> إضافة
            </a>
        </div>
        <hr>
        <div class="box-body">

            @include('flash::message')
            @if(count($records))
                <div class="table-responsive">
                    <table class="data-table table table-bordered">
                        <thead>
                        <th>#</th>
                        <th class="text-center">الاسم</th>
                        <th class="text-center">تعديل</th>
                        <th class="text-center">حذف</th>
                        </thead>
                        <tbody>

                        @foreach($records as $record)
                            <tr id="removable{{$record->id}}">
                                <td>{{$record->level}}</td>
                                <td class="text-center">{{$record->name}}</td>
                                <td class="text-center">
                                    <a href="{{url('admin/developer/settings/categories/' . $record->id .'/edit')}}"
                                       class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <button id="{{$record->id}}" data-token="{{ csrf_token() }}"
                                            data-route="{{url('admin/developer/settings/categories/'.$record->id)}}"
                                            type="button" class="destroy btn btn-danger btn-xs"><i
                                                class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
        <div class="text-center">
            {!! $records->render() !!}
        </div>
        @else
            <div>
                <h3 class="text-info" style="text-align: center"> لا توجد بيانات للعرض </h3>
            </div>
        @endif
    </div>

@endsection
