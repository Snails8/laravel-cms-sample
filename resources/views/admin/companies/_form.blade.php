@includeWhen(session('critical_error_message'), 'admin._partials.flash_message_error')
<table class="table table-striped border item-va-middle table-form">
  <tbody>
  <colgroup>
    <col style="width: 12%;">
    <col style="width: 33%;">
    <col style="width: 12%;">
    <col style="width: 33%;">
  </colgroup>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>会社名(商号)</th>
    <td colspan="3">
      @includeWhen($errors->get('name'), 'admin._partials.validation_error', ['errors' => $errors->get('name')])
      {{ Form::text('name', old('name', $company->name ?? ''), ['placeholder' => '例）たにし 太郎','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>郵便番号</th>
    <td colspan="3">
      @includeWhen($errors->get('zipcode'), 'admin._partials.validation_error', ['errors' => $errors->get('zipcode')])
      {{ Form::text('zipcode', old('zipcode', $company->zipcode ?? ''), ['placeholder' => '例）名古屋市栄1丁目','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>住所</th>
    <td colspan="3">
      @includeWhen($errors->get('address'), 'admin._partials.validation_error', ['errors' => $errors->get('address')])
      {{ Form::text('address', old('address', $company->address ?? ''), ['placeholder' => '例）名古屋市栄1丁目','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>以下番地</th>
    <td colspan="3">
      @includeWhen($errors->get('address_other'), 'admin._partials.validation_error', ['errors' => $errors->get('address_other')])
      {{ Form::text('address_other', old('address_other', $company->address_other ?? ''), ['placeholder' => '例）マンション301号','class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>連絡先[TEL]</th>
    <td colspan="3">
      @includeWhen($errors->get('tel'), 'admin._partials.validation_error', ['errors' => $errors->get('tel')])
      {{ Form::text('tel', old('tel', $company->tel ?? ''), ['placeholder' => '例）00011112222 ※ハイフン不要','class' => 'form-control', 'maxlength' => '32', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>連絡先[メール]</th>
    <td colspan="3">
      @includeWhen($errors->get('email'), 'admin._partials.validation_error', ['errors' => $errors->get('email')])
      {{ Form::text('email', old('email', $company->email ?? ''), ['placeholder' => '例）xxxxxxx@sample.com', 'class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>代表者名</th>
    <td colspan="3">
      @includeWhen($errors->get('ceo'), 'admin._partials.validation_error', ['errors' => $errors->get('ceo')])
      {{ Form::text('ceo', old('ceo', $company->ceo ?? ''), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
