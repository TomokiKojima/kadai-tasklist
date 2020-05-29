@extends('layouts.app')

@section("content")

<h1>id{{$task -> id}}の詳細</h1>
<p> {{$task -> content}}</p>
<p> {!! link_to_route("tasks.edit","このタスクを編集",["task" => $task->id],["class" => "btn btn-light"]) !!}

{!! Form::model($task,["route" =>["tasks.destroy",$task ->id], "method" => "delete"]) !!}

{!! Form::submit("削除",["class" => "btn btn-danger"])   !!}
{!! Form::close() !!}


@endsection