@extends('layouts.app')

@section('content')
  @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            <aside class="mt-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="sm:col-span-2">
                {{-- 投稿フォーム --}}
                @include('projects.form')
                {{-- 投稿一覧 --}}
                @include('projects.projects')
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
