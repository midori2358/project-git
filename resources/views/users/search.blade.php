
<div>
  <form action="{{ route('projects.search') }}" method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div>
<h1>
  <span>My Book List</span>
</h1>

<table>
  <tr>
    <th>著書名</th><th>著者名</th>
  </tr>

//* 保存されているレコードを一覧表示　*//
  @forelse ($posts as $post)
    <tr>
      <td><a href="{{ route('users.show' , $post) }}">{{ $post->title }}</td></a>
      <td>{{ $post->author }}</td>
    </tr>
  @empty
    <td>No posts!!</td>
  @endforelse
</table>
