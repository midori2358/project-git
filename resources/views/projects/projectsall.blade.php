<div class="mt-4">
    @if (isset($projects1))
        <ul class="list-none">
            @foreach ($projects1 as $project)
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
                            <p class="mb-0">{!! nl2br(e($project->content)) !!}</p>
                        </div>
                        <div>
                            @if (Auth::id() == $project->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case" 
                                        onclick="return confirm('Delete id = {{ $project->id }} ?')">Delete</button>
                                </form>
                            @endif
                        </div>
                          {{-- お気に入り／解除ボタン --}}
                    @include('favorite.favorite_button')
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク 
        {{ $projects1->links() }} --}}
    @endif
</div>