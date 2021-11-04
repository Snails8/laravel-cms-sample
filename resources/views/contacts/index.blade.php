@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
  <div class="container">
    <div class="d-flex justify-content-center">
      <div class="col-md-8 bg-white border">
        <div class="py-5 text-center">
          <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
          <h2>お問い合わせ</h2>
          <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>

        <div class="d-flex justify-content-center">
          <div class="col-md-10">
            {{ Form::open(['route' => ['contact.post'], 'method' => 'post']) }}
            @csrf
            @method('post')

            {{--  Layout 拡張に対応できるように細分化してある--}}
            @include('contacts._form')
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

