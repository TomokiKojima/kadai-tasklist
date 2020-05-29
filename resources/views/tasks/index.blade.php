@extends('layouts.app')

@section("content")

    @if (count($tasks) > 0)
    <ul>
    @foreach ($tasks as $task)
    
            <li>{{$task->content}} {!! link_to_route("tasks.show",$task->id,["task" => $task->id] ) !!}   </li>
    @endforeach
    </ul>
    @endif

@endsection