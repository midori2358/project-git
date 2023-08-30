@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="sm:col-span-2 mt-4">
            {{-- 投稿用ページを別に設ける 
            retuen view('users.formview') --}}
            {{-- 投稿一覧 --}}
            @include('projects.projects')
        </div>
    </div>
@endsection