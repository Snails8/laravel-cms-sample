@extends('admin._layouts.app')
@section('title', $title)
@section('content')

  <table class="table table-striped border item-va-middle table-form">
    <tbody>
    <colgroup>
      <col style="width: 12%;">
      <col style="width: 33%;">
      <col style="width: 12%;">
      <col style="width: 33%;">
    </colgroup>
    <tr>
      <th class="bg-dark text-white">会社名</th>
      <td>
        {{ $contact->company }}
      </td>
      <th class="bg-dark text-white">担当者名</th>
      <td>
        {{ $contact->name }}
      </td>
    </tr>

    <tr>
      <th class="bg-dark text-white border-white">メールアドレス</th>
      <td>
        {{ $contact->email }}
      </td>
      <th class="bg-dark text-white">連絡先</th>
      <td>
        {{ $contact->tel }}
      </td>
    </tr>

    <tr>
      <th class="bg-dark text-white border-white">従業員数</th>
      <td>
        {{ EnumContact::CONTACT_TYPE[$contact->employee_count] }}
      </td>
      <th scope="row" class="bg-dark text-white">お問い合わせ:タイプ</th>
      <td>
        {{ EnumContact::EMPLOYEE_COUNT[$contact->contact_type] }}
      </td>
    </tr>

    <tr>
      <th class="bg-dark text-white">お問い合わせ内容:詳細</th>
      <td colspan="3">
        {!! nl2br($contact->detail)  !!}
      </td>
    </tr>
    </tbody>
  </table>

  <div class="my-3 pt-3 border-top">
    <a class="btn btn-outline-secondary" href="{{ route('admin.contact.index') }}">一覧に戻る</a>
  </div>
@endsection