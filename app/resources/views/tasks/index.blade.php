@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダ</div>
                    <div class="panel-body">
                        <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                            フォルダを追加する
                        </a>
                    </div>
                    <div class="list-group">
                        @foreach($folders as $folder)
                            <a
                                href="{{ route('tasks.index', ['folder' => $folder]) }}"
                                class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
                            >
                                {{ $folder->title }}
                            </a>
                        @endforeach
                    </div>
                    <div class="panel-body">
                        <a href="{{ route('folders.delete', ['folder' => $folder]) }}" class="btn btn-warning btn-block">
                            選択中のフォルダを削除する
                        </a>
                    </div>
                </nav>
            </div>
            <div class="column col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">タスク</div>
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{ route('tasks.create', ['folder' => $folder]) }}" class="btn btn-default btn-block">
                                タスクを追加する
                            </a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>タイトル</th>
                            <th>状態</th>
                            <th>期限</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>
                                    <span class="label">{{ $task->status_label }}</span>
                                </td>
                                <td>{{ $task->formatted_due_date }}</td>
                                <td><a href="{{ route('tasks.edit', ['folder' => $folder, 'task' => $task]) }}">編集</a></td>
                                <td><a href="{{ route('tasks.delete', ['folder' => $folder, 'task' => $task]) }}">削除</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('folders.refresh') }}" class="btn btn-danger">
                <b>全データを消去する</b>
            </a>
        </div>
    </div>
@endsection
