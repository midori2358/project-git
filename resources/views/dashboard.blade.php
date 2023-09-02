@extends('layouts.app')

@section('content')
  @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            <aside class="mt-4">
                {{-- カレンダー --}}
                @include('calendar')
                <div class="my-30">
                {{-- 投稿フォーム --}}
                <h2 class="mt-3 text-align: center; font-weight: 700 text-xl text-indigo-900">新しくプロジェクトを投稿する</h2>
                @include('projects.form')
                </div>
            </aside>
            <div class="sm:col-span-2">
                
                <div>
                <h2>最新のプロジェクト</h2>
                {{-- 投稿一覧 --}}
                @include('projects.projectsall')
                </div>
            </div>
        </div>
    @else
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                 <h2>やりたいこと、みんなでやろう</h2>
                 <p>ひとりでは難しい、でも一人じゃなかったら？</p>
                 <p>どうすればいいかわからない、でも皆のアイデアがあったら？</p>
                 <p>あなたの夢、だれかの挑戦、やってみよう</p>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">Sign up now!</a>
            </div>
        </div>
    </div>
 @endif
@endsection
