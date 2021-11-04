@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.news_category.update', 'news_category' => $newsCategory->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.news_categories._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.news_category.index') }}" >一覧に戻る</a>
    <form name="delete" method="POST" action="{{ route('admin.news_category.destroy', ['news_category' => $newsCategory->id]) }}" class="d-inline">
      @csrf
      @method('DELETE')
      <input type="button" class="btn btn-outline-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" value="削除">
      @include('admin._partials.confirm_delete_modal')
    </form>
  </div>
@endsection
