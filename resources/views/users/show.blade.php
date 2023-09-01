@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
             {{-- カレンダー --}}
        　  @include('calendar')
        </aside>
        <div class="sm:col-span-2 mt-4">
            {{-- タブ --}}  
            @include('users.navtabs')
            {{-- 投稿一覧 --}}
            @include('projects.projects')
             {{-- 投稿フォーム --}}
            @include('projects.form') 
        </div>
    </div>
@endsection