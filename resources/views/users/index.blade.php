@extends('layouts.app')

@section('content')
    {{-- 検索 --}}
     @include('users.search')

    {{-- ユーザ一覧 --}}
    @include('users.users')
@endsection