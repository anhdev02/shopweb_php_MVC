<div class="col-inner" style="padding:0px 0px 0 0px;margin:0px 0px 0 0px;">
                    <div class="gap-element clearfix" style="display:block; height:auto; padding-top:40px"></div>
                    <h2 class="page-subheading">Tất cả các loại bánh</h2>
                    <div class="gap-element clearfix" style="display:block; height:auto; padding-top:24px"></div>
                    <div class="row large-columns-3 medium-columns- small-columns-2 row-small">
                    
                        <?php
                            foreach($data['all_product'] as $value):
                        ?>
                            <div class="col">
                                <div class="col-inner">
                                    <div class="badge-container absolute left top z-1"></div>
                                    <div class="product-small box has-hover box-vertical box-text-middle">
                                        <div class="box-image" style="width:35%;">
                                        <div class="image-zoom image-cover" style="padding-top:100%;"> <a href="<?= URL ?>index.php/frontend/detail/<?= $value['id']?>"> <img width="600" height="600" src="<?= URL ?>asset/frontend/images/<?= $value['image']?>" class="attachment-original size-original" alt=""  sizes="(max-width: 600px) 100vw, 600px"> </a></div>
                                        <div class="image-tools top right show-on-hover"></div>
                                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover"></div>
                                    </div>
                                    <div class="box-text text-left" style="padding:0px 0px 21px 10px;">
                                        <div class="title-wrapper"><p class="name product-title"><a href="<?= URL ?>index.php/frontend/detail/<?= $value['id']?>"><?= $value['product_name']?></a></p></div>
                                        <div class="price-wrapper">
                                            <div class="star-rating" role="img" aria-label="Được xếp hạng 5.00 5 sao"><span style="width:100%">Được xếp hạng <strong class="rating">5.00</strong> 5 sao</span></div>
                                            <span class="price"><span class="woocommerce-Price-amount amount"><?= $value['price']?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                        </div>
                                    <div style="display: inline;" class="add-to-cart-button"><a href="<?= URL ?>index.php/frontend/detail/<?= $value['id']?>" rel="nofollow" data-product_id="276" class="ajax_add_to_cart  product_type_simple button primary is-flat mb-0 is-small">Đọc tiếp</a></div>
                                    <div style="display: inline;" class="add-to-cart-button"><a href="<?= URL ?>index.php/frontend/addToCart/<?= $value['id']?>" rel="nofollow" data-product_id="276" class="ajax_add_to_cart  product_type_simple button primary is-flat mb-0 is-small">Mua hàng</a></div>
                                </div>
                                </div>
                                </div>
                            </div>
                        <?php	endforeach;	?>
                    </div>
                </div>