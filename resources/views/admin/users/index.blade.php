@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.user.index'], 'class' => 'pb-3 border-bottom', 'method' => 'GET']) }}
  <table class="table table-striped table-bordered align-middle">
    <colgroup>
      <col style="width: 12%;">
      <col style="width: 33%;">
      <col style="width: 12%;">
      <col style="width: 33%;">
    </colgroup>
    <tr>
      <th scope="row" class="bg-dark text-white">タイトル</th>
      <td colspan="3">
        {{ Form::text('keyword', isset($params['keyword']) ?? '', ['class' => 'form-control']) }}
      </td>
    </tr>
  </table>
  <div class="text-center">
    {{ Form::submit('検索', ['class' => 'btn btn-primary px-5']) }}
  </div>
  {{ Form::close() }}

  <div id='search_result' class="operation mt-3 py-3">
    <a class="btn btn-outline-primary" href="{{ route('admin.user.create') }}">新規作成</a>
  </div>
  <table class="table table-striped table-bordered table-search-result">
    <thead class="bg-dark text-white">
    <tr>
      <th scope="col" class="id">ID</th>
      <th scope="col">所属</th>
      <th scope="col">名前</th>
      <th scope="col">カナ</th>
      <th scope="col">メール</th>
      <th scope="col" class="operation">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->office?->name }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->kana }}</td>
        <td>{{ $user->email }}</td>
        <td class="operation">
          <a class="btn btn-outline-success" href="{{ route('admin.user.edit', ['user' => $user->id]) }}">編集</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center py-4">
    {{ $users->appends($params)->fragment('search_result')->links() }}
  </div>
@endsection
