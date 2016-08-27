<div class="panel panel-default">
    <div class="panel-heading">功能</div>

    <div class="panel-body text-center">

        <ul class="nav nav-list">
            <li>
                <a href="{{ url('/backend/system/index') }}">基本設置</a>
            </li>

            <li>
                <a href="{{ url(route('backend.nav.index')) }}">功能設置</a>
            </li>

            <li>
                <a href="{{ url(route('backend.links.index')) }}">鏈結管理</a>
            </li>

        </ul>
    </div>
</div>