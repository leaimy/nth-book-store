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

                        <a href="#">Thanh toán</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="checkout-msg-group">
                    <div class="msg u-s-m-b-30">

                        <span class="msg__text">Phản hồi khách hàng?

                            <a class="gl-link" href="#return-customer" data-toggle="collapse">Nhấn vào đây để đăng nhập</a></span>
                        <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                            <div class="l-f u-s-m-b-16">

                                <span class="gl-text u-s-m-b-16">Nếu bạn đã có tài khoản với chúng tôi. Vào đây để đăng nhập</span>
                                <form class="l-f__form">
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="login-email">E-MAIL *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail"></div>
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="login-password">MẬT KHẨU *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="login-password" placeholder="Enter Password"></div>
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">ĐĂNG NHẬP</button></div>
                                        <div class="u-s-m-b-15">

                                            <a class="gl-link" href="lost-password.html">Quên mật khẩu?</a></div>
                                    </div>

                                    <!--====== Check Box ======-->
                                    <div class="check-box">

                                        <input type="checkbox" id="remember-me">
                                        <div class="check-box__state check-box__state--primary">

                                            <label class="check-box__label" for="remember-me">Nhớ mật khẩu</label></div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="msg">

                        <span class="msg__text">Có mã giảm giá hay không?

                            <a class="gl-link" href="#have-coupon" data-toggle="collapse">Nhấn vào đây để nhập mã giảm giá của bạn</a></span>
                        <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                            <div class="c-f u-s-m-b-16">

                                <span class="gl-text u-s-m-b-16">Nhập mã giảm giá của bạn nếu bạn có mã.</span>
                                <form class="c-f__form">
                                    <div class="u-s-m-b-16">
                                        <div class="u-s-m-b-15">

                                            <label for="coupon"></label>

                                            <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">ÁP DỤNG</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->


<!--====== Section 3 ======-->
<div class="u-s-p-b-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="checkout-f">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="checkout-f__h1">THÔNG TIN VẬN CHUYỂN</h1>
                    <form class="checkout-f__delivery">
                        <div class="u-s-m-b-30">
                            <div class="u-s-m-b-15">

                                <!--====== Check Box ======-->
                                <div class="check-box">

                                    <input type="checkbox" id="get-address">
                                </div>
                                <!--====== End - Check Box ======-->
                            </div>

                            <!--====== First Name, Last Name ======-->
                            <div class="gl-inline">
                                <div class="u-s-m-b-15">

                                    <label class="gl-label" for="billing-fname">TÊN *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="billing-fname" data-bill=""></div>
                                <div class="u-s-m-b-15">

                                    <label class="gl-label" for="billing-lname">HỌ ĐỆM *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="billing-lname" data-bill=""></div>
                            </div>
                            <!--====== End - First Name, Last Name ======-->


                            <!--====== E-MAIL ======-->
                            <div class="u-s-m-b-15">

                                <label class="gl-label" for="billing-email">E-MAIL *</label>

                                <input class="input-text input-text--primary-style" type="text" id="billing-email" data-bill=""></div>
                            <!--====== End - E-MAIL ======-->


                            <!--====== PHONE ======-->
                            <div class="u-s-m-b-15">

                                <label class="gl-label" for="billing-phone">SỐ ĐIỆN THOẠI *</label>

                                <input class="input-text input-text--primary-style" type="text" id="billing-phone" data-bill=""></div>
                            <!--====== End - PHONE ======-->


                            <!--====== Street Address ======-->
                            <div class="u-s-m-b-15">

                                <label class="gl-label" for="billing-street">ĐỊA CHỈ CỤ THỂ *</label>

                                <input class="input-text input-text--primary-style" type="text" id="billing-street" placeholder="Nhập số nhà tên đường" data-bill=""></div>

                            <!--====== Country ======-->
                            <div class="u-s-m-b-15">

                                <!--====== Select Box ======-->

                                <label class="gl-label" for="province">TỈNH/THÀNH PHỐ *</label><select class="select-box select-box--primary-style" id="province" data-bill="">
                                    <option selected value="">Choose Country</option>
                                    <option value="uae">United Arab Emirate (UAE)</option>
                                    <option value="uk">United Kingdom (UK)</option>
                                    <option value="us">United States (US)</option>
                                </select>
                                <!--====== End - Select Box ======-->
                            </div>
                            <!--====== End - Country ======-->


                            <!--====== Town / City ======-->
                            <div class="u-s-m-b-15">
                            <label class="gl-label" for="district">QUẬN/HUYỆN *</label><select class="select-box select-box--primary-style" id="district" data-bill="">
                                    <option selected value="">Vui lòng chọn tỉnh</option>
                                   
                                </select>
                                </div>
                            <!--====== End - Town / City ======-->


                            <!--====== STATE/PROVINCE ======-->
                            <div class="u-s-m-b-15">

                                <!--====== Select Box ======-->

                                <label class="gl-label" for="ward">PHƯỜNG/XÃ *</label><select class="select-box select-box--primary-style" id="ward" data-bill="">
                                    <option selected value="">Vui lòng chọn quận/huyện</option>
                                </select>
                                <!--====== End - Select Box ======-->
                            </div>
                            <!--====== End - STATE/PROVINCE ======-->


                            <!--====== ZIP/POSTAL ======-->
                            <div class="u-s-m-b-15">

                                <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>

                                <input class="input-text input-text--primary-style" type="text" id="billing-zip" placeholder="Zip/Postal Code" data-bill=""></div>
                            <!--====== End - ZIP/POSTAL ======-->
                            <div class="u-s-m-b-10">

                                <!--====== Check Box ======-->
                                <div class="check-box">

                                    <input type="checkbox" id="make-default-address" data-bill="">
                                    <div class="check-box__state check-box__state--primary">

                                        <label class="check-box__label" for="make-default-address">Make default shipping and billing address</label></div>
                                </div>
                                <!--====== End - Check Box ======-->
                            </div>
                            <div class="u-s-m-b-10">

                                <a class="gl-link" href="#create-account" data-toggle="collapse">Want to create a new account?</a></div>
                            <div class="collapse u-s-m-b-15" id="create-account">

                                <span class="gl-text u-s-m-b-15">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</span>
                                <div>

                                    <label class="gl-label" for="reg-password">Account Password *</label>

                                    <input class="input-text input-text--primary-style" type="text" data-bill id="reg-password"></div>
                            </div>
                            <div class="u-s-m-b-10">

                                <label class="gl-label" for="order-note">ORDER NOTE</label><textarea class="text-area text-area--primary-style" id="order-note"></textarea></div>
                            <div>

                                <button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE</button></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                    <!--====== Order Summary ======-->
                    <div class="o-summary">
                        <div class="o-summary__section u-s-m-b-30">
                            <div class="o-summary__item-wrap gl-scroll">
                                <div class="o-card">
                                    <div class="o-card__flex">
                                        <div class="o-card__img-wrap">

                                            <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></div>
                                        <div class="o-card__info-wrap">

                                            <span class="o-card__name">

                                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>

                                            <span class="o-card__quantity">Quantity x 1</span>

                                            <span class="o-card__price">$150.00</span></div>
                                    </div>

                                    <a class="o-card__del far fa-trash-alt"></a>
                                </div>
                                <div class="o-card">
                                    <div class="o-card__flex">
                                        <div class="o-card__img-wrap">

                                            <img class="u-img-fluid" src="images/product/electronic/product18.jpg" alt=""></div>
                                        <div class="o-card__info-wrap">

                                            <span class="o-card__name">

                                                <a href="product-detail.html">Nikon DSLR Camera 4k</a></span>

                                            <span class="o-card__quantity">Quantity x 1</span>

                                            <span class="o-card__price">$150.00</span></div>
                                    </div>

                                    <a class="o-card__del far fa-trash-alt"></a>
                                </div>
                                <div class="o-card">
                                    <div class="o-card__flex">
                                        <div class="o-card__img-wrap">

                                            <img class="u-img-fluid" src="images/product/women/product8.jpg" alt=""></div>
                                        <div class="o-card__info-wrap">

                                            <span class="o-card__name">

                                                <a href="product-detail.html">New Dress D Nice Elegant</a></span>

                                            <span class="o-card__quantity">Quantity x 1</span>

                                            <span class="o-card__price">$150.00</span></div>
                                    </div>

                                    <a class="o-card__del far fa-trash-alt"></a>
                                </div>
                                <div class="o-card">
                                    <div class="o-card__flex">
                                        <div class="o-card__img-wrap">

                                            <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></div>
                                        <div class="o-card__info-wrap">

                                            <span class="o-card__name">

                                                <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

                                            <span class="o-card__quantity">Quantity x 1</span>

                                            <span class="o-card__price">$150.00</span></div>
                                    </div>

                                    <a class="o-card__del far fa-trash-alt"></a>
                                </div>
                            </div>
                        </div>
                        <div class="o-summary__section u-s-m-b-30">
                            <div class="o-summary__box">
                                <h1 class="checkout-f__h1">SHIPPING & BILLING</h1>
                                <div class="ship-b">

                                    <span class="ship-b__text">Ship to:</span>
                                    <div class="ship-b__box u-s-m-b-10">
                                        <p class="ship-b__p">4247 Ashford Drive Virginia VA-20006 USA (+0) 900901904</p>

                                        <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                    </div>
                                    <div class="ship-b__box">

                                        <span class="ship-b__text">Bill to default billing address</span>

                                        <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="o-summary__section u-s-m-b-30">
                            <div class="o-summary__box">
                                <table class="o-summary__table">
                                    <tbody>
                                        <tr>
                                            <td>SHIPPING</td>
                                            <td>$4.00</td>
                                        </tr>
                                        <tr>
                                            <td>TAX</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>SUBTOTAL</td>
                                            <td>$379.00</td>
                                        </tr>
                                        <tr>
                                            <td>GRAND TOTAL</td>
                                            <td>$379.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="o-summary__section u-s-m-b-30">
                            <div class="o-summary__box">
                                <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                <form class="checkout-f__payment">
                                    <div class="u-s-m-b-10">

                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">

                                            <input type="radio" id="cash-on-delivery" name="payment">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label></div>
                                        </div>
                                        <!--====== End - Radio Box ======-->

                                        <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                    </div>
                                    <div class="u-s-m-b-10">

                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">

                                            <input type="radio" id="direct-bank-transfer" name="payment">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label></div>
                                        </div>
                                        <!--====== End - Radio Box ======-->

                                        <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                                    </div>
                                    <div class="u-s-m-b-10">

                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">

                                            <input type="radio" id="pay-with-check" name="payment">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="pay-with-check">Pay With Check</label></div>
                                        </div>
                                        <!--====== End - Radio Box ======-->

                                        <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                    </div>
                                    <div class="u-s-m-b-10">

                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">

                                            <input type="radio" id="pay-with-card" name="payment">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label></div>
                                        </div>
                                        <!--====== End - Radio Box ======-->

                                        <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                                    </div>
                                    <div class="u-s-m-b-10">

                                        <!--====== Radio Box ======-->
                                        <div class="radio-box">

                                            <input type="radio" id="pay-pal" name="payment">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
                                        </div>
                                        <!--====== End - Radio Box ======-->

                                        <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="term-and-condition">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <a class="gl-link">Terms of Service.</a>
                                    </div>
                                    <div>

                                        <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Order Summary ======-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->

{% endblock %}
