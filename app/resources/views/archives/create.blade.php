@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
        <div class="col col-md-offset-3 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><b>タスクアーカイブに追加する</b></div>
                <div class="panel-body">
                    <form action="{{ route('archives.create', ['folder' => $folder]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <lavel for="title">タイトル</lavel>
                            @if ($errors->has('title'))
                                <div class="alert alert-danger">
                                @foreach ($errors->get('title') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                                </div>
                            @endif
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <lavel for="period">取組期間</lavel>
                            @if($errors->has('period'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->get('period') as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <input type="text" class="form-control" name="period" id="period" value="{{ old('period') }}" />
                        </div>
                        <div class="form-group">
                            <lavel for="success_level">達成評価（1～10）</lavel>
                            @if($errors->has('success_level'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->get('success_level') as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <input type="number" min="1" max="10" class="form-control" name="success_level" id="success_level" value="{{ old('success_level') }}" />
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    @include('share.flatpickr.scripts')
@endsection
