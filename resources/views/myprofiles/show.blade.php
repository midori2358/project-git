@extends('layouts.app')

@section('content')

 <div class="prose ml-4">
        <h2>プロフィールページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $myprofile->id }}</td>
        </tr>

        <tr>
            <th>誕生日</th>
            <td>{{ $myprofile->birth }}</td>
        </tr>
        
        <tr>
            <th>出身地</th>
            <td>{{ $myprofile->from }}</td>
        </tr>
        
        <tr>
            <th>好きなこと、得意なこと</th>
            <td>{{ $myprofile->skill }}</td>
        </tr>
    </table>
    
     @if (Auth::id() == $myprofile->user_id)
     {{-- メッセージ編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('myprofile.edit', $myprofile->id) }}">このメッセージを編集</a>
    @endif
@endsection