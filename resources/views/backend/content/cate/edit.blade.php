@extends('backend.content.common')

@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">修改分類</div>

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
            {!! Form::model($cate, ['route' => ['backend.cate.update', $cate->id], 'method' => 'put','class'=>'form-horizontal']) !!}

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">上層分類</label>
                <div class="col-sm-3">
                    {!! Form::select('parent_id', App\Model\Category::getCategoryTree() , $cate->parent_id , ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">分類名稱</label>
                <div class="col-sm-3">
                    {!! Form::text('cate_name', $cate->cate_name, ['class' => 'form-control','placeholder'=>'category_name']) !!}
                    <font color="red">{{ $errors->first('cate_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">别名</label>
                <div class="col-sm-3">
                    {!! Form::text('as_name', $cate->as_name, ['class' => 'form-control','placeholder'=>'as_name']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo 標題</label>
                <div class="col-sm-3">
                    {!! Form::text('seo_title', $cate->seo_title, ['class' => 'form-control','placeholder'=>'seo_title']) !!}
                    <font color="red">{{ $errors->first('seo_title') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo 關鍵字</label>
                <div class="col-sm-3">
                    {!! Form::text('seo_key', $cate->seo_key, ['class' => 'form-control','placeholder'=>'seo_key']) !!}
                    <font color="red">{{ $errors->first('seo_key') }}</font>
                </div>
            </div>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">seo 描述</label>
                <div class="col-sm-3">
                    {!! Form::textarea('seo_desc', $cate->seo_desc, ['class' => 'form-control']) !!}
                    <font color="red">{{ $errors->first('seo_desc') }}</font>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('修改', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection