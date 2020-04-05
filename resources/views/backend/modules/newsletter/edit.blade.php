@extends('backend.layouts.app')

@section('content')

    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                create new post
            </div>
            <div class="panel-body">
                {{ Form::model($subscriber,['route' => ['backend.newsletter.update',$subscriber->id], 'method'=>'PATCH','class' => 'form-horizontal','files' => true]) }}
                <div class="form-group">
                    <div class="col-sm-5">
                        <label for="title_ar" class="control-label">name</label>
                        <input type="text" class="form-control" name="name"
                               required="" value="{{ $subscriber->name }}">

                    </div>
                    <div class="col-sm-5">
                        <label for="title_en" class="control-label">email</label>
                        <input type="text" class="form-control" name="email"
                               required="" value="{{ $subscriber->email }}">

                    </div>
                    <div class="col-sm-2">
                        <label for="menu" class="control-label">Active Subscirber</label><br>
                        <input type="radio" name="active" value="1" {{ ($subscriber->active) ? 'checked' : '' }}> active<br>
                        <input type="radio" name="active" value="0" {{ (!$subscriber->active) ? 'checked' : '' }}> Not
                        Active<br>

                    </div>
                </div>

                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Submit</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
