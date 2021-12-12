@extends('admin.layouts.main',[
								'page_header'		=> 'التصنيفات',
								'page_description'	=> 'عرض ',
								'link' => url('admin/categories')
								])
@section('content')



{{--    @inject('client','App\Models\Client')--}}
{{--    @inject('tender','App\Models\Tender')--}}
{{--    @inject('advertiser','App\Models\Advertiser')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>عدد العملاء</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$client->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>الاشتراكات </h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$client->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">--}}
{{--            <div class="ibox ">--}}
{{--                <div class="ibox-title">--}}
{{--                    <h5>عدد المناقصات</h5>--}}
{{--                </div>--}}
{{--                <div class="ibox-content">--}}
{{--                    <h1 class="no-margins">{{$tender->count()}}</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>المنتجات</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"></h1>
            </div>
        </div>
    </div>

    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>المصنفات الاساسية</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>المصنفات الفرعية</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"></h1>
            </div>
        </div>
    </div>

<div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>عدد الموردين</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins"></h1>
        </div>
    </div>
</div>

<div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>عدد المنتجات اليومية</h5>
        </div>
        <div class="ibox-content">
            <h1 class="no-margins"></h1>
        </div>
    </div>
</div>
</div>

<div class="ibox ">
    <div class="ibox-title">
        <h5>المنتجات شهريا</h5>
    </div>
    <div class="ibox-content">

    </div>
</div>

@endsection

