<section id="page-header" class="blog-header">
    <h2>#readmore</h2>
    <p>Read all case studies about our products!</p>
</section>

<section id="blog">
    <?php
    $blog = new blog();
    $result = $blog->getAllBlogs();
    while ($set = $result->fetch()) :
    ?>
        <div class="blog-box">
            <div class="blog-img">
                <img src="<?php echo $set['image'] ?>" alt="">
            </div>
            <div class="blog-details">
                <h4><?php echo $set['title'] ?></h4>
                <p><?php echo $set['description'] ?></p>
                <a href="<?php echo $set['slug'] ?>">Continue Reading</a>
            </div>
            <h1><?php echo $set['created_at'] ?></h1>
        </div>
    <?php endwhile ?>
</section>

<section id="newsletter" class="section-p1">
    <div class="newstext">
        <h4>Sign Up For Newletters</h4>
        <p>
            Get E-mail updates about our lastest shop and
            <span>special offers</span>
        </p>
    </div>
    <form action="index.php?action=user&act=" method="post" class="form">
        <input type="email" name="email_signup" id="email_signup" placeholder="Your email address" />
        <button class="normal" type="submit">Sign Up</button>
    </form>
    </form>
</section>