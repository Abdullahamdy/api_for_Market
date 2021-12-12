
@inject('categories' , App\Models\SettingsCategory)
{!! \App\MyHelper\Field::select('settings_category_id' , 'category', $categories->pluck('name','id')->toArray())!!}
{!! \App\MyHelper\Field::text('display_name' , 'label name ')!!}
{!! \App\MyHelper\Field::text('key' , 'field name') !!}
{!! \App\MyHelper\Field::text('value' , 'value') !!}
{!! \App\MyHelper\Field::text('validation' , 'validation' , $validation) !!}
{!!  \App\MyHelper\Field::select('data_type', 'data type' , [
   'fileWithPreview'=> 'fileWithPreview',
   'mulifileWithPreview'=> 'mulifileWithPreview',
   'editor'  => 'editor',
   'textarea'=> 'textarea',
   'number'  => 'number',
   'email'   => 'email',
   'date'    => 'date',
   'text'    => 'text'
] ) !!}

{!! \App\MyHelper\Field::number('level' , 'level')!!}