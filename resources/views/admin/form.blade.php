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
<div class="checkbox">
    <label>
        <input type="hidden" name="published" value="0">
        <input type="checkbox" name="published" value="1" @if(old('published', $article->published)) checked @endif>
        Publiceren
    </label>
</div>


@section('js')
    @ckeditor('summaryField', [
        'height' => 150,
        'toolbarGroups' => [
            [ 'name' => 'document', 'groups' => [ 'mode', 'document', 'doctools' ] ],
            [ 'name' => 'document', 'groups' => [ 'mode', 'document', 'doctools' ] ],
            [ 'name' => 'clipboard', 'groups' => [ 'clipboard', 'undo' ] ],
            [ 'name' => 'editing', 'groups' => [ 'find', 'selection', 'spellchecker', 'editing' ] ],
            [ 'name' => 'forms', 'groups' => [ 'forms' ] ],
            '/',
            [ 'name' => 'basicstyles', 'groups' => [ 'basicstyles', 'cleanup' ] ],
            [ 'name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] ],
            [ 'name' => 'links', 'groups' => [ 'links' ] ],
            [ 'name' => 'insert', 'groups' => [ 'insert' ] ],
            '/',
            [ 'name' => 'styles', 'groups' => [ 'styles' ] ],
            [ 'name' => 'colors', 'groups' => [ 'colors' ] ],
            [ 'name' => 'tools', 'groups' => [ 'tools' ] ],
            [ 'name' => 'others', 'groups' => [ 'others' ] ],
            [ 'name' => 'about', 'groups' => [ 'about' ] ]
        ],
        'removeButtons' => 'Save,NewPage,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,Smiley,PageBreak,Iframe'
    ])
    @ckeditor('bodyField', [
        'height' => 300,
        'toolbarGroups' => [
            [ 'name' => 'document', 'groups' => [ 'mode', 'document', 'doctools' ] ],
            [ 'name' => 'document', 'groups' => [ 'mode', 'document', 'doctools' ] ],
            [ 'name' => 'clipboard', 'groups' => [ 'clipboard', 'undo' ] ],
            [ 'name' => 'editing', 'groups' => [ 'find', 'selection', 'spellchecker', 'editing' ] ],
            [ 'name' => 'forms', 'groups' => [ 'forms' ] ],
            '/',
            [ 'name' => 'basicstyles', 'groups' => [ 'basicstyles', 'cleanup' ] ],
            [ 'name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] ],
            [ 'name' => 'links', 'groups' => [ 'links' ] ],
            [ 'name' => 'insert', 'groups' => [ 'insert' ] ],
            '/',
            [ 'name' => 'styles', 'groups' => [ 'styles' ] ],
            [ 'name' => 'colors', 'groups' => [ 'colors' ] ],
            [ 'name' => 'tools', 'groups' => [ 'tools' ] ],
            [ 'name' => 'others', 'groups' => [ 'others' ] ],
            [ 'name' => 'about', 'groups' => [ 'about' ] ]
        ],
        'removeButtons' => 'Save,NewPage,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Blockquote,CreateDiv,BidiLtr,BidiRtl,Language,Flash,Smiley,PageBreak,Iframe'
    ])
@append