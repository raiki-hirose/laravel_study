@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダ</div>
                    <div class="panel-body">
                        <a href="{{ route('folders.create') }}" class="btn btn-primary btn-block">
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
                        <a href="{{ route('folders.delete', ['folder' => $folder]) }}" class="btn btn-dark btn-block">
                            選択中のフォルダを削除する
                        </a>
                    </div>
                </nav>
            </div>
            <div class="column col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">進行中タスク</div>
                    <div class="panel-body">
                        <div class="text-right">
                            <a href="{{ route('tasks.create', ['folder' => $folder]) }}" class="btn btn-info btn-block">
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
            <div class="column col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">タスクアーカイブ</div>
                    <div class="panel-body">
                        <a href="{{ route('archives.create', ['folder' => $folder]) }}" class="btn btn-default btn-block">アーカイブに追加する</a>
                    </div>
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 56%">タイトル</th>
                                <th class="text-center" style="width: 22%">取組期間</th>
                                <th class="text-center" style="width: 22%">達成評価</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($archives as $archive)
                            <tr>
                                <td class="text-center">{{ $archive->title }}</td>
                                <td class="text-center">{{ $archive->period }}</td>
                                <td class="text-center">{{$archive->success_level}}</td>
                                @inject('archiveController', 'App\Http\Controllers\ArchiveController')
                                <td><a href="{{ route('archives.delete', ['folder' => $folder, 'archive' => $archive]) }}">削除</a></td>
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
