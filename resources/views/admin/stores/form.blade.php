
{!! \App\MyHelper\Field::text('name' , 'الاسم ' ) !!}

{!! \App\MyHelper\Field::text('aboutUs' , 'معلومات عن المتجر ' ) !!}
{!! \App\MyHelper\Field::fileWithPreview('image' , 'الصور' ,true) !!}




@push('scripts')


@endpush

