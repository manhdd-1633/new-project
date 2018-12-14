@extends('admin.index')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2></h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">{{ trans('config.home') }}</a>
            </li>
            <li>
                <a href="{{ route('user.index') }}">{{ trans('config.user') }}</a>
            </li>
            <li class="active">
                <strong>{{ trans('config.user_list') }}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ trans('config.tabe_user_list') }}</h5>
                <div class="ibox-tools">
                    <a class="btn btn-success btn-rounded" href="{{ route('user.create') }}">{{ trans('config.add_user') }}</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example"  count-user = {{ count($getUsers) }}>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('config.avatar') }}</th>
                            <th>{{ trans('config.userName') }}</th>
                            <th>{{ trans('config.email') }}</th>
                            <th>{{ trans('config.address') }}</th>
                            <th>{{ trans('config.phone') }}</th>
                            <th>{{ trans('config.role') }}</th>
                            <th>{{ trans('config.status') }}</th>
                            <th>{{ trans('config.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($getUsers as $user)
                                <tr class="gradeX">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {!! Html::image($user->avatarUser, null, ['class' => 'avatar-list img-circle']) !!}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge badge-primary">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="center">
                                        @if ($user->status == 1)
                                            <button class="btn btn-info btn-circle disabled" type="button">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @else
                                           <button class="btn btn-default btn-circle disabled" type="button">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-circle" href="{{ route('user.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit Users !">
                                            <i class="fa fa-pencil" data-unicode="f040"></i>
                                        </a>
                                        <button class="btn btn-warning btn-circle btn-md user-delete" id = "{{ $user->id }}" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Users">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ mix('js/userAjax.js') }}"></script>
@endsection

