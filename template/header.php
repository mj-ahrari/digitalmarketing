<?php include_once('class/basket.php'); ?>
<?php include_once('class/customer.php'); 
include_once('class/setting2.php'); 
$setting22 =new setting2();
$res2525=$setting22->selectsetting();
$row2525=$res2525->fetch(PDO::FETCH_ASSOC);
$customer1=new customer();
?>
<div id="header">
        	<div id="header_logo"><img src="<?php echo $row2525['logo']?>" /></div><!--End of header_logo-->
			<div id="omorfia">اُمورفیا</div>
            <div id="header_search">
        		
                <div id="search">
                	<form method="GET" action="search.php">
                    	<input type="text" placeholder="نام کالا، برند یا دسته مورد نظر را جستجو کنید ..." name="txt-search" id="txt-search"/><input type="submit" name="btn-search" id="btn-search" value=""/>
                    </form>
                </div>
                
       		</div><!--End of header_search-->
			<div id="home_new"><a href="index.php">خانه</a></div>
			<div id="callus_new"><a href="contactus.php">تماس با ما</a></div>
            <div id="header_login">
            	
                <div id="header_login_txt"><?php if(isset($_SESSION['user'])){ $rescustomer1=$customer1->selectOne($_SESSION['user']);
$rowcustomer1=$rescustomer1->fetch(PDO::FETCH_ASSOC); echo "<sapn style='font-size:14px; text-decoration:underline;'>".$rowcustomer1['mail']."</span>";  } else{ ?>ورود/ثبت نام <?php } ?></div>
                
                <div id="login-box">
                	<?php
					if(isset($_SESSION['user']))
					{
					?>
                   <div id="l-b-1">
                    	<div style=" border-radius:10px; padding-top:5px; padding-bottom:5px; border-right:10px; text-align:center; float:right; width:130px; background-color:#09F; margin-top:30px; margin-right:10px;"><a style=" color:#FFF; text-decoration:none; font-family:'nazanin'; " href="logout.php?logout=true">خروج</a>
                        </div>
                    </div>
                    <?php
					}
					else
					{
						?>
						<div id="l-b-1">
                    	<div style=" border-radius:10px; padding-top:5px; padding-bottom:5px; border-right:10px; text-align:center; float:right; width:130px; background-color:#09F; margin-top:30px; margin-right:10px;"><a style=" color:#FFF; text-decoration:none; font-family:'nazanin'; " href="login.php">ورود به سایت</a>
                        </div>
                    </div>
                    <div id="l-b-2">کاربر جدید هستید؟&nbsp;<a href="register.php">ثبت نام</a></div>
                    <?php
					}
					?>
                    
                    <div id="l-b-3"><div id="l-b-3-1"><a href="myprofile.php">پروفایل</a></div></div>
                    <div id="l-b-4"><div id="l-b-4-1"><a href="myorder.php">پی گیری سفارش</a></div></div>
                
                </div>
        	
            </div><!--End of header_login-->
            
            
            <a href="sabad.php"><div id="header_bascket">
            	<div id="h_b_r"><div id="h_b_r_r">&nbsp;</div><div id="h_b_r_c">سبد خرید</div><div id="h_b_r_l">
				<?php if(!isset($_SESSION['user'])) 
				{
					echo "0";
				}
				else
				{
					$basketheader = new basket();
					$resheader = $basketheader->searchuser($_SESSION['user']);
					$totalbasket=0;
					while($rowheader = $resheader->fetch(PDO::FETCH_ASSOC))
					{
						$totalbasket=$totalbasket+$rowheader['count'];
					}
					echo $totalbasket;
				}
				?>
                </div></div>	
            </div><!--End of header_bascket-->
</a>      
        </div><!--End of header-->