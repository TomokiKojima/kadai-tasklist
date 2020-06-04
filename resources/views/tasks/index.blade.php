@extends('layouts.app')

@section("content")
@if(Auth::check())
    @if (count($tasks) > 0)
    <ul>
    @foreach ($tasks as $task)
    
            <li>
                <p> {{$task->content}}</p>  
                <p>状態:{{$task -> status}}</p>
              

        <p>    {!! link_to_route("tasks.show","詳細",["task" => $task->id] ) !!} </p>
        
        
        
        
        </li>
    @endforeach
    </ul>
    
    
    @else
        <p>現在、タスクはありません</p>
    
    @endif



{!! link_to_route("tasks.create","タスクの新規作成")!!}
{!! link_to_route("logout.get","ログアウト",[],["class" => "btn btn-danger"])!!}

@else
<div>タスクの登録にはログインが必要です</div>
{!! link_to_route('login', 'ログインする', [], ['class' => 'btn btn-lg btn-primary']) !!}
{!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
@endif
@endsection