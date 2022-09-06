@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <nav class="panel panel-default">
                    <div class="panel-heading"><b>全てのフォルダーとタスクのデータを消去しますか？</b></div>
                    <div class="panel-heading"><b>※消去したデータは復元できません</b></div>
                </nav>
            </div>
        </div>
    </div>
    <form
        action="{{ route('folders.refresh') }}"
        method="POST"
    >
        @csrf
        <div class="text-center">
            <button type="submit" class="btn btn-danger">削除</button>
        </div>
    </form>
@endsection

@section('scripts')
    @include('share.flatpickr.scripts')
@endsection
