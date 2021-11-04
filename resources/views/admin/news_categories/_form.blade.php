@includeWhen(session('critical_error_message'), 'admin._partials.flash_message_error')
<table class="table table-striped border item-va-middle table-form">
  <tbody>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>お知らせカテゴリ名</th>
    <td>
      @includeWhen($errors->get('name'), 'admin._partials.validation_error', ['errors' => $errors->get('name')])
      {{ Form::text('name', old('name', $newsCategory->name), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white">優先順位</th>
    <td>
      @includeWhen($errors->get('sort_no'), 'admin._partials.validation_error', ['errors' => $errors->get('sort_no')])
      {{ Form::text('sort_no', old('sort_no', $newsCategory->sort_no ?: 50), ['class' => 'form-control']) }}
    </td>
  </tr>
  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>