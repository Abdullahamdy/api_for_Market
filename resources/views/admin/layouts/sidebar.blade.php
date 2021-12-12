
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">

                    {{--// profile image and display name of user--}}

                    <span>
                            <img alt="image"  style="max-width: 183px;"
                                 src="{{asset('photos/cartoon.png')}}"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{Auth::user()->name}}</strong>

                                </span>
                            </span>
                    </a>



                </div>

                <div class="logo-element">

                    <img src="{{asset('photos/logo_title.png')}}" style="margin-top: 20px; margin-bottom:auto;" height="20"
                         alt="logo">
                </div>
            </li>
            {{--Home--}}

            <li>
                <a href="{{url('admin/product')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label">المنتجات</span>
                </a>
            </li>



            <li>
                <a href="{{url('admin/store')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">المتاجر</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/contact-us')}}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label"> تواصل معنا</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/clients')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> العملاء</span>
                </a>
            </li>

            <li>
                <a href="{{url('admin/category')}}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-label"> التصنيفات</span>
                </a>
            </li>


        </ul>
    </div>
</nav>
