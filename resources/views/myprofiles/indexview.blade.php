<div class="mt-4"> 
 <div class="prose ml-4">
        <h2>プロフィール</h2>
    </div>

    @if (isset($myprofiles))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>誕生日</th>
                    <th>出身地</th>
                    <th>好きなこと、得意なこと</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myprofiles as $myprofile)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('myprofile.show', $myprofile->id) }}">{{ $myprofile->id }}</a></td>
                    <td>{{ $myprofile->birth }}</td>
                    <td>{{ $myprofile->from }}</td>
                    <td>{{ $myprofile->skill }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
                 {{-- メッセージ作成ページへのリンク  --}}                                            
             <a class="btn btn-primary" href="{{ route('myprofile.create') }}">プロフィール作成</a> 
</div>