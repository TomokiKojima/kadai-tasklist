

@extends("layouts.app")

@section("content")

{!! Form::open(["route"=>"login.post"]) !!}
<div class = "form-group">
{!! Form::label("email","メアド") !!}
{!! Form::email("email",old("email"),["class" => "form-control"] ) !!}
</div>

<div class = "form-group">
{!! Form::label("password","パスワード") !!}
{!! Form::password("password",["class" => "form-control"])!!}
</div>

{!! Form::submit("ログイン",["class" => "btn btn-primary"]) !!}
{!! Form::close() !!}
@endsection