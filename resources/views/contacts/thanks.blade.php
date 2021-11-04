@extends('_layouts.no_index_app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')

  <div class="container">
    <div class="d-flex justify-content-center">
      <div class="col-md-8 bg-white">
        <div class="py-5 text-center mt-2">

          <h2 class="mb-4">お問合せありがとうございます</h2>
          <p>
            この度はSampleのwebサイトよりお問合せ誠にありがとうございます。<br>
            入力いただいた内容確認後、担当より通常1営業日以内にご連絡いたします。<br><br>
            また、自動配信にてお問合せ確認メールを送信しましたので、ご確認の程よろしくお願い致します。
          </p>

          <div class="my-3 pt-3">
            <a class="btn btn-outline-secondary" href="{{ route('top') }}">トップに戻る</a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

