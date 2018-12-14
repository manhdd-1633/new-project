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
                {!! Form::open(['method' => 'PUT', 'route' => ['user.update', $editUser->id ], 'files' => true, 'class' => 'form-horizontal myForm', 'id' => 'myForm']) !!}
                    {!! Form::hidden('id', $editUser->id) !!}
                    <div class="col-lg-6">
                        <div class="form-group">
                        {!!   htmlspecialchars_decode( Form::label('User Name', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                        <div class="col-sm-8">
                            {!!  Form::text( 'name', $editUser->name ?? ' ',[ 'placeholder' => 'Enter User Name','class' =>'form-control', 'required'=>'' ])  !!}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <span class="help-block m-b-none"> * {{ trans('config.note_name') }}.</span>
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label('Email', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {!!  Form::email('email', $editUser->email ?? ' ', [ 'placeholder' => 'Enter email','class' =>'form-control', 'required'=>'' ])  !!}
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                <span class="help-block m-b-none"> * {{ trans('config.note_mail') }}.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label( 'Avatar', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                            <div id="drop-area" class="col-sm-8">
                                <p>{{ trans('config.drag_images') }}</p>
                                <div class="fallback">
                                    {!! Form::file('avatar', ['id' => 'fileElem', 'accept' => 'image/*'])  !!}
                                </div>
                                <label class="button" for="fileElem">{{ trans('config.uploadNewImage') }}</label>
                                <div id="gallery">
                                    {!! Html::image(asset($editUser->avatarUser) ?? ' ', '', ['id' => 'avatar-review', 'accept' => 'image/*']) !!}
                                    {!! Form::hidden('avatar', '', ['id' => 'avatar-hidden']) !!}
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        {!!   htmlspecialchars_decode( Form::label('Address', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                        <div class="col-sm-8">
                            {!!  Form::text( 'address', $editUser->address ?? ' ',[ 'placeholder' => 'Enter address','class' =>'form-control', 'required'=>'' ])  !!}
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                            <span class="help-block m-b-none"> *  {{ trans('config.note_address') }}.</span>
                        </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label('Phone', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {!!  Form::number('phone', $editUser->phone ?? ' ', [ 'placeholder' => 'Enter phone','class' =>'form-control', 'required'=>'' ])  !!}
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                <span class="help-block m-b-none"> *{{ trans('config.note_phone') }}.</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label('Role', null, [ 'class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {!! Form::select('',$roles, null, ['class' => 'form-control m-b', 'id' => 'list_role_edit', 'placeholder' => '----------- roles - options -------------' ]) !!}
                                <p id="add_list">
                                    @foreach ($roleList as $role)
                                        <span class="badge badge-primary" name="list_role" id="{{ $role->id }}">{{ $role->name }} <i class="fa fa-times delete_role" data-unicode="f00d"></i></span>&#32;
                                    @endforeach
                                </p>
                                <span class="help-block m-b-none"> * {{ trans('config.note_role') }}.</span>
                            </div>
                            {!!  Form::hidden( 'role_id','' )  !!}
                        </div>
                        <div class="form-group">
                            {!!   htmlspecialchars_decode( Form::label( 'Status', null, ['class' => 'col-sm-2 control-label'])) !!}
                            <div class="col-sm-8">
                                {{ Form::checkbox('status', 1, $editUser->status == 1 ? 'checked' : '', ['class' => 'js-switch_3']) }}
                                <span class="help-block m-b-none"> * {{ trans('config.note_status') }}.</span>
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins"></div>
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

