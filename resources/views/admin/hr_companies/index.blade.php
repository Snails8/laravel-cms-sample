@extends('admin._layouts.app')
@section('title', $title)
@section('content')
  @includeWhen(session('flash_message'), 'admin._partials.flash_message_success')
  {{ Form::open(['route' => ['admin.hr_company.index'], 'class' => 'pb-3 border-bottom', 'method' => 'GET']) }}

  <div class="card my-4">
    <h2 class="card-header bg-dark text-white h5">契約ステータス一覧</h2>
    <div class="card-body bg-light">
      <div class="row justify-content-center">
        <div class="col-sm-2">
          <div class="card">
            <h3 class="card-header text-center h6">申請中</h3>
            <div class="card-body">
              <p class="card-text text-center h6">0件</p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="card">
            <h3 class="card-header text-center h6">確認申請中</h3>
            <div class="card-body">
              <p class="card-text h6 text-center">0件</p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="card">
            <h3 class="card-header text-center h6">要確認</h3>
            <div class="card-body">
              <p class="card-text text-center h6">0件</p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="card">
            <h3 class="card-header text-center h6">契約中</h3>
            <div class="card-body">
              <p class="card-text text-center h6">0件</p>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="card">
            <h3 class="card-header text-center h6">完了</h3>
            <div class="card-body">
              <p class="card-text text-center h6">0件</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <table class="table table-striped table-bordered align-middle">
    <colgroup>
      <col style="width: 12%;">
      <col style="width: 33%;">
      <col style="width: 12%;">
      <col style="width: 33%;">
    </colgroup>
    <tr>
      <th scope="row" class="table-dark">会社名</th>
      <td>
        {{ Form::text('keyword', $params['keyword'] ?? '', ['class' => 'form-control bg-white', 'placeholder' => '会社名']) }}
      </td>
    </tr>
    <tr>
      <th scope="row" class="table-dark">担当者名</th>
      <td>
        {{ Form::text('representative', $params['representative'] ?? '', ['class' => 'form-control bg-white' ]) }}
      </td>
{{--      <th scope="row" class="table-dark">確認者</th>--}}
{{--      <td>--}}
{{--        {{ Form::select('confirmer', $users, $params['confirmer'] ?? '', ['class' => 'form-control bg-white' ]) }}--}}
{{--      </td>--}}
    </tr>
    <tr>
      <th scope="row" class="table-dark py-3">契約プラン</th>
      <td colspan="3">
        <div class="row">
{{--          @foreach (EnumHrCompany:: as $k => $v)--}}
{{--            <div class="col">--}}
{{--              {{ Form::checkbox('contract_types[]', $k, in_array($k, old('contract_types', $params['contract_types'] ?? [])), ['id' => 'contract_type' . $k, 'class' => 'form-check-input bg-white']) }}--}}
{{--              {{ Form::label('contract_type' . $k, $v, ['class' => 'form-check-label']) }}--}}
{{--            </div>--}}
{{--          @endforeach--}}
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row" class="table-dark">所在地</th>
      <td colspan="3">
        {{ Form::text('address', $params['address'] ?? '', ['class' => 'form-control bg-white', 'placeholder' => "所在地"]) }}
      </td>
    </tr>
    <tr>
      <th scope="row" class="table-dark">契約日</th>
      <td>
        <div class="row">
          <div class="col-md-5">
{{--            <date-picker-component :target="'hr_company_date_start'" :value="{{ json_encode($params['hr_company_date_start'] ?? '') }}" :placeholder="'契約日開始'"></date-picker-component>--}}
          </div>
          <div class="col-md-2 my-auto">　〜　</div>
          <div class="col-md-5">
{{--            <date-picker-component :target="'hr_company_date_end'" :value="{{ json_encode($params['hr_company_date_end'] ?? '') }}" :placeholder="'契約日修了'"></date-picker-component>--}}
          </div>
        </div>
      </td>
      <th scope="row" class="table-dark">解約予定日</th>
      <td>
        <div class="row">
          <div class="col-md-5">
{{--            <date-picker-component :target="'cancel_date_start'" :value="{{ json_encode($params['cancel_date_start'] ?? '') }}" :placeholder="'引渡日開始'"></date-picker-component>--}}
          </div>
          <div class="col-md-2 my-auto">　〜　</div>
          <div class="col-md-5">
{{--            <date-picker-component :target="'cancel_date_end'" :value="{{ json_encode($params['cancel_date_end'] ?? '') }}" :placeholder="'引渡日修了'"></date-picker-component>--}}
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th scope="row" class="table-dark py-3">契約ステータス</th>
      <td colspan="3">
        <div class="row">
{{--          @foreach (EnumHrCompany::CONTRACT_STATUS as $k => $v)--}}
{{--            <div class="col">--}}
{{--              {{ Form::checkbox('hr_company_status[]', $k, in_array($k, old('hr_company_status', $params['hr_company_status'] ?? [])), ['id' => 'hr_company_status' . $k, 'class' => 'form-check-input bg-white']) }}--}}
{{--              {{ Form::label('hr_company_status' . $k, $v, ['class' => 'form-check-label']) }}--}}
{{--            </div>--}}
{{--          @endforeach--}}
        </div>
      </td>
    </tr>
  </table>
  <div class="text-center">
    {{ Form::submit('検索', ['class' => 'btn btn-primary px-5']) }}
  </div>
  {{ Form::close() }}


  <div id='search_result' class="d-flex justify-content-between operation mt-3 py-3">
    <p class="h4 fw-bold">検索ヒット: 0件</p>
    <a class="btn btn-outline-primary" href="{{ route('admin.hr_company.create') }}">新規作成</a>
  </div>
  @foreach($hrCompanies as $hrCompany)
    <div class="card mb-4">
      <h2 class="card-header bg-dark text-white h5">
        契約No{{ $hrCompany->id }}: {{ $hrCompany->name }}
      </h2>
      <div class="card-body bg-light">
        <table class="table table-bordered">
          <colgroup>
            <col style="width: 10%;">
            <col style="width: 30%;">
            <col style="width: 30%;">
            <col style="width: 30%;">
          </colgroup>
          <tr>
            <th rowspan="4" class="align-middle text-center">契約中</th>
            <td rowspan="2"><span class="fw-bold">住所: </span>{{ $hrCompany->address }} {{ $hrCompany->address_other ?? ''}}</td>
          </tr>
          <tr>
            <td><span class="fw-bold">電話番号: </span>{{ $hrCompany->tel }} </td>
            <td><span class="fw-bold">メール: </span> {{ $hrCompany->email }}</td>

          </tr>
          <tr>
            <td><span class="fw-bold">契約日: </span>{{ $hrCompany->created_at->format('Y年m月d日') ?? '' }} </td>
            <td><span class="fw-bold">最終更新日: </span> {{ $hrCompany->updated_at->format('Y年m月d日') ?? '' }}</td>
            <td><span class="fw-bold">契約終了予定日: </span> </td>
          </tr>
          <tr>
            <td><span class="fw-bold">担当者: </span>{{ $hrCompany->representative}}</td>
            <td><span class="fw-bold">sample: </span> </td>
            <td><span class="fw-bold">sample: </span> </td>
          </tr>
        </table>
        <div class="text-end">
          <button class="btn btn-outline-success">契約書表示</button>
          <a href="{{ route('admin.hr_company.show', ['hr_company' => $hrCompany->id ]) }}" class="btn btn-outline-dark px-4">詳細</a>
        </div>
      </div>
    </div>
  @endforeach
  <div class="d-flex justify-content-center py-4">
    {{ $hrCompanies->appends($params)->fragment('search_result')->links() }}
  </div>


















{{--  <table class="table table-striped table-bordered align-middle">--}}
{{--    <colgroup>--}}
{{--      <col style="width: 12%;">--}}
{{--      <col style="width: 33%;">--}}
{{--      <col style="width: 12%;">--}}
{{--      <col style="width: 33%;">--}}
{{--    </colgroup>--}}
{{--    <tr>--}}
{{--      <th scope="row" class="bg-dark text-white">タイトル</th>--}}
{{--      <td colspan="3">--}}
{{--        {{ Form::text('keyword', isset($params['keyword']) ?? '', ['class' => 'form-control']) }}--}}
{{--      </td>--}}
{{--    </tr>--}}
{{--  </table>--}}
{{--  <div class="text-center">--}}
{{--    {{ Form::submit('検索', ['class' => 'btn btn-primary px-5']) }}--}}
{{--  </div>--}}
{{--  {{ Form::close() }}--}}


{{--  <div id='search_result' class="operation mt-3 py-3">--}}
{{--    <a class="btn btn-outline-primary" href="{{ route('admin.hr_company.create') }}">新規作成</a>--}}
{{--  </div>--}}
{{--  <table class="table table-striped table-bordered table-search-result">--}}
{{--    <thead class="text-white bg-dark">--}}
{{--    <tr>--}}
{{--      <th scope="col" class="id">ID</th>--}}
{{--      <th scope="col" class="work-name">タイトル</th>--}}
{{--      <th scope="col" class="display">HP公開</th>--}}
{{--      <th scope="col" class="operation">操作</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach($hrCompanies as $hrCompany)--}}
{{--      <tr>--}}
{{--        <td >{{ $hrCompany->id }}</td>--}}
{{--        <td >{{ $hrCompany->name}}</td>--}}
{{--        <td class="display">--}}
{{--          <is-hr_company-component--}}
{{--              :update-id="{{ $hrCompany->id }}"--}}
{{--              :is-admin.hr_company="{{ (int)$hrCompany->is_admin.hr_company }}"--}}
{{--              :target="{{ json_encode('hr_companies') }}" >--}}
{{--          </is-hr_company-component>--}}
{{--        </td>--}}
{{--        <td class="operation">--}}
{{--          <a class="btn btn-outline-success" href="{{ route('admin.hr_company.edit', ['hr_company' => $hrCompany->id]) }}">編集</a>--}}
{{--        </td>--}}
{{--      </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--  </table>--}}
{{--  <div class="d-flex justify-content-center py-4">--}}
{{--    {{ $hrCompanies->appends($params)->fragment('search_result')->links() }}--}}
{{--  </div>--}}
@endsection
