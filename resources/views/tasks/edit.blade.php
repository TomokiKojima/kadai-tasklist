@extends('layouts.app')

@section("content")

<h1>ID:{{$task -> id}}　の編集ページ</h1>

{!! Form::model($task,["route" => ["tasks.update",$task->id],"method" => "put" ])  !!}

<div class="form-group">

{!! Form::label("content","タスク内容")  !!}
{!! Form::text("content",$task->content,["class" => "form-control"]) !!}

{!!  Form::label("status","状態") !!}
{!! Form::text("status",$task->status,["class" => "form-control"] ) !!}
</div>


{!! Form::submit("更新",["class" => "btn btn-primary"]) !!}
{!! Form::close() !!}


@endsection