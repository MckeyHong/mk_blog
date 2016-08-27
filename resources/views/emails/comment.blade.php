Hi，{{ $username }}：
<br />
您在 {{ systemConfig('title','Enda Blog') }} 上提交的評論被回覆啦，趕緊看看去吧！
<br />
<a href="{{ url(route('article.show',['id'=>$id])) }}#commentList">點擊查看</a>