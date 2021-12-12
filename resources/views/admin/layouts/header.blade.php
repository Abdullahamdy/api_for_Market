<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary pull-right" href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <ul class="nav navbar-top-links navbar-left">

            <li>
                <script type="">
                    function submitSignout(){
                        document.getElementById('signoutForm').submit();

                    }
                </script>
                {!! Form::open(['method' => 'post', 'url' => url('admin/admin-logout'),'id'=>'signoutForm']) !!}
                {!! Form::hidden('guard','admin') !!}
                {!! Form::close() !!}

                <a href="#" onclick="submitSignout()">
                    <i class="fa fa-sign-out"></i> تسجيل الخروج
                </a>
            </li>


        </ul>

    </nav>
</div>
