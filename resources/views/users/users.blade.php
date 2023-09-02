@if (isset($users))
 {{-- 検索機能 --}}
<div>
  <form action="{{ route('users.index') }}" method="GET" class="form-inline my-2 my-lg-0 ml-2　outline-solid">
    <input type="text" name="keyword" value="{{ $keyword }}" class="w-50 py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50" placeholder="user_name">
    <input type="submit" value="検索" class="btn btn-info">
  </form>
</div>

 <ul class="list-none">
        @foreach ($users as $user)
            <li class="flex items-center gap-x-2 mb-4">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <div class="avatar">
                    <div class="w-12 rounded">
                        <img src="{{ Gravatar::get($user->email) }}" alt="" />
                    </div>
                </div>
                <div>
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p><a class="link link-hover text-info" href="{{ route('users.show', $user->id) }}">View profile</a></p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク
    {{ $users->links() }} --}}
@endif