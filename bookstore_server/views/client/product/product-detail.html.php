{% extends client/master_general.html.php %}

{% block title %} NTH Book Store {% endblock %}

{% block content %}

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <!--====== Product Breadcrumb ======-->
                    <div class="pd-breadcrumb u-s-m-b-30">
                        <ul class="pd-breadcrumb__list">
                            <li class="has-separator">

                                <a href="/">Home</a></li>
                            <li class="has-separator ">

                                <a  href="/product/category?id=<?=$product->category_id?>"><?= $product->get_category_name() ?></a></li>

                            <li>

                               <a> <?= $product->name ?></a></li>
                           
                        </ul>
                    </div>
                    <!--====== End - Product Breadcrumb ======-->


                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div class="pd-o-img-wrap" data-src="<?= $product->get_media_path() == null ? '/uploads/macdinh.png' : $product->get_media_path() ?>">

                                    <img class="u-img-fluid" src="<?= $product->get_media_path() == null ? '/uploads/macdinh.png' : $product->get_media_path() ?>" data-zoom-image="<?= $product->get_media_path() == null ? '/uploads/macdinh.png' : $product->get_media_path() ?>" alt=""></div>
                                
                            </div>

                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    <div>

                                        <img class="u-img-fluid" src="<?= $product->get_media_path() == null ? '/uploads/macdinh.png' : $product->get_media_path() ?>" alt=""></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">

                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div>
                            <span class="pd-detail__preview-desc">T??c gi???: <a href="/product/author?id=<?=$product->author_id?>" style="color: blue"><?= $product->get_author_name() ?></a> </span>
                            <span class="pd-detail__name"><?= $product->name ?></span></div>
                        <div>
                            <div class="pd-detail__inline">

                                <span class="pd-detail__price"><?= $product->sale_price ?>??</span>

                        </div>
                       
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__stock"><?= $product->quantity ?> c?? s???n</span>

                                <span class="pd-detail__left">2 ???? b??n</span></div>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__preview-desc"><?= $product->description ?></span></div>
                       
                        
                        <div class="u-s-m-b-15">
                            <ul class="pd-social-list">
                                <li>

                                    <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li>

                                    <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li>

                                    <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                <li>

                                    <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                <li>

                                    <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form" action="/cart/add" method="post">
                            <input name="product_id"  type="hidden" value="<?= $product->id ?>">

                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">

                                        <!--====== Input Counter ======-->
                                        <div class="input-counter">
                                            <span class="input-counter__minus fas fa-minus"></span>

                                            <input name="quantity" class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                            <span class="input-counter__plus fas fa-plus"></span></div>
                                        <!--====== End - Input Counter ======-->
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button href="" class="btn btn--e-brand-b-2" type="submit">Th??m v??o gi??? h??ng</button></div>
                                </div>
                            </form>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__label u-s-m-b-8">Ch??nh s??ch mua h??ng:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>B???o v??? ng?????i mua.</span></li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Ho??n tr??? ?????y ????? n???u b???n kh??ng nh???n ???????c ????n ?????t h??ng c???a m??nh.</span></li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Tr??? h??ng ???????c ch???p nh???n n???u s???n ph???m kh??ng nh?? m?? t???.</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    
    <!--====== End - Product Detail Tab ======-->
    <div class="u-s-p-b-90">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">S??CH LI??N QUAN</h1>

                            <span class="section__span u-c-grey">CH???N TH??M S??CH G???I ??</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="slider-fouc">
                    <div class="owl-carousel product-slider" data-item="4">
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product1.jpg" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">Beats Bomb Wireless Headphone</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                    <span class="product-o__review">(20)</span></div>

                                <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product2.jpg" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">Red Wireless Headphone</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                    <span class="product-o__review">(20)</span></div>

                                <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product3.jpg" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">Yellow Wireless Headphone</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                    <span class="product-o__review">(20)</span></div>

                                <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product23.jpg" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">Razor Gear Ultra Slim 8GB Ram</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                    <span class="product-o__review">(20)</span></div>

                                <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product26.jpg" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">Razor Gear Ultra Slim 12GB Ram</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                    <span class="product-o__review">(20)</span></div>

                                <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="images/product/electronic/product30.jpg" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">Razor Gear Ultra Slim 16GB Ram</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                    <span class="product-o__review">(20)</span></div>

                                <span class="product-o__price">$125.00

                                            <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->
</div>
{% endblock %}
