<section id="page-header">
    <h2>#stayhome</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>
<section>
    <section id="product1" class="section-p1">
        <div class="container">
            <form action="index.php?action=product" method="post">
                <div class="row">
                    <div class="col-3">
                        <label for="sort_by_price">
                            Sort By
                        </label>
                        <select name="option" id="sort_by_price" class="form-control">
                            <option value="" selected></option>
                            <option value="asc">Price: Low to High</option>
                            <option value="desc">Price: High to Low</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="sort_by_category">
                            Category
                        </label>
                        <select name="category_id" id="sort_by_category" class="form-control">
                            <option value="" selected></option>
                            <?php
                            $cat = new category();
                            $result = $cat->getAllCategory();
                            while ($set = $result->fetch()) {
                            ?>
                            <option value="<?php echo $set['id'] ?>"><?php echo $set['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="options">Options</label>
                        <select name="" id="options" class="form-control">
                            <option value="">Value</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="search_input">Search</label>
                        <input type="text" class="form-control" name="search_input" id="search_input">
                    </div>
                </div>
                <div class="col-12 text-center mt-2">
                    <button type="submit" name="submit" class="normal" style="background-color: #088178; color: #fff">Submit</button>
                </div>
            </form>
        </div>
        <div class="pro-container">
            <?php
            $pro = new product();
            if (!isset($option)) $option = '';
            if (!isset($category_id)) $category_id = '';
            if (!isset($search_input)) $search_input = '';
            $result = $pro->getAllProduct($option, $category_id, $search_input);
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
                        <h4>$<?php echo $set['price'] ?>.00</h4>
                    </div>
                    <a href="#" aria-label="cart"><i class="fa fa-shopping-cart" id="cart" aria-hidden="true"></i></a>
                </div>
            <?php } ?>
        </div>
    </section>
    <section id="pagination" class="section-p1">
        <button>First Page</button>
        <button>Prev</button>
        <button>Next</button>
        <button>Last Page</button>
    </section>
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