@extends('layouts.app')

@section('content')

 <div class="prose ml-4">
        <h2>プロフィールの編集ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('myprofile.update', $myprofile->id) }}" class="w-1/2">
            @csrf
            @method('PUT')

                <div class="form-control my-4">
                    <label for="birth" class="label">
                        <span class="label-text">誕生日:</span>
                    </label>
                    <input type="date" name="birth" value="{{ $myprofile->birth }}" class="input input-bordered w-full">
                </div>
                <div class="form-control my-4">
                    <label for="from" class="label">
                        <span class="label-text">出身地:</span>
                    </label>
                    <input type="text" name="from" value="{{ $myprofile->from }}" class="input input-bordered w-full">
                </div>
                <div class="form-control my-4">
                    <label for="skill" class="label">
                        <span class="label-text">好きなこと、得意なこと:</span>
                    </label>
                    <input type="text" name="skill" value="{{ $myprofile->skill }}" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection