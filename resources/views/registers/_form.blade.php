<table class="table table-form">
  <tbody>
  <tr>
    <th>お名前</th>
    <td>
      @includeWhen($errors->get('name'), '_partials.validation_error', ['errors' => $errors->get('name')])
      {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '例）鈴木 太郎','maxlength' => '32', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th>フリガナ</th>
    <td>
      @includeWhen($errors->get('kana'), '_partials.validation_error', ['errors' => $errors->get('kana')])
      {{ Form::text('kana', old('kana'), ['class' => 'form-control', 'placeholder' => '例）スズキ タロウ', 'maxlength' => '32', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th>電話番号</th>
    <td>
      @includeWhen($errors->get('tel'), '_partials.validation_error', ['errors' => $errors->get('tel')])
      {{ Form::text('tel', old('tel'), ['class' => 'form-control', 'placeholder' => '例）00012345678 ※ハイフン不要','maxlength' => '32', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th>メールアドレス</th>
    <td>
      @includeWhen($errors->get('email'), '_partials.validation_error', ['errors' => $errors->get('email')])
      {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '例）xxxxxxx@sample.com', 'required' => 'required']) }}
    </td>
  </tr>
  <tr>
    <th>備考(任意)</th>
    <td>
      @includeWhen($errors->get('remarks'), '_partials.validation_error', ['errors' => $errors->get('remarks')])
      {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control', 'rows' => '10', 'cols' => '40']) !!}
    </td>
  </tr>
  </tbody>
</table>

<div class="text-center my-4">
  {{ Form::submit('送信', ['class' => 'btn btn-primary px-5']) }}
</div>