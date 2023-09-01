<div class="tabs">
    {{-- ユーザ詳細タブ --}}
    <a href="{{ route('users.show', $user->id) }}" class="tab tab-lifted grow {{ Request::routeIs('users.show') ? 'tab-active' : '' }}">
        自分のプロジェクト
        <div class="badge ml-1">{{ $user->microposts_count }}</div>
    </a>

     {{-- お気に入り一覧タブ --}}
    <a href="{{ route('users.favorites', $user->id) }}" class="tab tab-lifted grow {{ Request::routeIs('users.favorites') ? 'tab-active' : '' }}">
        気になるプロジェクト
        <div class="badge ml-1">{{ $user->favorites_count }}</div>
    </a>
</div>