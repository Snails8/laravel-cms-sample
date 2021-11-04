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
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>事務所名</th>
    <td colspan="3">
      @includeWhen($errors->get('name'), 'admin._partials.validation_error', ['errors' => $errors->get('name')])
      {{ Form::text('name', old('name', $office->name), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>住所</th>
    <td colspan="3">
      @includeWhen($errors->get('address'), 'admin._partials.validation_error', ['errors' => $errors->get('address')])
      {{ Form::text('address', old('address', $office->address), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>電話番号</th>
    <td colspan="3">
      @includeWhen($errors->get('tel'), 'admin._partials.validation_error', ['errors' => $errors->get('tel')])
      {{ Form::number('tel', old('tel', $office->tel), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>代表者名</th>
    <td colspan="3">
      @includeWhen($errors->get('manager'), 'admin._partials.validation_error', ['errors' => $errors->get('manager')])
      {{ Form::text('manager', old('manager', $office->manager), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>代表者役職名</th>
    <td colspan="3">
      @includeWhen($errors->get('post'), 'admin._partials.validation_error', ['errors' => $errors->get('post')])
      {{ Form::text('post', old('post', $office->post), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>

  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
