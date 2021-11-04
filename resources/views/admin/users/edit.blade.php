@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.user.update', ['user' => $user->id] ], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.users._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.user.index') }}" >一覧に戻る</a>
    {{ Form::open(['route' => ['admin.user.destroy', ['user' => $user->id ]], 'method' => 'post' , 'class' => 'd-inline']) }}
    @csrf
    @method('DELETE')
    <input type="button" class="btn btn-outline-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" value="削除">
    @include('admin._partials.confirm_delete_modal')
    {{ Form::close() }}
  </div>
@endsection
