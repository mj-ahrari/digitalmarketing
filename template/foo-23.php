<?php
include_once("class/setting.php");
include_once("class/setting3.php");
$setting=new setting();
$setting3=new setting3();
$ressetting=$setting->select();
$rowsetting=$ressetting->fetch(PDO::FETCH_ASSOC);
$ressetting3=$setting3->select();
$rowsetting3=$ressetting3->fetch(PDO::FETCH_ASSOC);
?>
<div id="foo-2">
            	<div id="foo-2-r">
                	<span style="font-size:20px;border-bottom:dashed 1px #FF6600;">معرفی شرکت امورفیا</span><br />
<?=$rowsetting['about'] ?>
                </div>
                <div id="foo-2-l" style="font-size:16px;">
               <span style="font-size:20px;border-bottom:dashed 1px #FF6600;">کانال های ارتباطی با ما</span><br />
آدرس دفتر: <?=$rowsetting['daftaraddr'] ?><br />
شماره تماس ثابت: <?=$rowsetting['daftarphone'] ?><br />
شماره تماس موبایل: <?=$rowsetting['daftarmobile'] ?><br />
آدرس ایمیل: <?=$rowsetting['email'] ?>
                </div>
            </div><!--End of foo-2-->
            <div id="foo-3">
            	<div id="foo-3-r">
                	 ثبت نام برای دریافت خبرنامه، آگاهی از آخرین اخبارها، تخفیف ها، پیشنهادات، تبلیغات و فروش های ویژه و ...<br />
<form method="post" action="checking/khabarname.php">
<input type="text" placeholder="ایمیل خود را وارد کنید ..." name="txt-news" id="txt-search"/><input type="submit" name="btn-news" id="btn-search" value="عضویت"/>
</form>
                </div>
                <div id="foo-3-l">
                	<div id="foo-3-l-1">لطفا ما را در شبکه های اجتماعی دنبال کنید:</div>
               		<div id="foo-3-l-2">
                    	<div id="instagram"><a style="text-decoration:none;" href="<?=$rowsetting['instagram'] ?>"><img src="<?=$rowsetting3['instagram'] ?>" /><br />
&nbsp;<br />
&nbsp;</a></div>
                        <div id="telegram"><a style="text-decoration:none;" href="<?=$rowsetting['telegram'] ?>"><img src="<?=$rowsetting3['telegram'] ?>" /><br />
&nbsp;<br />
&nbsp;</a></div>
                        <div id="facebook"><a style="text-decoration:none;" href="<?=$rowsetting['facebook'] ?>"><img src="<?=$rowsetting3['facebook'] ?>" /><br />
&nbsp;<br />
&nbsp;</a></div>
                    </div>
                </div>
            </div><!--End of foo-3-->