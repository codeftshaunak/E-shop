<?php foreach ($ads_shuffle as $item) { ?>

<!-- Owl-carousel -->
<section id="banner-area">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <img src="<?php echo './admin/assets'.$item['ad1__image'];?>" alt="afdfff">
        </div>
        <div class="item">
            <img src="<?php echo './admin/assets'.$item['ad2__image'];?>" alt="afdfff">
        </div>
        <div class="item">
            <img src="<?php echo './admin/assets'.$item['ad3__image'];?>" alt="afdfff">
        </div>
    </div>
</section>
<!-- !Owl-carousel -->
<?php } // closing foreach function ?>