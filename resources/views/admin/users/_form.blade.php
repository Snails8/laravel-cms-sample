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
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>所属</th>
    <td colspan="3">
      @includeWhen($errors->get('office_id'), 'admin._partials.validation_error', ['errors' => $errors->get('office_id')])
      {{ Form::select('office_id', $offices, old('office_id', $user->office_id) , ['id' => 'office_id', 'class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>ユーザー名</th>
    <td colspan="3">
      @includeWhen($errors->get('name'), 'admin._partials.validation_error', ['errors' => $errors->get('name')])
      {{ Form::text('name', old('name', $user->name), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white">フリガナ</th>
    <td colspan="3">
      @includeWhen($errors->get('kana'), 'admin._partials.validation_error', ['errors' => $errors->get('kana')])
      {{ Form::text('kana', old('kana', $user->kana), ['class' => 'form-control']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>メールアドレス</th>
    <td colspan="3">
      @includeWhen($errors->get('email'), 'admin._partials.validation_error', ['errors' => $errors->get('email')])
      {{ Form::email('email', old('email', $user->email), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>パスワード <small>(半角英数字8文字以上)</small></th>
    <td colspan="3">
      @includeWhen($errors->get('password'), 'admin._partials.validation_error', ['errors' => $errors->get('password')])
      {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>パスワード(確認用)</th>
    <td colspan="3">
      @includeWhen($errors->get('password_confirmation'), 'admin._partials.validation_error', ['errors' => $errors->get('password_confirmation')])
      {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) }}
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>権限</th>
    <td colspan="3">
      @includeWhen($errors->get('role'), 'admin._partials.validation_error', ['errors' => $errors->get('role')])
      <div class="row">
        @foreach(EnumUser::ROLES as $key => $val)
          <div class="col-md-2 py-1 ml-4 my-auto">
            {{ Form::radio('role', $val, ($val == old('role', $user->role)), ['id' => 'role'.$key, 'required' => 'required']) }}
            {{ Form::label('role'.$key, $val, ['class' => 'form-check-label m-0 pl-1 pt-2']) }}
          </div>
        @endforeach
      </div>
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white">役職</th>
    <td colspan="3">
      @includeWhen($errors->get('post'), 'admin._partials.validation_error', ['errors' => $errors->get('post')])
      {{ Form::text('post', old('post', $user->post), ['class' => 'form-control']) }}
    </td>
  </tr>

  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
