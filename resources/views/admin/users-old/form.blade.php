
{!! \App\MyHelper\Field::text('name' , 'الاسم')!!}
{!! \App\MyHelper\Field::email('email' , 'البريد الالكترونى') !!}
{!! \App\MyHelper\Field::password('password' , 'كلمة المرور') !!}
{!! \App\MyHelper\Field::password('password_confirmation' , 'تاكيد كلمة المرور') !!}
<br>
<div class="form-group" id="permissions_wrap">
        <label for="permissions">الرتب</label>
        <div class="">
            <br>

            @foreach( $roles as $role)
{{--{{dd($role->name)}}--}}

{{--                @if($model->hasRole($role->name))--}}
{{--                {!! Form::checkBox('roles[]',$role->id) !!}--}}
{{--                <label for="{{$role->name}}">{{$role->name}}</label>--}}
{{--                @else--}}

{{--                @endif--}}

                @if($model->hasRole($role->name))
                    {!! Form::checkBox('roles[]',$role->id) !!}

                    <label for="{{$role->name}}">{{$role->name}}</label>
                @else

                      {!! Form::checkBox('roles[]',$role->id) !!}
                    <label for="{{$role->name}}">{{$role->name}}</label>
                @endif
            @endforeach
        </div>




<br>
    <br>

</div>


