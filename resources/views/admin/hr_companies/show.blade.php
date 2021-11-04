@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), '_partials.flash_message_success')
  <div class="row justify-content-between">
    <div class="col-md-6">
      <div class="card p-0 h-100">
        <div class="card-header bg-dark text-white">基本情報</div>
        <div class="card-body bg-light">
          <table class="table">
            <colgroup>
              <col style="width: 20%;">
              <col style="width: 80%;">
            </colgroup>
            <tbody>
            <tr>
              <th>契約No</th>
              <td>{{ $hrCompany->id ?? '' }}</td>
            </tr>
            <tr>
              <th>物件名</th>
              <td>{{ $hrCompany->name ?? '' }}</td>
            </tr>
            <tr>
              <th>代表者名</th>
              <td>{{ $hrCompany->representative ?? '' }}</td>
            </tr>
            <tr>
              <th>Sample</th>
              <td></td>
            </tr>
            <tr>
              <th>担当者</th>
              <td></td>
            </tr>
            <tr>
              <th>確認者</th>
              <td></td>
            </tr>
            <tr>
              <th>ステータス</th>
              <td></td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card p-0">
        <div class="card-header bg-dark text-white">各種操作</div>
        <div class="card-body bg-light">
          <div class="row">
            <div class="col-md-4">
              <a class="btn btn-outline-success" href="{{ route('admin.hr_company.edit', ['hr_company' => $hrCompany->id]) }}">会社情報編集</a>
            </div>
            <div class="col-md-4">
              @if(!$hrCompany->basicContract)
                <a class="btn btn-outline-primary" href="">基本情報作成</a>
              @else
                <a class="btn btn-outline-success" href="">基本情報編集</a>
              @endif
            </div>
            <div class="col-md-4">
              @if(!$hrCompany->sample)
                <a class="btn btn-outline-primary">Sample作成</a>
              @else
                <a class="btn btn-outline-success">Sample編集</a>
              @endif
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4">
              @if(!$hrCompany->paymentContract)
                <a class="btn btn-outline-primary" href="">支払情報作成</a>
              @else
                <a class="btn btn-outline-success" href="">支払情報編集</a>
              @endif
            </div>
            <div class="col-md-4">
              @if(!$hrCompany->sample)
                <a class="btn btn-outline-primary px-3" href="">作成</a>
              @else
                <a class="btn btn-outline-success px-3" href="">編集</a>
              @endif
            </div>
            <div class="col-md-4">
              <a class="btn btn-outline-dark px-3">Sample</a>
            </div>
          </div>
          <div class="row mt-3 pt-3 border-top">
            <label for="exampleFormControlInput1" class="form-label fw-bold">Sample</label>
            <div class="col-md-12">
              {{-- 関連書式への導線 * 密結合なためEnum特に注意--}}
{{--              <select-format-component--}}
{{--                  :lists="{{ json_encode(EnumHrCompany::FORMAT_TYPES) }}"--}}
{{--                  :contract-id="{{ json_encode($hrCompany->id) }} "--}}
{{--                  :links="{{ json_encode(EnumHrCompany::FORMAT_LINKS) }}"--}}
{{--              >--}}
              </select-format-component>
            </div>

          </div>
        </div>
      </div>
      <div class="card mt-3 p-0">
        <div class="card-body bg-light">
          {{ Form::open(['route' => ['admin.hr_company.update', ['hr_company' => $hrCompany->id] ], 'method' => 'put']) }}
          @csrf
          @method('PUT')
          <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
          <textarea class="form-control bg-white" id="exampleFormControlTextarea1" rows="3"></textarea>
          <div class="mt-3 text-end">
            <button class="btn btn-outline-primary">保存</button>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  <div class="row my-3 pt-3 border-top">
    <div class="col-md-6">
      <h2 class="h4 mb-3">導入事例</h2>
      <div class="card p-0">
        <div class="card-header bg-dark text-white">
          導入事例
        </div>
        <div class="card-body bg-light">
          <div>Sample</div>
          <div class="text-end mt-3">
            <button class="btn btn-outline-primary">作成</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-3">
    <div class="card-body bg-light">
      <table class="table align-middle">
        <colgroup>
          <col style="width: 85%;">
          <col style="width: 15%;">
        </colgroup>
        <tbody>
        <tr>
          <td>Sample</td>
          <td class="text-end">
            <button class="btn btn-outline-success">作成</button>
            <button class="btn btn-outline-danger">編集</button>
          </td>
        </tr>
        <tr>
          <td>Sample</td>
          <td class="text-end">
            <button class="btn btn-outline-success">作成</button>
            <button class="btn btn-outline-danger">編集</button>
          </td>
        </tr>
        <tr>
          <td>Sample</td>
          <td class="text-end">
            <button class="btn btn-outline-success">作成</button>
            <button class="btn btn-outline-danger">編集</button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.hr_company.index') }}" >一覧に戻る</a>
  </div>

@endsection