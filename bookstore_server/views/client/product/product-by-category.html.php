{% extends client/master_general.html.php %}

{% block title %} NTH Book Store {% endblock %}

{% block content %}
<!--====== Section 1 ======-->
<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-p">
                    <div class="shop-p__toolbar u-s-m-b-30">
                        
                        <div class="shop-p__tool-style">
                            <div class="tool-style__group u-s-m-b-8">

                                <span class="js-shop-grid-target is-active">Grid</span>

                                <span class="js-shop-list-target">List</span></div>
                            <form>
                                <div class="tool-style__form-wrap">
                                    <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                            <option>Show: 8</option>
                                            <option selected>Show: 12</option>
                                            <option>Show: 16</option>
                                            <option>Show: 28</option>
                                        </select></div>
                                    <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                            <option selected>Sort By: Newest Items</option>
                                            <option>Sort By: Latest Items</option>
                                            <option>Sort By: Best Selling</option>
                                            <option>Sort By: Best Rating</option>
                                            <option>Sort By: Lowest Price</option>
                                            <option>Sort By: Highest Price</option>
                                        </select></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="shop-p__collection">
                        <div class="row is-grid-active">
                            <?php foreach ($product_by_category as $product): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-m">
                                    <div class="product-m__thumb">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="/product/product-detail?id=<?=$product->id?>">

                                            <img class="aspect__img" src="<?= $product->get_media_path() == null ? '/uploads/macdinh.png' : $product->get_media_path() ?>" alt=""></a>
                                        <div class="product-m__quick-look">

                                            <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                        <div class="product-m__add-cart">

                                            <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart">Thêm vào giỏ hàng</a></div>
                                    </div>
                                    <div class="product-m__content">
                                        <div class="product-m__category">

                                            <a href="/product/category?id=<?=$product->category_id?>"><?= $product->get_category_name() ?></a></div>
                                        <div class="product-m__name">

                                            <a href="/product/product-detail?id=<?=$product->id?>"><?= $product->name ?></a></div>
                                       
                                        <div class="product-m__price"><?= $product->sale_price ?>đ</div>
                                        <div class="product-m__hover">
                                            <div class="product-m__preview-description">

                                                <span><?=substr($product->description,0,500)?>...</span></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                           
                        </div>
                    </div>
                    <div class="u-s-p-y-60">

                        <!--====== Pagination ======-->
                        <ul class="shop-p__pagination">
                            <li class="is-active">

                                <a href="shop-grid-full.html">1</a></li>
                            <li>

                                <a href="shop-grid-full.html">2</a></li>
                            <li>

                                <a href="shop-grid-full.html">3</a></li>
                            <li>

                                <a href="shop-grid-full.html">4</a></li>
                            <li>

                                <a class="fas fa-angle-right" href="shop-grid-full.html"></a></li>
                        </ul>
                        <!--====== End - Pagination ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->

{% endblock %}
