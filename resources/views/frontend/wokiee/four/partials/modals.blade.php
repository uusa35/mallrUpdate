<a href="#" class="tt-back-to-top">{{ trans('general.back_to_top') }}</a>
<!-- modal (AddToCartProduct) -->
{{--<div class="modal  fade"  id="modalAddToCartProduct" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog">--}}
{{--<div class="modal-content ">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<div class="tt-modal-addtocart mobile">--}}
{{--<div class="tt-modal-messages">--}}
{{--<i class="icon-f-68"></i> Added to cart successfully!--}}
{{--</div>--}}
{{--<a href="#" class="btn-link btn-close-popup">CONTINUE SHOPPING</a>--}}
{{--<a href="shopping_cart_02.html" class="btn-link">VIEW CART</a>--}}
{{--<a href="page404.html" class="btn-link">PROCEED TO CHECKOUT</a>--}}
{{--</div>--}}
{{--<div class="tt-modal-addtocart desctope">--}}
{{--<div class="row">--}}
{{--<div class="col-12 col-lg-6">--}}
{{--<div class="tt-modal-messages">--}}
{{--<i class="icon-f-68"></i> Added to cart successfully!--}}
{{--</div>--}}
{{--<div class="tt-modal-product">--}}
{{--<div class="tt-img">--}}
{{--<img src="images/loader.svg" data-src="images/product/product-01.jpg" alt="">--}}
{{--</div>--}}
{{--<h2 class="tt-title"><a href="product.html">Flared Shift Dress</a></h2>--}}
{{--<div class="tt-qty">--}}
{{--QTY: <span>1</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="tt-product-total">--}}
{{--<div class="tt-total">--}}
{{--TOTAL: <span class="tt-price">$324</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-12 col-lg-6">--}}
{{--<a href="#" class="tt-cart-total">--}}
{{--There are 1 items in your cart--}}
{{--<div class="tt-total">--}}
{{--TOTAL: <span class="tt-price">$324</span>--}}
{{--</div>--}}
{{--</a>--}}
{{--<a href="#" class="btn btn-border btn-close-popup">CONTINUE SHOPPING</a>--}}
{{--<a href="shopping_cart_02.html" class="btn btn-border">VIEW CART</a>--}}
{{--<a href="#" class="btn">PROCEED TO CHECKOUT</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<!-- modal (quickViewModal) -->
<div class="modal  fade" id="ModalquickView" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-quickview desctope">
                    <div class="row">
                        <div class="col-12 col-md-5 col-lg-6">
                            <div class="tt-mobile-product-slider arrow-location-center">
                                <div><img id="element-image" src="" data-src="" alt=""></div>
                                {{--<div><img src="images/loader.svg" data-src="images/product/product-01-02.jpg" alt=""></div>--}}
                                {{--<div><img src="images/loader.svg" data-src="images/product/product-01-03.jpg" alt=""></div>--}}
                                {{--<div><img src="images/loader.svg" data-src="images/product/product-01-04.jpg" alt=""></div>--}}
                                {{--<div>--}}
                                {{--<div class="tt-video-block">--}}
                                {{--<a href="#" class="link-video"></a>--}}
                                {{--<video class="movie" src="video/video.mp4" poster="video/video_img.jpg"></video>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-6">
                            <div class="tt-product-single-info">
                                <div class="tt-add-info border-bottom">
                                    <ul>
                                        <li><span><i class="icon-f-02 fa fa-fw fa-lg"></i>{{ trans('general.sku') }}: <span id="element-sku"></span></span></li>
                                        <li><span><i class="fa fa-fw fa-lg icon-e-74"></i>{{ trans('general.availability') }}:</span> <span id="element-qty"></span></li>
                                    </ul>
                                </div>
                                <h2 class="tt-title">
                                    <div id="element-name"></div>
                                </h2>
                                <div class="tt-price border-bottom" style="margin-top: 20px; margin-bottom: 20px;">
                                    <span class="new-price">
                                        <span id="element-price"></span>
                                        <span id="element-currency-name"></span>
                                    </span>
                                </div>
                                <div class="tt-wrapper">
                                    <h2 class="tt-title border-bottom" style="margin-bottom: 10px;">
                                        {{ trans('general.description') }}
                                    </h2>
                                    <div id="element-description"></div>
                                    <div id="element-notes"></div>
                                    <hr>
                                    <div id="element-colors"></div>
                                    <div id="element-sizes"></div>
                                </div>
                                {{--<div class="tt-swatches-container">--}}
                                {{--<div class="tt-wrapper">--}}
                                {{--<div class="tt-title-options">SIZE</div>--}}
                                {{--<form class="form-default">--}}
                                {{--<div class="form-group">--}}
                                {{--<select class="form-control">--}}
                                {{--<option>21</option>--}}
                                {{--<option>25</option>--}}
                                {{--<option>36</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}
                                {{--</form>--}}
                                {{--</div>--}}
                                {{--<div class="tt-wrapper">--}}
                                {{--<div class="tt-title-options">COLOR</div>--}}
                                {{--<form class="form-default">--}}
                                {{--<div class="form-group">--}}
                                {{--<select class="form-control">--}}
                                {{--<option>Red</option>--}}
                                {{--<option>Green</option>--}}
                                {{--<option>Brown</option>--}}
                                {{--</select>--}}
                                {{--</div>--}}
                                {{--</form>--}}
                                {{--</div>--}}
                                {{--<div class="tt-wrapper">--}}
                                {{--<div class="tt-title-options">TEXTURE:</div>--}}
                                {{--<ul class="tt-options-swatch options-large">--}}
                                {{--<li><a class="options-color" href="#">--}}
                                {{--<span class="swatch-img">--}}
                                {{--<img src="images/loader.svg" data-src="images/custom/texture-img-01.jpg" alt="">--}}
                                {{--</span>--}}
                                {{--<span class="swatch-label color-black"></span>--}}
                                {{--</a></li>--}}
                                {{--<li class="active"><a class="options-color" href="#">--}}
                                {{--<span class="swatch-img">--}}
                                {{--<img src="images/loader.svg" data-src="images/custom/texture-img-02.jpg" alt="">--}}
                                {{--</span>--}}
                                {{--<span class="swatch-label color-black"></span>--}}
                                {{--</a></li>--}}
                                {{--<li><a class="options-color" href="#">--}}
                                {{--<span class="swatch-img">--}}
                                {{--<img src="images/loader.svg" data-src="images/custom/texture-img-03.jpg" alt="">--}}
                                {{--</span>--}}
                                {{--<span class="swatch-label color-black"></span>--}}
                                {{--</a></li>--}}
                                {{--<li><a class="options-color" href="#">--}}
                                {{--<span class="swatch-img">--}}
                                {{--<img src="images/loader.svg" data-src="images/custom/texture-img-04.jpg" alt="">--}}
                                {{--</span>--}}
                                {{--<span class="swatch-label color-black"></span>--}}
                                {{--</a></li>--}}
                                {{--<li><a class="options-color" href="#">--}}
                                {{--<span class="swatch-img">--}}
                                {{--<img src="images/loader.svg" data-src="images/custom/texture-img-05.jpg" alt="">--}}
                                {{--</span>--}}
                                {{--<span class="swatch-label color-black"></span>--}}
                                {{--</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="tt-wrapper">
                                    <div class="tt-row-custom-01">
                                        {{--<div class="col-item">--}}
                                        {{--<div class="tt-input-counter style-01">--}}
                                        {{--<span class="minus-btn"></span>--}}
                                        {{--<input type="text" value="1" size="5">--}}
                                        {{--<span class="plus-btn"></span>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="col-item">
                                            <a id="element-url" href="#" class="btn btn-lg"><i
                                                        class="fa fa-fw fa-eye fa-lg"></i>{{ trans('general.view_details') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal (ModalSubsribeGood) -->
<div class="modal  fade" id="ModalSubsribeGood" tabindex="-1" role="dialog" aria-label="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="icon icon-clear"></span></button>
            </div>
            <div class="modal-body">
                <div class="tt-modal-subsribe-good">
                    <i class="icon-f-68"></i> You have successfully signed!
                </div>
            </div>
        </div>
    </div>
</div>
