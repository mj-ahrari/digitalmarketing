<?php
include_once('class/product.php');
$productwonder=new product();
?>
<div id="special">
        	<div id="sp-r">
            <?php
			$resproductwonder=$productwonder->selectwonder();
			while($rowproductwonder=$resproductwonder->fetch(PDO::FETCH_ASSOC))
			{
			?>
            	<div class="sp-r-r">
                	<div class="sp-r-1" name=<?php echo $rowproductwonder['id'] ?>><?php echo $rowproductwonder['title'] ?></div>
                    <div class="sp-r-2"></div>	
                </div>
             <?php
			}
			?>
            </div><!--End of sp-r-->
            <div id="sp-l">
            <?php
			$resproductwonder2 = $productwonder->selectwonderlast();
			$rowproductwonder2 = $resproductwonder2->fetch(PDO::FETCH_ASSOC);
			?>
            	<div id="sp-l-1" style="background-color:#FFFFFF; border-bottom:solid 1px #CCC"><a id="wonderimagehref" href="single.php?pid=<?php echo $rowproductwonder2['id'] ?>"><img id="wonderimage" src="<?php echo $rowproductwonder2['picture'] ?>" width="500" height="300" /></a>
                	<div style="float:left;">
                    	<div id="spt" style="float:left"><?php echo $rowproductwonder2['title']?></div><br /><br />
                        <div id="spt-1" style="float:left">این محصول دارای گارانتی: <?php echo $rowproductwonder2['garanti'] ?> روزه است.<br /><br />
فروشنده : شرکت زنون ایران<br /><br />
ارسال به تمامی نقاط کشور از طریق پست.<br /><br />
قیمت : <?php echo $rowproductwonder2['price'] ?> تومان<br /><br />
<a id="wonderimagehref" class="emsp" href="single.php?pid=<?php echo $rowproductwonder2['id'] ?>">مشاهده جزئیات</a></div>
                    </div>
                	<div id="sp-l-2">پیشنهاد ویژه</div>
                </div>
            
            </div><!--End of sp-l-->
        </div><!--End of special-->