@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.contact.index'], 'class' => 'pb-3 border-bottom', 'method' => 'GET']) }}
  <table class="table table-striped table-bordered align-middle">
    <colgroup>
      <col style="width: 12%;">
      <col style="width: 33%;">
      <col style="width: 12%;">
      <col style="width: 33%;">
    </colgroup>
    <tr>
      <th scope="row" class="bg-dark text-white">会社名</th>
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
  </div>
  <table class="table table-striped table-bordered table-search-result">
    <thead class="bg-black text-white">
    <tr>
      <th scope="col" class="id">ID</th>
      <th scope="col" class="date">問い合わせ日</th>
      <th scope="col" class="work-name">カテゴリ</th>
      <th scope="col" class="display">社名・代表者</th>
      <th scope="col" class="operation">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->created_at->format('Y/m/d H時i分s秒') }}</td>
        <td>{{ EnumContact::CONTACT_TYPE[$contact->contact_type] }}</td>
        <td>{{ $contact->company . ' ' . $contact->name }}</td>
        <td class="operation">
          <a class="btn btn-outline-success" href="{{ route('admin.contact.show', ['contact' => $contact->id]) }}">詳細</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center py-4">
    {{ $contacts->appends($params)->fragment('search_result')->links() }}
  </div>
@endsection