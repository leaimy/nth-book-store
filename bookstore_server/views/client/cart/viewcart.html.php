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

                            <a href="/">Trang chủ</a>
                        </li>
                        <li class="is-marked">

                            <a href="cart/viewcart">Xem giỏ hàng</a>
                        </li>
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
                        <h1 class="section__heading u-c-secondary">GIỎ HÀNG</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
        <form action="/cart/update" method="POST">
            <div class="row">
            
                <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                    <div class="table-responsive">
                        <table class="table-p">
                            <tbody>
                               
                                <?php foreach ($cart_products as $item) : ?>
                                    
                                    <!--====== Row ======-->
                                    <tr id="cart-p-<?= $item->id?>">
                                        
                                        <td>
                                        <input type="hidden" name="product_ids[]" value="<?= $item->id ?>">

                                            <div class="table-p__box">
                                                <div class="table-p__img-wrap">

                                                    <img class="u-img-fluid" src="<?= $item->get_media_path() == null ? '/uploads/macdinh.png' : $item->get_media_path() ?>" alt="">
                                                </div>
                                                <div class="table-p__info">

                                                    <span class="table-p__name">

                                                        <a href="product-detail.html"><?= $item->name ?></a></span>

                                                    <span class="table-p__category">

                                                        <a href="shop-side-version-2.html"><?= $item->get_category_name() ?></a></span>
                                                    <span class="table-p__category">

                                                        <a href="shop-side-version-2.html"><?= $item->get_author_name() ?></a></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <span class="table-p__price"><?= $item->sale_price ?>VND</span>
                                        </td>
                                        <td>
                                            <div class="table-p__input-counter-wrap">

                                                <!--====== Input Counter ======-->
                                                <div class="input-counter">

                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                    <input name="product_quantities[]" class="input-counter__text input-counter--text-primary-style" type="text" value="<?= $item->cart_quantity?>" data-min="1" data-max="1000">

                                                    <span class="input-counter__plus fas fa-plus"></span>
                                                </div>
                                                <!--====== End - Input Counter ======-->
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-p__del-wrap">

                                                <a data-id="<?= $item->id?>" id="submit-delete-<?= $item->id?>" class="far fa-trash-alt table-p__delete-link"></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--====== End - Row ======-->

                                <?php endforeach; ?>
                               
                               

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="route-box">
                        <div class="route-box__g1">

                            <a class="route-box__link" href="/product/product-all"><i class="fas fa-long-arrow-alt-left"></i>

                                <span>TIẾP TỤC MUA SÁCH</span></a>
                        </div>
                        <div class="route-box__g2">

                            <a class="route-box__link" href="/cart/delete-all"><i class="fas fa-trash"></i>

                                <span>XOÁ TẤT CẢ</span></a>

                            <button type="submit" class="route-box__link" href="/cart/update"><i class="fas fa-sync"></i>

                                <span>CẬP NHẬT GIỎ HÀNG</span></button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                    <form class="f-cart">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 u-s-m-b-30"></div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="f-cart__pad-box">
                                    <div class="u-s-m-b-30">
                                        <table class="f-cart__table">
                                            <tbody>
                                                <tr>
                                                    <td>PHÍ VẬN CHUYỂN</td>
                                                    <td>0VND</td>
                                                </tr>
                                                <tr>
                                                    <td>TỔNG</td>
                                                    <td  id="total"><?= $total ?>VND</td>
                                                </tr>
                                                <tr>
                                                    <td>THÀNH TIỀN</td>
                                                    <td><?= $total ?>VND</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>

                                        <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->

{% endblock %}
