@extends('backend.user.common')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">新增用户</div>

        @if ($errors->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong>
            {{ $errors->first('error', ':message') }}
            <br />
            請聯繫開發者！
        </div>
        @endif

        <div class="panel-body">
            {!! Form::open(['route' => 'backend.user.store', 'method' => 'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-3">
                    {!! Form::text('name', '', ['class' => 'form-control','placeholder'=>'Username']) !!}
                    <font color="red">{{ $errors->first('name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">電子信箱</label>
                <div class="col-sm-3">
                    {!! Form::text('email', '', ['class' => 'form-control','placeholder'=>'Email']) !!}
                    <font color="red">{{ $errors->first('email') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密碼</label>
                <div class="col-sm-3">
                    {!! Form::text('password', '', ['class' => 'form-control','placeholder'=>'Password']) !!}
                    <font color="red">{{ $errors->first('password') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">頭像</label>
                <div class="col-sm-3">
                    {!! Form::file('photo') !!}
                    <font color="red">{{ $errors->first('photo') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">密碼</label>
                <div class="col-sm-3 editor">
                    @include('editor::head')
                    {!! Form::textarea('desc', '', ['class' => 'form-control','id'=>'myEditor']) !!}
                    <font color="red">{{ $errors->first('desc') }}</font>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('新增', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
