{% extends client/master_general.html.php %}

{% block title %} NTH Book Store {% endblock %}

{% block content %}

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb__wrap">
                    <ul class="breadcrumb__list">
                        <li class="has-separator">

                            <a href="/">Trang chủ</a></li>
                        <li class="is-marked">

                            <a href="/signin">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">BẠN ĐÃ TẠO TÀI KHOẢN CHƯA?</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row row--center">
                <div class="col-lg-6 col-md-8 u-s-m-b-30">
                    <div class="l-f-o">
                        <div class="l-f-o__pad-box">
                            <h1 class="gl-h1">TÔI LÀ KHÁCH HÀNG MỚI</h1>

                            <span class="gl-text u-s-m-b-30">Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể thực hiện quy trình thanh toán nhanh hơn, lưu trữ địa chỉ giao hàng, xem và theo dõi đơn đặt hàng trong tài khoản của bạn và hơn thế nữa.</span>
                            <div class="u-s-m-b-15">

                                <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="/signup">TẠO MỘT TÀI
                                    KHOẢN</a></div>
                            <h1 class="gl-h1">ĐĂNG NHẬP</h1>

                            <span class="gl-text u-s-m-b-30">Nếu bạn có tài khoản vui lòng đăng nhập.</span>
                            <form class="l-f-o__form" action="" method="post">
                                <div class="gl-s-api">
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i
                                                class="fab fa-facebook-f"></i>

                                            <span>Signin with Facebook</span></button>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i
                                                class="fab fa-google"></i>

                                            <span>Signin with Google</span></button>
                                    </div>
                                </div>
                                
                                <?php if ($is_error ?? false): ?>

                                <div class="u-s-m-b-30 alert" style="
                                    padding: 0.75rem 1.25rem;
                                    margin-bottom: 2rem;
                                    margin-top: 2rem;
                                    border: 1px solid transparent;
                                    border-radius: 0.25rem;
                                    color: #721c24;
                                    background-color: #f8d7da;
                                    border-color: #f5c6cb;
                                ">
                                    <?= $error_message ?>
                                </div>
                                
                                <?php endif; ?>

                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="login-email">E-MAIL *</label>

                                    <input name="email" class="input-text input-text--primary-style" type="email"
                                           id="login-email" placeholder="Enter E-mail"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="login-password">MẬT KHẨU *</label>

                                    <input name="password" class="input-text input-text--primary-style" type="password"
                                           id="login-password" placeholder="Enter Password"></div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">ĐĂNG NHẬP
                                        </button>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <a class="gl-link" href="lost-password.html">Quên mật khẩu?</a></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <!--====== Check Box ======-->
                                    <div class="check-box">

                                        <input type="checkbox" id="remember-me">
                                        <div class="check-box__state check-box__state--primary">

                                            <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->

{% endblock %}
