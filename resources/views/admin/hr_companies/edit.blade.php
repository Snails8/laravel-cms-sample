@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  <h4 class="c-grey-900 mT-10 mB-30">{{ $title }}</h4>
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.hr_company.update', 'hr_company' => $hrCompany->id], 'method' => 'put']) }}
  @csrf
  @method('PUT')
  @include('admin.hr_companies._form')
  {{ Form::close() }}
  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.hr_company.index') }}" >一覧に戻る</a>
    <form name="delete" method="POST" action="{{ route('admin.hr_company.destroy', ['hr_company' => $hrCompany]) }}" class="d-inline">
      @csrf
      @method('DELETE')
      <input type="button" class="btn btn-outline-danger" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal" value="削除">
      @include('admin._partials.confirm_delete_modal')
    </form>
  </div>
@endsection
