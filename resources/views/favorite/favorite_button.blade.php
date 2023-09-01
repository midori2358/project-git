  @if (Auth::user()->is_favoriting($project->id))
        {{-- お気に入り解除ボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.unfavorite', $project->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-block normal-case w-auto" 
                onclick="return confirm('id = {{ $project->id }} のお気に入りを外します。よろしいですか？')">お気に入り解除</button>
        </form>
    @else
        {{-- フォローボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.favorite', $project->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-block normal-case w-auto">お気に入り登録</button>
        </form>
    @endif
