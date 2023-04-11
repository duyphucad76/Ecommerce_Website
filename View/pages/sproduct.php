<style>
    .btn-circle.btn-xl {
        width: 30px;
        height: 30px;
        border-radius: 35px;
        padding: 10px;
        /* font-size: 10px;
        line-height: 1.33; */
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        border-radius: 35px;
        padding: 10px;
        /* text-align: center;
        font-size: 12px;
        line-height: 1.42857; */
    }
</style>
<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $pro = new product();
    $set = $pro->getProductById($id);
}
?>
<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="./Assets/images/products/<?php echo $set['image'] ?>" width="100%" id="mainImg" alt="" />
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="./Assets/images/products/<?php echo $set['image'] ?>" width="100%" class="small-img" alt="" />
            </div>
            <div class="small-img-col">
                <img src="./Assets/images/products/f5.jpg" width="100%" class="small-img" alt="" />
            </div>
            <div class="small-img-col">
                <img src="./Assets/images/products/f3.jpg" width="100%" class="small-img" alt="" />
            </div>
            <div class="small-img-col">
                <img src="./Assets/images/products/f4.jpg" width="100%" class="small-img" alt="" />
            </div>
        </div>
    </div>
    <div class="single-pro-details">
        <form action="index.php?action=cart" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <h6>Home / T-Shirt</h6>
            <h4><?php echo $set['name'] ?></h4>
            <h2>$<?php echo $set['price'] ?>.00</h2>

            <?php
            $size = new product();
            $result = $size->getTableData('sizes');
            ?>
            <!-- <input type="hidden" name="size" id="size" value="1"> -->
            <select name="size" id="size" title="none">

                <?php
                while ($i = $result->fetch()) {
                ?>
                    <option value="<?php echo $i['size'] ?>"><?php echo $i['size'] ?></option>
                <?php } ?>
            </select>
            <?php
            $color = new product();
            $result = $color->getTableData('colors');
            ?>
            <input type="hidden" name="color" value="Black" id="color">
            <?php
            while ($i = $result->fetch()) :
                echo $i['name']
            ?>
                <button onclick="setColor('<?php echo $i['name'] ?>')" name="color" value="" type="button" class="normal btn-circle btn-xl" style="background-color: <?php echo $i['hex_value'] ?>"></button>
            <?php endwhile ?>
            <br><br>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="10" />
            <!-- <button class="normal" name="" type="button">Add To Cart</button> -->
            <button class="normal" type="submit">Buy Now</button>
        </form>
        <form action="index.php?action=wishlist&act=add_to_wishlist&id=<?php echo $id ?>" method="post">
            <button type="submit" name="submit" class="normal mt-2">Add To Wishlist</button>
        </form>
        <h4>Product Details</h4>
        <span><?php echo $set['detail'] ?></span>
    </div>
</section>
<section class="reviews">
    <div class="container border pb-3">
        <h4 class="m-3">Comment</h4><br>
        <div class="col-12 ml-3 pr-5">
            <?php
            $review = new reviews();
            $result = $review->getAllReviewsByProductId($id);
            while ($rev = $result->fetch()) {
                $user = new user();
                $inf = $user->getUserById($rev['user_id']);
            ?>
                <div class="row">
                    <div class="col-6">
                        <h4><?php echo $inf['name'] ?></h4>
                    </div>
                    <div class="col-6 text-right"><?php echo $rev['created_at'] ?></div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rating</span>
                    </div>
                    <input readonly value="<?php echo $rev['rating'] ?>" name="rating" type="number" min="1" max="5" class="form-control" aria-label="Rating" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Reviews</span>
                    </div>
                    <textarea readonly class="form-control" aria-label="With textarea" name="comment"><?php echo $rev['comment'] ?></textarea>
                </div>
                <br>
            <?php } ?>
        </div>
        <hr>
        <form action="index.php?action=user&act=reviews" method="post">
            <input type="hidden" name="product_id" value="<?php echo $id ?>">
            <div class="col-12 ml-3 pr-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Your Rating</span>
                    </div>
                    <input required name="rating" type="number" min="1" max="5" class="form-control" placeholder="Rating this product" aria-label="Rating" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Your Comment</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea" name="comment" required></textarea>
                </div>
            </div>
            <div class="text-right mr-5 mt-3">
                <button type="submit" class="normal" name="submit" style="background-color: #088178; color: #fff">Submit</button>
            </div>
        </form>
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
                    <h4>$<?php echo $set['price'] ?>.00</h4>
                </div>
                <a href="#" aria-label="cart"><i class="fa fa-shopping-cart" id="cart" aria-hidden="true"></i></a>
            </div>
        <?php } ?>
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
<script>
    function setColor(val) {
        document.getElementById("color").value = val;
    }
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");
    smallImg[0].onclick = function() {
        mainImg.src = smallImg[0].src;
    };
    smallImg[1].onclick = function() {
        mainImg.src = smallImg[1].src;
    };
    smallImg[2].onclick = function() {
        mainImg.src = smallImg[2].src;
    };
    smallImg[3].onclick = function() {
        mainImg.src = smallImg[3].src;
    };
</script>