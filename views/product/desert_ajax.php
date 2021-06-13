
    
                <div class="products__content">
                    <div class="products__cards product-container">
                        <?php foreach ($products as $product) : ?>
                        <?php $image = $product->getImage(); ?>

                        <div class="products__card filling-card">
                            <div class="products__card-pic-wrapper">
                                <img src="<?php echo $image->getUrl();?>" alt="<?php echo $product->name; ?>" class="products__card-pic">
                                <div class="products__card-active">
                                    <h3 class="producrs__card-desc-title"><?php echo $product->name; ?></h3>

                                    <p class="products__card-desc-content product-filling-desc">
                                        <?php echo $product->description; ?>
                                    </p>

                                </div>
                                </div>
                                <p class="products__card-name product-filling-name">
                                    <?php echo $product->name; ?>
                                </p>
                                <div class="products__card-info product-filling">
                                    <span class="products__card-price"><?php echo $product->price; ?> грн</span>
                                
                            </div>
                            <span class="products__cake-choose desert-order" data-id="<?php echo $product->id;?>">
                                    
                                        Обрати
                                    
                                </span>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>


