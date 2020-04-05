<div class="modal fade" id="new-question" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="portlet-body">
                            @include('backend.partials._admin_instructions',['title' => trans('general.questions') ,'message' => trans('message.question_message')])
                            <div class="panel-heading">
                                {{ trans('general.new_question') }}
                            </div>
                            <div class="panel-body">
                                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.question.store') }}">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <label for="name_ar" class="control-label"> {{ trans('general.name_ar') }}</label>
                                            <input id="name_ar" type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}" placeholder="name_ar" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <label for="name_en" class="control-label"> {{ trans('general.name_en') }}</label>
                                            <input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" placeholder="name_en" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('notes_ar') ? ' has-error' : '' }}">
                                            <label for="notes_ar" class="control-label"> {{ trans('general.notes_ar') }}</label>
                                            <input id="notes_ar" type="text" class="form-control" name="notes_ar" value="{{ old('notes_ar') }}" placeholder="notes_ar" autofocus>
                                            @if ($errors->has('notes_ar'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('notes_ar') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('notes_en') ? ' has-error' : '' }}">
                                            <label for="notes_en" class="control-label"> {{ trans('general.notes_en') }} </label>
                                            <input id="notes_en" type="text" class="form-control" name="notes_en" value="{{ old('notes_en') }}" placeholder="notes_en">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label sbold"> {{ trans('general.active') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadios3" checked value="1"> {{ trans('general.yes') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="active" id="optionsRadios4" value="0"> {{ trans('general.no') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label sbold">{{ trans('general.question_type') }}</label></br>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" id="optionsRadios5" checked value="is_multi"> {{ trans('general.radios') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" id="optionsRadios6" value="is_text">{{ trans('general.text') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" id="optionsRadios6" value="is_dropdown">{{ trans('general.dropdown') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                            <label for="order" class="control-label">{{ trans('general.sequence') }} *</label>
                                            <input id="order" type="number" class="form-control" name="order" value="{{ old('order') }}" placeholder="order" maxlength="2" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn green modal-save">{{ trans('general.add_question') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- create answer--}}
                    <div class="panel panel-warning">
                        <div class="portlet-body">
                            @include('backend.partials._admin_instructions',['title' => trans('general.answers') ,'message' => trans('message.answer_message')])
                            <div class="panel-heading">
                                {{ trans('general.create_answer') }}
                            </div>
                            <div class="panel-body">
                                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.answer.store') }}">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label"> {{ trans('general.assigned_question') }} </label>
                                            <select class="form-control" name="question_id" required>
                                                @foreach($questions->where('is_multi', true) as $q)
                                                <option value="{{ $q->id }}">{{ $q->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                            <label for="name_ar" class="control-label"> {{ trans('general.name_ar') }} </label>
                                            <input id="name_ar" type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}" placeholder="name_ar" required autofocus>
                                            @if ($errors->has('name_ar'))
                                            <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('name_ar') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                            <label for="name_en" class="control-label"> {{ trans('general.name_en') }} *</label>
                                            <input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" placeholder="name_en" required autofocus>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">  {{ trans('general.assigned_icon') }}</label>
                                    <select class="form-control" name="icon">
                                        @foreach(config('icons') as $n => $v)
                                        <option value="{{ $n }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block"><a target="_blank" href="{{ url('https://origin.fontawesome.com/icons?d=gallery') }}" class="btn btn-sm btn-info">View Icons</a></div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold"> {{ trans('general.active') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios3" checked value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios4" value="0"> {{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold"> {{ trans('general.is_multi') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_multi" id="optionsRadios5" checked value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_multi" id="optionsRadios6" value="0"> {{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold"> {{ trans('general.value') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="value" id="optionsRadios5" checked value="1"> {{ trans('general.yes') }}</label>
                                <label class="radio-inline">
                                    <input type="radio" name="value" id="optionsRadios6" value="0"> {{ trans('general.no') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                <label for="order" class="control-label"> {{ trans('general.sequence') }}</label>
                                <input id="order" type="text" class="form-control" name="order" value="{{ old('order') }}" placeholder="order" maxlength="2">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn yellow modal-save"> {{ trans('general.add_answer') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn red btn-outline" data-dismiss="modal"> {{ trans('general.cancel') }}</button>
    </div>
    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>