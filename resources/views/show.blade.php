@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">テキスト</th>
            <th scope="col">名前</th>
            <th scope="col">作成日時</th>
            <th scope="col">更新日時</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{ $todo->text }}</td>
            <td>{{ $user_name }}</td>
            <td>{{ $todo->created_at->format('Y年m月d日 H:i') }}</td>
            <td>{{ $todo->updated_at->format('Y年m月d日 H:i') }}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-auto">
            <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST" name="deleteForm">
                @csrf
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        <div class="col-auto">
            <form action="{{ route('todo.edit', ['id' => $todo->id]) }}" method="GET">
                <button type="submit" class="btn btn-secondary">編集</button> 
            </form>  
        </div>
        <div class="col-auto">
            <button type="submit" onClick="history.back()" class="btn btn-primary">戻る</button>
        </div>
    </div>
</div>
@endsection