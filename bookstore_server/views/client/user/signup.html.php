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
                            <form class="l-f-o__form">
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

                                    <input class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="First Name"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-lname">HỌ *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="reg-lname" placeholder="Last Name"></div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <!--====== Date of Birth Select-Box ======-->

                                        <span class="gl-label">NGÀY SINH</span>
                                        <div class="gl-dob"><select class="select-box select-box--primary-style">
                                                <option selected>Month</option>
                                                <option value="male">January</option>
                                                <option value="male">February</option>
                                                <option value="male">March</option>
                                                <option value="male">April</option>
                                            </select><select class="select-box select-box--primary-style">
                                                <option selected>Day</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                            </select><select class="select-box select-box--primary-style">
                                                <option selected>Year</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                            </select></div>
                                        <!--====== End - Date of Birth Select-Box ======-->
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="gender">GIỚI TÍNH</label><select class="select-box select-box--primary-style u-w-100" id="gender">
                                            <option selected>Select</option>
                                            <option value="male">Nam</option>
                                            <option value="male">Nữ</option>
                                        </select></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-email">E-MAIL *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="reg-email" placeholder="Enter E-mail"></div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="reg-password">MẬT KHẨU *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="reg-password" placeholder="Enter Password"></div>
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
