@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $news->description ?? '')
@section('content')
  <div >
    <div class="container">
      <h3>{{ $news->title }}</h3>
      <p>{{ $news->public_date->format('Y.m.d') }}</p>
      <p>
        {!! nl2br($news->body) !!}
      </p>
      <p class="text-link-box"><a href="{{ route('news.index') }}" class="text-link">ニュースに戻る</a></p>
    </div>
  </div>
@endsection
