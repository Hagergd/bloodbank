<div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('front/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item {{Request::is('/')? 'active':''; }}">
                                <a class="nav-link" href="{{route('index')}}">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{Request::is('who-are')? 'active':''; }} ">
                                <a class="nav-link" href="{{route('who-are')}}">عن بنك الدم</a>
                            </li>
                            <li class="nav-item {{Request::is('article-details')? 'active':''; }}">
                                <a class="nav-link" href="{{route('article-details')}}">المقالات</a>
                            </li>
                            <li class="nav-item {{Request::is('all-requests')? 'active':''; }} ">
                                <a class="nav-link" href="{{route('all-requests')}}">طلبات التبرع</a>
                            </li>
                            <li class="nav-item {{Request::is('about-app')? 'active':''; }}">
                                <a class="nav-link" href="{{route('about-app')}}">من نحن</a>
                            </li>
                            <li class="nav-item {{Request::is('client-contact-us')? 'active':''; }}">
                                <a class="nav-link" href="{{route('client-contact-us')}}">اتصل بنا</a>
                            </li>
                        </ul>
                        
                        <!--not a member-->
                        <div class="accounts">
                            <a href="{{route('client-register')}}" class="create">إنشاء حساب جديد</a>
                            <a href="{{route('client-login')}}" class="signin">الدخول</a>
                        </div>
                        
                        <!--I'm a member

                        <a href="#" class="donate">
                            <img src="imgs/transfusion.svg">
                            <p>طلب تبرع</p>
                        </a>

                        -->
                        
                    </div>
                </div>
            </nav>
        </div>
        