@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">
            {!! Notification::showAll() !!}
            <div class="panel-heading">評論管理</div>

            <div class="panel-body">

                <table class="table table-hover table-top">
                    <tr>
                        <th>#</th>
                        <th>評論人</th>
                        <th>電子信箱</th>
                        <th>針對於</th>
                        <th>level</th>
                        <th>評論時間</th>
                        <th class="text-right">操作</th>
                    </tr>

                    @foreach($commentList as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->username }}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->article->title }}</td>
                            <td>{{ $v->parent_id == 0?'評論':'回覆 《'.\App\model\Comment::getCommentReplyUserNameByCommentId($v->parent_id).'》的評論' }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right" width="20%">

                                {!! Form::open([
                                'route' => array('backend.comment.destroy', $v->id),
                                'method' => 'delete',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    删除
                                </button>

                                {!! Form::close() !!}

                                {!! Form::open([
                                'route' => array('backend.comment.show', $v->id),
                                'method' => 'get',
                                'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-info">
                                    查看
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                    @endforeach
                </table>

            </div>
            {!! $commentList->render() !!}
        </div>

    </div>
@endsection
