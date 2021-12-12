{{-- @inject('model',App\Store) --}}
@php
    $store = $store->pluck('name','id')->toArray();
    $category = $category->pluck('name','id')->toArray();
@endphp

{!! \App\MyHelper\Field::text('name' , 'الاسم ' ) !!}
{!! \App\MyHelper\Field::text('price' , 'السعر ' ) !!}
{!! \App\MyHelper\Field::select('store_id' , ' اسم المؤسسة ',$store ) !!}
{!! \App\MyHelper\Field::select('category_id' , 'التصنيفات الرئيسية ',$category ) !!}




@push('scripts')


@endpush

