<section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save more with coupons & up to 70% off!</p>
    <button>Shop Now</button>
</section>
<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="./Assets/images/features/f1.png" alt="Feature" />
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="./Assets/images/features/f2.png" alt="Feature" />
        <h6>Online Order</h6>
    </div>
    <div class="fe-box">
        <img src="./Assets/images/features/f3.png" alt="Feature" />
        <h6>Save Money</h6>
    </div>
    <div class="fe-box">
        <img src="./Assets/images/features/f4.png" alt="Feature" />
        <h6>Promotions</h6>
    </div>
    <div class="fe-box">
        <img src="./Assets/images/features/f5.png" alt="Feature" />
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="./Assets/images/features/f6.png" alt="Feature" />
        <h6>F24/7 Support</h6>
    </div>
</section>
<section id="product1" class="section-p1">
    <h2>Featuree Products</h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
        <?php
        $pro = new product();
        $result = $pro->getProductNew();
        while ($set = $result->fetch()) {
        ?>
            <div class="pro" onclick="window.location.href='index.php?action=product&act=detail&id=<?php echo $set['id'] ?>'">
                <img src="./Assets/images/products/<?php echo $set['image'] ?>" alt="Products" />
                <div class="des">
                    <span><?php echo $set['brand'] ?></span>
                    <h5><?php echo $set['name'] ?></h5>
                    <div class="star">
                        <?php for ($i = 0; $i < $set['rating']; $i++) { ?>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        <?php } ?>
                    </div>
                    <h4>$<?php echo number_format($set['price'], 2) ?></h4>
                </div>
                <a href="#" aria-label="cart"><i class="fa fa-shopping-cart" id="cart" aria-hidden="true"></i></a>
            </div>
        <?php } ?>
    </div>
</section>
<section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span>70% Off</span> - All T-Shirt $ Accessories</h2>
    <button class="normal">Explore More</button>
</section>
<section id="sm-banner" class="section-p1">
    <div class="banner-box">
        <h4>Crazy deals</h4>
        <h2>Buy 1 get 1 free</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Learn More</button>
    </div>
    <div class="banner-box banner-box2">
        <h4>Spring/Summer</h4>
        <h2>Upcomming season</h2>
        <span>The best classic dress is on sale at cara</span>
        <button class="white">Collection</button>
    </div>
</section>
<section id="banner3">
    <div class="banner-box">
        <h2>SEASONAL SALE</h2>
        <h3>Winter Collection -50% OFF</h3>
    </div>
    <div class="banner-box banner-box2">
        <h2>NEW FOOTWEAR COLLECTION</h2>
        <h3>Spring/Summer 2022</h3>
    </div>
    <div class="banner-box banner-box3">
        <h2>T-Shirt</h2>
        <h3>New Trendy Prints</h3>
    </div>
</section>
<section id="newsletter" class="section-p1">
    <div class="newstext">
        <h4>Sign Up For Newletters</h4>
        <p>
            Get E-mail updates about our lastest shop and
            <span>special offers</span>
        </p>
    </div>
    <div class="form">
        <input type="text" name="" id="" placeholder="Your email address" />
        <button class="normal">Sign Up</button>
    </div>
</section>