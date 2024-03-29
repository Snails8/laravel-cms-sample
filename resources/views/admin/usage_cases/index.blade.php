@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.usage_case.index'], 'class' => 'pb-3 border-bottom', 'method' => 'GET']) }}
  <table class="table table-striped table-bordered align-middle">
    <colgroup>
      <col style="width: 12%;">
      <col style="width: 33%;">
      <col style="width: 12%;">
      <col style="width: 33%;">
    </colgroup>
    <tr>
      <th scope="row" class="bg-dark text-white">導入事例名</th>
      <td colspan="3">
        {{ Form::text('keyword', !empty($params['keyword']) ?? '', ['class' => 'form-control']) }}
      </td>
    </tr>
  </table>
  <div class="text-center">
    {{ Form::submit('検索', ['class' => 'btn btn-primary px-5']) }}
  </div>
  {{ Form::close() }}

  <div id='search_result' class="operation mt-3 py-3">
    <a class="btn btn-outline-primary" href="{{ route('admin.usage_case.create') }}">新規作成</a>
  </div>
  <table class="table table-striped table-bordered table-search-result">
    <thead class="bg-dark text-white">
    <tr>
      <th scope="col" class="id">ID</th>
      <th scope="col">事務所名</th>
      <th scope="col">代表者</th>
      <th scope="col" class="operation">操作</th>
    </tr>
    </thead>
    <tbody>
    Sample です。使用する際はbladeを修正してください。
{{--    @foreach($usageCases as $usageCase)--}}
{{--      <tr>--}}
{{--        <td>{{ $usageCase->id }}</td>--}}
{{--        <td>{{ $usageCase->name }}</td>--}}
{{--        <td>{{ $usageCase->manager }}</td>--}}
{{--        <td class="operation">--}}
{{--          <a class="btn btn-outline-success" href="{{ route('admin.usage_case.edit', ['usage_case' => $usageCase->id]) }}">編集</a>--}}
{{--        </td>--}}
{{--      </tr>--}}
{{--    @endforeach--}}
    </tbody>
  </table>
  <div class="d-flex justify-content-center py-4">
{{--    {{ $usageCases->appends($params)->fragment('search_result')->links() }}--}}
  </div>
@endsection