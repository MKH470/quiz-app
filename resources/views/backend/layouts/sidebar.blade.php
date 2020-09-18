<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active">
                            <a href="{{url('/admin')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a>
                        </li>
                    </ul>
                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{route('quiz.index')}}"><i class="menu-icon icon-bullhorn"></i>All Quizzes
                               <b class="label blue pull-right">
                               {{App\Quiz::count()}}</b>
                            </a>
                        </li>





                    </ul>
                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{route('question.index')}}"><i class="menu-icon icon-inbox"></i>All Questions<b class="label green pull-right">
                                    {{App\Question::count()}}</b>
                            </a>
                        </li>
                    </ul>

                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{route('exam.assign')}}"><i class="menu-icon icon-plus"></i>Assign Exam For User
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('view.exam')}}""><i class="menu-icon icon-plus"></i>Users with an exam designated
                            </a>
                        </li>
                        <li>
                            <a href="{{route('result.index')}}"><i class="menu-icon icon-plus"></i>View Result
                            </a>
                        </li>
                    </ul>
                    <!--/.widget-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li>
                            <a href="{{route('user.index')}}"><i class="menu-icon icon-user"></i>All Users <b class="label orange pull-right">
                                {{App\User::count()}}</b>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="menu-icon icon-signout"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!--/.sidebar-->
            </div>
            <div class="span9">
                <div class="content">
                    <div class="col col-md-12">
                    @include('backend.layouts.alerts.success')
                    @include('backend.layouts.alerts.errors')
                    @include('backend.layouts.alerts.warning')
                    </div>
