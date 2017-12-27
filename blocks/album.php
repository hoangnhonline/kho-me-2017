<div id="gallery_kh" class="ad-gallery" style="margin-left:25px;text-align:center" >
    <div class="ad-image-wrapper" >
    </div>
    <div class="ad-controls">
    </div>
    <div class="ad-nav" >
        <div class="ad-thumbs">
            <ul class="ad-thumb-list">
                <?php
                $i = 0;
                foreach ($arrHinh as $hinh) {
                    $i++;
                    ?>
                    <li>
                        <a href="<?php echo $hinh; ?>">
                            <img src="<?php echo $hinh ?>" width="80" height="70" class="image<?php echo $i; ?>">
                        </a>
                    </li> 
<?php } ?>          

            </ul>
        </div>
    </div>
</div>
