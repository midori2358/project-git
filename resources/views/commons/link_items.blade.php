@if (Auth::check())
    {{-- お問い合わせページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('contact.index') }}">問い合わせ</a></li>
    {{-- ユーザ一覧ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.index') }}">ユーザ一覧</a></li>
    {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('users.show', Auth::user()->id) }}">マイページ</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif