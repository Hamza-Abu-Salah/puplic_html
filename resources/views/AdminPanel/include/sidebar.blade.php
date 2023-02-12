<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">لوحة التحكم</li>


                <li>
                    <a href="{{ Route('index') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> الرئيسية </span>
                    </a>

                </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-users-cog"></i>
                            <span> الاعضاء </span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ Route('users.index') }}">الاعضاء</a></li>
                            <li><a href="{{ Route('users.create') }}">اضافة عضو </a></li>
                        </ul>
                    </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-door-open"></i>
                        <span> الابواب </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ Route('door.index') }}"> عرض الابواب</a></li>
                        <li><a href="{{ Route('door.create') }}">اضافة باب</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-gavel"></i>
                        <span> القوانين </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ Route('laws.index') }}"> عرض القوانين</a></li>
                        <li><a href="{{ Route('laws.create') }}">اضافة قانون</a></li>
                            <li><a href="{{ Route('laws.trashed') }}">القوانين المحذوفة </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-align-justify"></i>
                        <span> المواد </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ Route('material.index') }}"> عرض المواد</a></li>
                        <li><a href="{{ Route('material.create') }}">اضافة مادة</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-shopping-bag"></i>
                        <span> الحقب الزمنية </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ Route('bag.index') }}"> عرض الحقب</a></li>
                        <li><a href="{{ Route('bag.create') }}">اضافة حقبة</a></li>
                            <li><a href="{{ Route('bag.trashed') }}">الحقب المحذوفة </a></li>
                    </ul>
                </li>

                @if(Auth::user()->hasRole(['tito_admin']))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email-outline"></i>
                        <span> التواصل </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">جميع الرسائل</a></li>
                        <li><a href="email-read.html">رسائل مقروءة</a></li>
                        <li><a href="email-compose.html">رسائل غير مقرره</a></li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('social.index') }}" class="waves-effect">
                        <i class="fab fa-facebook-messenger"></i>
                        <span>التواصل الاجتماعي</span>
                    </a>
                </li>


                    <li>
                        <a href="{{ route('setting.index') }}" class="waves-effect">
                            <i class="ion ion-md-settings"></i>
                            <span> الاعدادات </span>
                        </a>
                    </li>
                    @endif

                <li>
                    <a href="{{ route('about.index') }}" class="waves-effect">
                        <i class="ion ion-md-information-circle font-size-15"></i>
                        <span> حول </span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
