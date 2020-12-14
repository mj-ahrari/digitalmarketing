<div id="slider">
<?php
include_once('class/banner.php');
include_once('class/slider.php');
$banner=new banner();
$res=$banner->select();
$row=$res->fetch(PDO::FETCH_ASSOC);
$slider=new slider();
$resslider=$slider->select();
?>
        	<!-- <div id="slider-right"><img width="230px" height="380px" src="<?php //echo $row['picture']; ?>" /></div> -->
            <div id="slider-left">
                <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:1326px;margin:0px auto 0px;">
                    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                        <ul class="amazingslider-slides" style="display:none;">
                        <?php 
						while($rowslider=$resslider->fetch(PDO::FETCH_ASSOC))
						{
						?>
                            <li><img src="<?php echo $rowslider['picture']; ?>" alt="<?php echo $rowslider['alt']; ?>"  title="<?php echo $rowslider['title']; ?>" /></li>
                        <?php
						}
						?>
                        </ul>
                    </div>
                </div>          	
            </div>
</div><!--End of slider-->