<div class="form-group @if($errors->has('title')) has-error @endif">
    <label class="control-label" for="titleField">Titel</label>
    <input type="text"
           name="title"
           value="{{ old('title', $article->title) }}"
           class="form-control"
           id="titleField"
    >
    @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('summary')) has-error @endif">
    <label class="control-label" for="summaryField">Samenvatting</label>
    <textarea name="summary" class="form-control" id="summaryField">{{ old('summary', $article->summary) }}</textarea>
    @if($errors->has('summary'))
        <span class="help-block">{{ $errors->first('summary') }}</span>
    @endif
</div>
<div class="form-group @if($errors->has('body')) has-error @endif">
    <label class="control-label" for="bodyField">Bericht</label>
    <textarea name="body" class="form-control" id="bodyField">{{ old('body', $article->body) }}</textarea>
    @if($errors->has('body'))
        <span class="help-block">{{ $errors->first('body') }}</span>
    @endif
</div>

@section('js')
    @ckeditor('summaryField', ['height' => 150])
    @ckeditor('bodyField', ['height' => 300])
@append