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
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>タイトル</th>
    <td colspan="3">
      @includeWhen($errors->get('title'), 'admin._partials.validation_error', ['errors' => $errors->get('title')])
      {{ Form::text('title', old('title', $news->title), ['class' => 'form-control', 'required' => 'required' ]) }}
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>公開日</th>
    <td colspan="3">
      @includeWhen($errors->get('public_date'), 'admin._partials.validation_error', ['errors' => $errors->get('public_date')])
      <date-picker-component :target="'public_date'" :value="{{ json_encode(old('public_date', $news->public_date ? $news->public_date->format('Y-m-d') : '')) }}"></date-picker-component>
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white border-white"><span class="p-2 me-2 badge bg-danger">必須</span>カテゴリ</th>
    <td colspan="3">
      @includeWhen($errors->get('news_categories'), 'admin._partials.validation_error', ['errors' => $errors->get('news_categories')])
      <div class="row">
        @foreach($newsCategories as $key => $val)
          <div class="col-md-2 py-1 ml-4 my-auto">
            {{ Form::checkbox('news_categories[]', $key, in_array($key, old('news_categories', $news->newsCategories->pluck('id')->toArray())), ['id' => 'news_category'.$key, 'class' => 'form-check-input']) }}
            {{ Form::label('news_category'.$key, $val, ['class' => 'form-check-label']) }}
          </div>
        @endforeach
      </div>
    </td>
  </tr>

  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>内容</th>
    <td colspan="3">
      @includeWhen($errors->get('body'), 'admin._partials.validation_error', ['errors' => $errors->get('body')])
      {!! Form::textarea('body', old('body', $news->body ?? ''), ['class' => 'form-control', 'rows' => '10', 'required' => 'required']) !!}
    </td>
  </tr>
  <tr>
    <th scope="row" class="bg-dark text-white">画像</th>
    <td colspan="3">
      @includeWhen($errors->get('image'), 'admin._partials.validation_error', ['errors' => $errors->get('image')])
      <image-file-component :id="'image'" :name="'image'" image-path="{{ $imageUrl ?? ''}}" ></image-file-component>
      @if($news->image)
        <div class="col-md-3 ms-1">
          {{ Form::checkbox('is_delete', true, false, ['id' => 'is_delete', 'class' => 'form-check-input']) }}
          {{ Form::Label('is_delete', '削除', ['class' => 'form-check-label']) }}
        </div>
      @endif
    </td>
  </tr>
  <tr>
    <th class="bg-dark text-white"><span class="p-2 me-2 badge bg-danger">必須</span>Description</th>
    <td colspan="3">
      @includeWhen($errors->get('description'), 'admin._partials.validation_error', ['errors' => $errors->get('description')])
      {{ Form::text('description', old('description', $news->description ?? ''), ['class' => 'form-control', 'required' => 'required']) }}
    </td>
  </tr>
  </tbody>
</table>
<div class="text-center">
  {{ Form::submit('保存', ['class' => 'btn btn-primary px-5']) }}
</div>
