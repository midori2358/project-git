@extends('layouts.app')

@section('content')

 <div class="prose ml-4">
        <h2>プロフィール</h2>
    </div>

    @if (isset($myprofiles))
    <table class="table table-zebra w-full my-4">
         @foreach ($myprofiles as $myprofile)
          <tr>
            <th>プロフィールNo</th>
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
            <th>誕生日</th>
            <td>{{ $myprofile->skill }}</td>
        </tr>
         @endforeach
    </table>
    @endif
    
     @if (count($myprofiles)<=0)
       {{-- メッセージ作成ページへのリンク  --}}                                            
        <a class="btn btn-primary" href="{{ route('myprofile.create') }}">プロフィール作成</a> 
     @endif
     
      @if (count($myprofiles)>0)
       {{--メッセージ編集ページへのリンク--}} 
       <a class="btn btn-outline" href="{{ route('myprofile.show', $myprofile->id) }}">このメッセージの詳細</a>
      @endif
    
@endsection