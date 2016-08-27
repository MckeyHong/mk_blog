@extends('backend.content.common')

@section('content')

    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">查看評論</div>

            {!! Notification::showAll() !!}
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
                    <table class="detail-view table table-striped table-condensed" id="yw0">
                        <tr>
                            <th>id</th>
                            <td>{{ $commentInfo->id }}</td>
                        </tr>
                        <tr>
                            <th>用户</th>
                            <td>{{ $commentInfo->username }}</td>
                        </tr>
                        <tr>
                            <th>電子信箱</th>
                            <td>{{ $commentInfo->email }}</td>
                        </tr>
                        <tr>
                            <th>時間</th>
                            <td>{{ $commentInfo->created_at }}</td>
                        </tr>
                        <tr>
                            <th>評論於</th>
                            <td>
                                {{ $commentInfo->article->title }}
                                <a href="{{ url(route('article.show',['id'=>$commentInfo->el_id])) }}" target="_blank" >點擊查看</a>
                            </td>
                        </tr>
                        <tr>
                            <th>回覆or評論</th>
                            <td>
                                {{ $commentInfo->parent_id == 0?'評論':'回覆用户：'.\App\model\Comment::getCommentReplyUserNameByCommentId($commentInfo->parent_id).'， 的評論' }}
                                @if($commentInfo->parent_id != 0)
                                    <a href="{{ url(route('backend.comment.show',['id'=>$commentInfo->parent_id])) }}" target="_blank" >點擊查看</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>
                                {{ $commentInfo->content }}
                                <br />
                            </td>
                        </tr>

                    </table>
                    <a href="{{ url(route('backend.comment.create',['id'=>$commentInfo->id])) }}" target="_blank" class="btn btn-info" >
                        點擊回覆
                    </a>
                </div>


    </div>
@endsection
