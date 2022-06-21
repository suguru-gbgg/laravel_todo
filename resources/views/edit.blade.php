@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table">
        <div class="error">
            @foreach ($errors->all() as $error)
            <p class="error__message">{{$error}}</p>
            @endforeach
        </div>
        <thead>
            <tr>
                <th scope="col">テキスト</th>
                <th scope="col">作成日時</th>
                <th scope="col">更新日時</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="POST" class="form">
                    @csrf
                    <input type="text" name="text" maxlength="30" placeholder="タスクは30文字で書きましょう。"value="{{ old('text', $todo->text) }}">
                    <td>{{ $todo->created_at->format('Y年m月d日 H:i') }}</td>
                    <td>{{ $todo->updated_at->format('Y年m月d日 H:i') }}</td>
            </tr>
        </tbody>
    </table>
        <button type="submit" class="btn btn-primary">更新する</button>
                    </form>
                </td>
</div>
@endsection