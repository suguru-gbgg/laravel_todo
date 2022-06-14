@extends('layouts.app')
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Todo</title>
</head>
<body>
    <form method="post" action="{{ route('store') }}"> 
        @csrf 
        <input type="text" name="text">
        <button>データ追加</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo->text }}</li>
        @endforeach
    </ul>

</body>
</html>