@extends('layouts.app')

@section('content')

<div class="prose ml-4">
        <h2>プロフィール新規作成ページ</h2>
    </div>
    
{{--@if (Auth::id() == $user->id)--}}
    <div class="flex justify-center">
        <form method="POST" action="{{ route('myprofile.store') }}" class="w-1/2">
            @csrf

                <div class="form-control my-4">
                    <label for="date" class="label">
                        <span class="label-text">誕生日:</span>
                    </label>
                    <input type="date" name="birth" class="input input-bordered w-full">
                </div>
                 <div class="form-control my-4">
                    <label for="from" class="label">
                        <span class="label-text">出身地:</span>
                    </label>
                    <input type="text" name="from" class="input input-bordered w-full">
                </div>
                 <div class="form-control my-4">
                    <label for="skill" class="label">
                        <span class="label-text">好きなこと、得意なこと:</span>
                    </label>
                    <input type="text" name="skill" class="input input-bordered w-full ">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">作成</button>
        </form>
    </div>
{{--@endif--}}
@endsection