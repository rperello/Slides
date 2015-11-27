@section('js')
    <script src="{{ asset('components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/form.js') }}"></script>
@stop

@include('core::admin._buttons-form')

{!! BootForm::hidden('id') !!}

@include('core::admin._image-fieldset', ['field' => 'image'])

@include('core::admin._tabs-lang-form', ['target' => 'content'])

<div class="tab-content">

<div class="row">
    <div class="col-sm-2 form-group @if($errors->has('position'))has-error @endif">
        {!! BootForm::text(trans('validation.attributes.position'), 'position') !!}
    </div>
</div>

@foreach ($locales as $lang)

    <div class="tab-pane fade @if($locale == $lang)in active @endif" id="content-{{ $lang }}">
        @include('core::form._title-and-slug')
        <input type="hidden" name="{{ $lang }}[status]" value="0">
        {!! BootForm::checkbox(trans('validation.attributes.online'), $lang.'[status]') !!}
        {!! BootForm::textarea(trans('validation.attributes.body'), $lang.'[body]')->addClass('ckeditor') !!}
    </div>

@endforeach

</div>