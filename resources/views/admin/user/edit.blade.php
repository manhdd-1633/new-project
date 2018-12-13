@extends('admin.index')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('user.index') }}">User</a>
            </li>
            <li class="active">
                <strong>User Edit</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content">
                {!! Form::open(['method' => 'PUT', 'route' => ['user.update', $editUser->id ], 'files' => true, 'class' => 'form-horizontal']) !!}
                    <div class="col-lg-6">
                        <div class="form-group">
                        {!!   htmlspecialchars_decode( Form::label('User Name', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                        <div class="col-sm-8">
                            {!!  Form::text( 'name', $editUser->name ?? ' ',[ 'placeholder' => 'Enter User Name','class' =>'form-control', 'required'=>'' ])  !!}
                            <span class="help-block m-b-none"> * {{ trans('config.note_name') }}.</span>
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label('Email', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {!!  Form::email('email', $editUser->email ?? ' ', [ 'placeholder' => 'Enter email','class' =>'form-control', 'required'=>'' ])  !!}
                                <span class="help-block m-b-none"> * {{ trans('config.note_mail') }}.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        {!!   htmlspecialchars_decode( Form::label('Address', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                        <div class="col-sm-8">
                            {!!  Form::text( 'address', $editUser->address ?? ' ',[ 'placeholder' => 'Enter address','class' =>'form-control', 'required'=>'' ])  !!}
                            <span class="help-block m-b-none"> *  {{ trans('config.note_address') }}.</span>
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label('Phone', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {!!  Form::text('phone', $editUser->phone ?? ' ', [ 'placeholder' => 'Enter phone','class' =>'form-control', 'required'=>'' ])  !!}
                                <span class="help-block m-b-none"> *{{ trans('config.note_phone') }}.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label( 'Status', null, ['class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {{ Form::checkbox('status', 1, $editUser->status == 1 ? 'checked' : '', ['class' => 'js-switch_3']) }}
                                <span class="help-block m-b-none"> * {{ trans('config.note_status') }}.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </div>
                    <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="image-crop">
                                    {!!  Html::image($editUser->avatar ? $editUser->avatarUser : config('site.avatar-default'))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <h4>{{ trans('config.previewImage') }}</h4>
                                <div class="img-preview img-preview-sm"></div>
                                <p>
                                   {{ trans('config.positionImage') }}
                                </p>
                                <div class="btn-group">
                                    <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                          {{ trans('config.uploadNewImage') }}
                                    </label>
                                       {!! Form::file('avatar', ['class' => 'hide', 'accept' => 'avatar/*', 'id' => 'inputImage']) !!}
                                </div>
                                <p>
                                     {{ trans('config.set_of_options') }}
                                </p>
                                <div class="btn-group">
                                    {{ Form::button('Zoom In ', ['class' => 'btn btn-white', 'id' => 'zoomIn']) }}
                                    {{ Form::button('Zoom Out ', ['class' => 'btn btn-white', 'id' => 'zoomOut']) }}
                                    {{ Form::button('Rotate Left ', ['class' => 'btn btn-white', 'id' => 'rotateLeft']) }}
                                    {{ Form::button('Rotate Right ', ['class' => 'btn btn-white', 'id' => 'rotateRight']) }}
                                    {{ Form::button('New crop ', ['class' => 'btn btn-warning', 'id' => 'setDrag']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12">
                        {{ Form::button('Cancel ', ['class' => 'btn btn-white']) }}
                        {{ Form::submit('Save ', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
        <script src="{{ mix('js/cropper-image.js') }}"></script>
        <script src="{{ mix('js/userAjax.js') }}"></script>
@endsection

