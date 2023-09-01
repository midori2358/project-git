@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>プロジェクト 一覧</h2>
    </div>

    @if (isset($projects1))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>プロジェクト</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects1 as $project)
                <tr>
                    <td><a class="link link-hover text-info" href="#">{{ $project->id }}</a></td>
                    <td>{{ $project->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection