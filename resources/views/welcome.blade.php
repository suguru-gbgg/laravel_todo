@extends('layouts.app')

@section('content')
    <div class="justify-content-center row text-center">
        <div class="error">
            @foreach ($errors->all() as $error)
                <p class="error__message">{{$error}}</p>
            @endforeach
        </div>
        <form method="post" action="{{ route('store') }}"> 
            @csrf 
            <input type="text" name="text">
            <input type="hidden" name="name" value={{ Auth::user()->id }}>
            <button class="btn btn-primary">データ追加</button>
        </form>
        <ul class="list-group w-75">
            @foreach ($todos as $todo)
            <li class="list-group-item">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto w-25">
                        <a class="text-decoration-none" href="{{ route('show', ['id' => $todo->id]) }}">{{ $todo->text }}</a>
                    </div>
                    <div class="col-auto w-25">
                        <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST" name="deleteForm">
                            @csrf
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                    <div class="col-auto w-25">
                        <form action="{{ route('todo.edit', ['id' => $todo->id]) }}" method="GET">
                            <button type="submit" class="btn btn-secondary">編集</button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection