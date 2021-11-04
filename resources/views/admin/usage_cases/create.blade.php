@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  {{ Form::open(['route' => ['admin.usage_case.store'], 'method' => 'post', 'files' => true]) }}
  @csrf
  @method('post')
  @include('admin.usage_cases._form')
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.usage_case.index') }}">一覧に戻る</a>
  </div>
  {{ Form::close() }}
@endsection
