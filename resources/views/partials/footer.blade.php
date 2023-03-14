
    <!-- Footer Area Start -->
    <footer class="footer-section">
        <div class="container pt-120">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="newsletter">
                        <div class="section-area mb-30 dark-sec text-center">
                            <h3 class="title">Subscribe to Our Newsletter</h3>
                        </div>
                        <form action="#">
                            <div class="form-group d-flex align-items-center">
                                <input type="text" placeholder="Your Email Address">
                                <button><img src="{{url('public/frontend/images/icon/arrow-right-2.png')}}" alt="icon"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-area pt-120">
                <div class="footer-top">
                    <div class="row align-items-center">
                        <div class="col-sm-6 d-flex justify-content-center justify-content-sm-start">
                            <div class="menu-item">
                                <ul class="footer-link d-flex align-items-center">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-link d-flex justify-content-sm-end justify-content-center align-items-center">
                                <a href="javascript:void(0)"><img src="{{url('public/frontend/images/icon/facebook.png')}}" alt="icon"></a>
                                <a href="javascript:void(0)"><img src="{{url('public/frontend/images/icon/linkedin.png')}}" alt="icon"></a>
                                <a href="javascript:void(0)"><img src="{{url('public/frontend/images/icon/instagram.png')}}" alt="icon"></a>
                                <a href="javascript:void(0)"><img src="{{url('public/frontend/images/icon/twitter.png')}}" alt="icon"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6 col-sm-8 d-flex justify-content-center justify-content-sm-start order-sm-0 order-1">
                            <div class="copyright text-center text-sm-start">
                                <p> Copyright © {{date('Y')}} <a href="{{url('/')}}">{{ setting('app_name') }}.</a> All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <div class="menu-item">
                                <ul class="footer-link d-flex justify-content-sm-end justify-content-center align-items-center">
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Privacy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->