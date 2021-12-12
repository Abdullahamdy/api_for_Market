@extends('admin.layouts.main',[
								'page_header'		=> 'Client',
								'page_description'	=> 'show ',
								'link' => url('admin/clients        ')
								])
@section('content')

    <div class="ibox box-primary">


        <div class="row">
            {!! Form::open([
                'method' => 'GET'
            ]) !!}
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    {!! Form::text('name',old('name'),[
                        'class' => 'form-control',
                        'placeholder' => 'name'
                    ]) !!}
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">&nbsp;</label>
                    <button class="btn btn-primary btn-block" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="ibox-content">
            @if(!empty($records) && count($records)>0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>




                        <th class="text-center"> اسم الاول العميل </th>
                        <th class="text-center">الاسم الثاني </th>
                        <th class="text-center">الايميل</th>
                        <th class="text-center"> المحمول</th>
                        <th class="text-center"> العنوان</th>
                        <th class="text-center">حذف العميل</th>
                        <th class="text-center"> الحالة</th>

                        
                        </thead>
                        <tbody>
                        @foreach($records as $record)

                        <tr id="removable{{$record->id}}">
                                <td>{{optional($record)->first_name}}</td>
                                <td>{{optional($record)->secound_name}}</td>
                                <td>{{optional($record)->email}}</td>
                                <td>{{optional($record)->phone}}</td>
                                <td>{{optional($record)->Address}}</td>




                                 <td class="text-center">
                                    <button
                                            id="{{$record->id}}"
                                            data-token="{{ csrf_token() }}"
                                            data-route="{{url('admin/clients/'.$record->id)}}"
                                            type="button"
                                            class="destroy btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                 </td>
                               
                                <td class="text-center">
                                    {!! \App\MyHelper\Helper::toggleBooleanView($record , url('admin/clients/toggle-boolean/'.$record->id.'/is_active'),'is_active') !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $records->appends(request()->all())->render() !!}
            @else
                <div>
                    <h3 class="text-info" style="text-align: center">No Data For Show</h3>
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
