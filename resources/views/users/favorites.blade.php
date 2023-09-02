@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="sm:col-span-2 mt-4">
             {{-- プロフィールページへのリンク --}}                                                   
             <a class="btn btn-primary mb-2" href="{{ route('myprofile.index',$user->id) }}">プロフィール</a>
            {{-- タブ --}}
            @include('users.navtabs')
            <div class="mt-4">
                {{-- お気に入り一覧 --}}
                @include('users.favoview')
            </div>
        </div>
    </div>
@endsection