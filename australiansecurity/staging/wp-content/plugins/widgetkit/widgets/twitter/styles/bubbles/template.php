<section class="wk-twitter wk-twitter-bubbles clearfix twit-part">
    <ul>
        <?php foreach ($tweets as $tweet) : ?>
            <li>
                <?php if ($show_image) : ?>
                    <a class="image" href="<?php echo $tweet->getLink(); ?>">
                        <span class="twt-img">
                            <img src="<?php echo $tweet->image; ?>" width="<?php echo $image_size; ?>" height="<?php echo $image_size; ?>" alt="<?php echo $tweet->name; ?>">
                        </span>
                    </a>
                <?php endif; ?>

                <div class="twt-right">
                    <p><?php echo $tweet->getText(); ?></p>
                    <?php if ($show_date) : ?>
                        <span><time data-test="2" datetime="<?php echo date(DATE_W3C, strtotime($tweet->created_at)); ?>" pubdate></time></span>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <div class="follow-us">
        <a href="https://twitter.com/AusAntennas" class="twitter-follow-button" data-show-count="false" data-size='large'>Follow @AusAntennas</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
</section>