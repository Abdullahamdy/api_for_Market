@extends('admin.layouts.main',[
								'page_header'		=> 'التصنيفات',
								'page_description'	=> 'عرض ',
								'link' => url('admin/clients')
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
                        'placeholder' => 'الاسم'
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



                        <th class="text-center"> القسم</th>
                        <th class="text-center"> العميل</th>
                        <th class="text-center"> الفاتورة</th>

                        </thead>
                        <tbody>
                        @foreach($records as $record)


                                <td>{{optional($record)->package->name}}</td>
                                <td>{{optional($record)->Client->last_name}}</td>
                                <td>{{optional($record)->invoice_id}}</td>




                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

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
