<div class="upper-bar">
    
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="language">
                            <a href="{{route('index')}}" class="{{Request::is('/')? 'active':''; }}">عربى</a>
                            <a href="index-ltr.html" class="{{Request::is('///')? 'active':''; }}">EN</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social">
                            <div class="icons">
                                
                            
                                
                          <a href="{{$setting->fb_link}}" class="facebook" ><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$setting->insta_link}}" class="instagram" target="link"><i class="fab fa-instagram"></i></a>
                                <a href="{{$setting->tw_link}}" class="twitter" target="link"><i class="fab fa-twitter"></i></a>
                                <a href="{{$setting->whats_link}}" class="whatsapp" target="link"><i class="fab fa-whatsapp"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- not a member-->
                    <div class="col-lg-4">
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>{{$setting->phone}}</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope">{{$setting->email}}</i>
                                <p></p>
                            </div>
                        </div>
                        
                        <!--I'm a member

                        <div class="member">
                            <p class="welcome">مرحباً بك</p>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    احمد محمد
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="index-1.html">
                                        <i class="fas fa-home"></i>
                                        الرئيسية
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-user"></i>
                                        معلوماتى
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-bell"></i>
                                        اعدادات الاشعارات
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-heart"></i>
                                        المفضلة
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-comments"></i>
                                        ابلاغ
                                    </a>
                                    <a class="dropdown-item" href="contact-us.html">
                                        <i class="fas fa-phone-alt"></i>
                                        تواصل معنا
                                    </a>
                                    <a class="dropdown-item" href="index.html">
                                        <i class="fas fa-sign-out-alt"></i>
                                        تسجيل الخروج
                                    </a>
                                </div>
                            </div>
                        </div>

                        -->
                        
                    </div>
                </div>
            </div>
        </div>
        