@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
   
            <div>
             <a class="btn btn-outline btn-secondary mt-2 mb-2 flex-center normal-case"href="mailto:address">{{ $user->email }}へメールを送る</a>
             </div>
            
             @if (Auth::id() == $user->id)
             {{-- プロフィールページへのリンク --}}                                                   
             <a class="btn btn-primary mb-2 flex-center" href="{{ route('profile.edit',$user->id) }}">ユーザー情報の変更</a>
             {{-- カレンダー --}}
        　  @include('calendar')
        　  @endif
        </aside>
        <div class="sm:col-span-2 mt-4">
         @if (isset($myprofile))
             {{-- プロフィールページへのリンク --}}                                                   
             <a class="btn btn-primary mb-2" href="{{ route('myprofile.show',$myprofile->id) }}">プロフィール</a>
        @else
            @if (Auth::id() == $user->id)
              {{-- プロフィールページへのリンク --}}                                                 
             <a class="btn btn-primary mb-2" href="{{ route('myprofile.create') }}">プロフィール作成</a> 
            @endif
        @endif
            {{-- タブ --}}  
            @include('users.navtabs')
            {{-- 投稿一覧 --}}
            @include('projects.projects')
             {{-- 投稿フォーム --}}
            @include('projects.form') 
        </div>
    </div>
@endsection