{% extends client/master_home.html.php %}

{% block title %} NTH Book Store {% endblock %}

{% block content %}
<!--====== Primary Slider ======-->
<div class="s-skeleton s-skeleton--h-640 s-skeleton--bg-grey">
    <div class="owl-carousel primary-style-3" id="hero-slider">
        <div class="hero-slide hero-slide--7" style='background-image: url("/static/anh/slide1.jpg")'>
            <div class="primary-style-3-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-white">Update Your Fashion</span>

                                <span class="content-span-2 u-c-white">10% Discount on Outwear</span>

                                <span class="content-span-3 u-c-white">Find outwear on best prices</span>

                                <span class="content-span-4 u-c-white">Starting At

                                                <span class="u-c-brand">$100.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide hero-slide--8" style='background-image: url("/static/anh/slide2.jpg")'>
            <div class="primary-style-3-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-white">Open Your Eyes</span>

                                <span class="content-span-2 u-c-white">10% Off On Intimates</span>

                                <span class="content-span-3 u-c-white">Find intimates on best prices</span>

                                <span class="content-span-4 u-c-white">Starting At

                                                <span class="u-c-brand">$100.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slide hero-slide--9" style='background-image: url("/static/anh/slide3.jpg")'>
            <div class="primary-style-3-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-white">Find Top Brands</span>

                                <span class="content-span-2 u-c-white">10% Off On Outwear</span>

                                <span class="content-span-3 u-c-white">Find outwear on best prices</span>

                                <span class="content-span-4 u-c-white">Starting At

                                                <span class="u-c-brand">$100.00</span></span>

                                <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html">SHOP NOW</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Primary Slider ======-->

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                    <div class="promotion-o">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img" src="/static/anh/c1.jpg" alt=""></div>
                        <div class="promotion-o__content">

                            <a class="promotion-o__link btn--e-white-brand" href="/product/category?id=6">Kỹ năng sống</a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                    <div class="promotion-o">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img" src="/static/anh/c2.jpg" alt=""></div>
                        <div class="promotion-o__content">

                            <a class="promotion-o__link btn--e-white-brand" href="/product/category?id=8">Kiến thức tổng hợp</a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                    <div class="promotion-o">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img" src="/static/anh/c3.jpg" alt=""></div>
                        <div class="promotion-o__content">

                            <a class="promotion-o__link btn--e-white-brand" href="/product/category?id=9">Văn học</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">

                            <div class="aspect aspect--bg-grey-fb aspect--square">

                                <img class="aspect__img i3-banner__img" src="/static/anh/900.jpg" alt=""></div>
                            <div class="promotion-o__content">

                                <a class="promotion-o__link btn--e-white-brand" href="/product/category?id=4">Chính trị - Pháp luật</a></div>
                        </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <?php foreach ($product2 as $item):?>
                            <div class="col-lg-6 col-md-6 col-sm-6 u-s-m-b-30">
                                <div class="product-short u-h-100">
                                    <div class="product-short__container">
                                        <div class="product-short__img-wrap">

                                            <a class="aspect aspect--bg-grey-fb aspect--square u-d-block" href="/product/product-detail?id=<?=$item->id?>">

                                                <img class="aspect__img product-short__img" src="<?= $item->get_media_path() == null ? '/uploads/macdinh.png' : $item->get_media_path() ?>" alt=""></a></div>
                                        <div class="product-short__info">

                                            <span class="product-short__price"><?= $item->sale_price ?>đ</span>

                                            <span class="product-short__name">

                                                            <a href="/product/product-detail?id=<?=$item->id?>"><?= $item->name ?></a></span>

                                            <span class="product-short__category">

                                                            <a href="/product/category?id=<?=$item->category_id?>"><?= $item->get_category_name()?></a></span></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="col-lg-12">

                                
                                    <div class="aspect aspect--bg-grey-fb aspect--1048-334">

                                        <img class="aspect__img i3-banner__img" src="/static/anh/1048.jpg" alt=""></div>
                                    <div class="promotion-o__content">

                                        <a class="promotion-o__link btn--e-white-brand" href="/product/category?id=1">Thiếu nhi</a></div>               

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

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">SÁCH MỚI</h1>

                        <span class="section__span u-c-silver">SÁCH MỚI ĐƯỢC NHẬP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <?php foreach ($product8 as $item): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                    <div class="product-r u-h-100">
                        <div class="product-r__container">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="/product/product-detail?id=<?=$item->id?>">

                                <img class="aspect__img" src="<?= $item->get_media_path() == null ? '/uploads/macdinh.png' : $item->get_media_path() ?>" alt=""></a>
                            <div class="product-r__action-wrap">
                                <ul class="product-r__action-list">
                                    <li>

                                        <a data-modal="modal" data-modal-id="#quick-look"><i class="fas fa-search-plus"></i></a></li>
                                    <li>

                                        <a data-modal="modal" data-modal-id="#add-to-cart"><i class="fas fa-plus-circle"></i></a></li>
                                    <li>

                                        <a href="signin.html"><i class="fas fa-heart"></i></a></li>
                                    <li>

                                        <a href="signin.html"><i class="fas fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-r__info-wrap">

                                        <span class="product-r__category">

                                            <a href="/product/category?id=<?=$item->category_id?>"><?=$item->get_category_name()?></a></span>
                            <div class="product-r__n-p-wrap">

                                            <span class="product-r__name">

                                                <a href="/product/product-detail?id=<?=$item->id?>"><?=$item->name?></a></span>

                                <span class="product-r__price"><?=$item->sale_price?>đ</span></div>

                            <span class="product-r__description"><?=substr($item->description,0,50)?>...</span>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
               
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->


<!--====== Section 4 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-16">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">SÁCH BÁN CHẠY NHẤT</h1>

                        <span class="section__span u-c-silver u-s-m-b-16">THEO THỂ LOẠI</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-category-container">
                        <div class="filter__category-wrapper">

                            <button class="btn filter__btn filter__btn--style-2 js-checked" type="button" data-filter="*">TẤT CẢ</button></div>

                        <?php $products = []; ?>
                        <?php foreach ($category_random as $item): ?>
                        <?php $t = $product_model->random_product_by_category($item->id,4); $products = array_merge($products, $t) ?>
                        <div class="filter__category-wrapper">

                            <button class="btn filter__btn filter__btn--style-2" type="button" data-filter=".<?=$item->id?>"><?=mb_strtoupper($item->name)?></button></div>
                        <?php endforeach; ?>
                        
                    </div>
                    <div class="filter__grid-wrapper u-s-m-t-30">
                        <div class="row">
                            <?php foreach ($products as $item): ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item <?=$item->category_id ?>">
                                <div class="product-bs">
                                    <div class="product-bs__container">
                                        <div class="product-bs__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="/product/product-detail?id=<?=$item->id?>">

                                                <img class="aspect__img" src="<?= $item->get_media_path() == null ? '/uploads/macdinh.png' : $item->get_media_path() ?>" alt=""></a>
                                            <div class="product-bs__action-wrap">
                                                <ul class="product-bs__action-list">
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#quick-look"><i class="fas fa-search-plus"></i></a></li>
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart"><i class="fas fa-plus-circle"></i></a></li>
                                                    <li>

                                                        <a href="signin.html"><i class="fas fa-heart"></i></a></li>
                                                    <li>

                                                        <a href="signin.html"><i class="fas fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-bs__category">

                                                        <a href="/product/category?id=<?=$item->category_id?>"><?= $item->get_category_name() ?></a></span>

                                        <span class="product-bs__name">

                                                        <a href="/product/product-detail?id=<?=$item->id?>"><?= $item->name ?></a></span>
                                       

                                        <span class="product-r__price"><?= $item->sale_price?>đ </span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                           
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 4 ======-->


<!--====== Section 5 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">TÁC GIẢ NỔI BẬT</h1>
<?php if(count($author_random)>0):?>
                        <span class="section__span u-c-silver"><?=mb_strtoupper($author_random[0]->name)?></span>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                
                <?php foreach ($product_author as $item): ;?>
                <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                    <div class="product-short u-h-100">
                        <div class="product-short__container">
                            <div class="product-short__img-wrap">

                                <a class="aspect aspect--bg-grey-fb aspect--square u-d-block" href="/product/product-detail?id=<?=$item->id?>">

                                    <img class="aspect__img product-short__img" src="<?= $item->get_media_path() == null ? '/uploads/macdinh.png' : $item->get_media_path() ?>" alt=""></a></div>
                            <div class="product-short__info">

                                <span class="product-short__price"><?=$item->sale_price?>đ</span>

                                <span class="product-short__name">

                                                <a href="/product/product-detail?id=<?=$item->id?>"><?=$item->name?></a></span>

                                <span class="product-short__category">

                                                <a href="/product/category?id=<?=$item->category_id?>"><?=$item->get_category_name()?></a></span></div>
                        </div>
                    </div>
                </div>
             <?php endforeach;?>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 5 ======-->


<!--====== Section 6 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="column-product">

                        <span class="column-product__title u-c-secondary u-s-m-b-25">SPECIAL PRODUCTS</span>
                        <ul class="column-product__list">
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/men/product9.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Men Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Fashion A Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00</span></div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/men/product10.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Men Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Fashion B Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00</span></div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product9.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Dress A Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="column-product">

                        <span class="column-product__title u-c-secondary u-s-m-b-25">WEEKLY PRODUCTS</span>
                        <ul class="column-product__list">
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product10.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Dress B Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00

                                                        <span class="product-l__discount">$160</span></span></div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product11.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Dress C Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00

                                                        <span class="product-l__discount">$160</span></span></div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product12.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">

                                                    <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Dress D Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00

                                                        <span class="product-l__discount">$160</span></span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="column-product">

                        <span class="column-product__title u-c-secondary u-s-m-b-25">FLASH PRODUCTS</span>
                        <ul class="column-product__list">
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product13.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">
                                        <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>

                                        <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">New Dress E Nice Elegant</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product1.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">
                                        <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>

                                        <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">Women intimate Bra</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="product-detail.html">

                                            <img class="aspect__img" src="/static/images/product/women/product2.jpg" alt=""></a></div>
                                    <div class="product-l__info-wrap">
                                        <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>

                                        <span class="product-l__category">

                                                        <a href="shop-side-version-2.html">Women Clothing</a></span>

                                        <span class="product-l__name">

                                                        <a href="product-detail.html">Women Wedding Event Dress</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 6 ======-->


<!--====== Section 7 ======-->

<!--====== End - Section 7 ======-->

{% endblock %}
