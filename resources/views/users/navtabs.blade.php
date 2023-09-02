<div class="tabs">
    {{-- ユーザ詳細タブ --}}
    <a href="{{ route('users.show', $user->id) }}" class="tab tab-lifted grow {{ Request::routeIs('users.show') ? 'tab-active' : '' }}">
        自分のプロジェクト
        <div class="badge ml-1">{{ $user->projects_count }}</div>
    </a>

     {{-- お気に入り一覧タブ --}}
    <a href="{{ route('users.favorites', $user->id) }}" class="tab tab-lifted grow {{ Request::routeIs('users.favorites') ? 'tab-active' : '' }}">
        気になるプロジェクト
        <div class="badge ml-1">{{ $user->favorites_count }}</div>
    </a>
    
     {{-- フォロー一覧タブ --}}
    <a href="{{ route('users.followings', $user->id) }}" class="tab tab-lifted grow {{ Request::routeIs('users.followings') ? 'tab-active' : '' }}">
        Followings
        <div class="badge ml-1">{{ $user->followings_count }}</div>
    </a>
    {{-- フォロワー一覧タブ --}}
    <a href="{{ route('users.followers', $user->id) }}" class="tab tab-lifted grow {{ Request::routeIs('users.followers') ? 'tab-active' : '' }}">
        Followers
        <div class="badge ml-1">{{ $user->followers_count }}</div>
    </a>
     
</div>