<div id="brands" >
<?php
include_once('class/brand.php');
$brand=new brand();
$resbrand=$brand->select();
?>
				

  

    					<div class="autoplay2" style="float:right; height:280px; width:1340px;">
                          <?php
						  while($rowbrand=$resbrand->fetch(PDO::FETCH_ASSOC))
						  {
						  ?>
                            <div ><a href="brand.php?bid=<?php echo $rowbrand['id']; ?>" target="_blank"><img  title="<?php echo $rowbrand['title'] ?>" width="302px" height="280px" style="" src="<?php echo $rowbrand['picture'];?>"></a></div>
                            <?php
						  }
							?>
                    
                    </div>        	        
         </div><!--End of brands-->