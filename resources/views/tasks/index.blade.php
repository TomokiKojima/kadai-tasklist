@extends('layouts.app')

@section("content")

    @if (count($tasks) > 0)
    <ul>
    @foreach ($tasks as $task)
            <li>・{{$task->content}}</li>
    @endforeach
    </ul>
    @endif

@endsection