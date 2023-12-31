<div class="mt-4">
    @if (isset($projects))
        <ul class="list-none">
            @foreach ($projects as $project)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($project->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div>
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.show', $project->user->id) }}">{{ $project->user->name }}</a>
                            <span class="text-muted text-gray-500">posted at {{ $project->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-2">{!! nl2br(e($project->content)) !!}</p>
                        </div>
                        <div>
                         {{-- testページへのリンク --}}
                        <a class="ext-white bg-violet-200 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-3 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('projects.favoriteusers', $project->id) }}">お気に入り登録ユーザ</a>
                        </div>                       
                        <div>
                            @if (Auth::id() == $project->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case mt-3" 
                                        onclick="return confirm('Delete id = {{ $project->id }} ?')">Delete</button>
                                </form>
                            @endif
                        </div>
                        <div class="mt-2">
                             {{-- お気に入り／解除ボタン --}}
                             @include('favorite.favorite_button')
                        </div>
                    </div>
                   
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $projects->links() }}
    @endif
</div>