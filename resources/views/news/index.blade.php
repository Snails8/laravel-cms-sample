@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
  <div>
    <div class="container">
      <h2>お知らせ</h2>
      <ul>
        @foreach($newsLists as $news)
          <li>
            <a href="{{ route('news.show', ['newsId' => $news->id]) }}">
              <small>{{ $news->public_date->format('Y.m.d') }}</small>
              <p>{{ $news->title }}</p>
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection