@extends("layouts.app")

@section("content")
{!! Form::open(["route" => "signup.post"]) !!}
    <div class = "form-group">
        {!! Form::label("name","ユーザー名") !!}
        {!! Form::text("name",old("name"), ['class' => 'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label("email","メアド") !!}
        {!! Form::email("email",old("email"), ['class' => 'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label("password","パスワード") !!}
        {!! Form::password("password", ['class' => 'form-control']) !!}
    </div>
    <div class = "form-group">
        {!! Form::label("password_confirmation","パスワードの確認") !!}
        {!! Form::password("password_confirmation", ['class' => 'form-control']) !!}
    </div>
        {!! Form::submit("登録",["class" => "btn btn-primary btn-block"]) !!}
{!! Form::close() !!}

@endsection