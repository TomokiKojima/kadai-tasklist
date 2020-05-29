@extends('layouts.app')

@section("content")

    @if (count($tasks) > 0)
    <ul>
    @foreach ($tasks as $task)
    
            <li>
                <p> {{$task->content}}  状態:{{$task -> status}}</p> 
        <p>    {!! link_to_route("tasks.show","編集",["task" => $task->id] ) !!} </p>
        
        
        
        
        </li>
    @endforeach
    </ul>
    @endif

@endsection