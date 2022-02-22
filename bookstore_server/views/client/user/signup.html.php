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

                            <a href="/signup">Tạo tài khoản</a></li>
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
                        <h1 class="section__heading u-c-secondary">TẠO MỘT TÀI KHOẢN</h1>
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
                            <h1 class="gl-h1">THÔNG TIN CÁ NHÂN</h1>
                            <form class="l-f-o__form" action="/admin/user/store" method="post">
                                <div class="gl-s-api">
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                            <span>Signup with Facebook</span></button></div>
                                    <div class="u-s-m-b-30">

                                        <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                            <span>Signup with Google</span></button></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-fname">TÊN *</label>

                                    <input name="firstname" class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="First Name"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-lname">HỌ *</label>

                                    <input name="lastname" class="input-text input-text--primary-style" type="text" id="reg-lname" placeholder="Last Name"></div>

                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-phonenumber">SỐ ĐIỆN THOẠI *</label>

                                    <input name="phonenumber" class="input-text input-text--primary-style" type="number" id="reg-phonenumber" ></div>
                               
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-email">E-MAIL *</label>

                                    <input name="email" class="input-text input-text--primary-style" type="email" id="reg-email" placeholder="Enter E-mail"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-user">TÊN NGƯỜI DÙNG *</label>

                                    <input name="username" class="input-text input-text--primary-style" type="text" id="reg-user" placeholder="Nhập tên người dùng"></div>
                              
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-password">MẬT KHẨU *</label>

                                    <input name="password" class="input-text input-text--primary-style" type="password" id="reg-password" placeholder="Enter Password"></div>
                                <div class="u-s-m-b-15">

                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">TẠO</button></div>

                                <a class="gl-link" href="#">Return to Store</a>
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
