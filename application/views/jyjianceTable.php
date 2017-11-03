<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>康普森生物技术有限公司</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Planeto Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<base href="<?=base_url()?>"/>
	<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css'  />
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<script src="assets/js/jquery-1.11.0.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="assets/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>
<!--    <link href="/print.css" rel="stylesheet" media="print" />-->
    <link type="text/css" href="assets/css/jquery.spider.disk.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.spider.disk.js"></script>

    <script type="text/javascript">


        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
<style>
    .content{
        padding-left: 20%;
        padding-right: 20%;
        font-size: 15px;
    }
    .biaoti{
        font-weight: bold;
        text-align: center;
    }


    }
</style>

<!--    <link type="text/css" href="assets/css/stylejindutiao.css">-->

<!--start-smoth-scrolling-->
</head>
<body>

		 <script>
				$("span.menu").click(function(){
					$(" ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->	
	<!--end-banner-->
	<!--start-carrer-->
	<div class="carrer">
		<div class="content">
            <div class="carrer-top">
                <br>
<!--                <a href="http://pdfmyurl.com/saveaspdf">Save this page as PDF</a>-->
<!--                <a href="http://pdfmyurl.com/saveaspdf?url=http://pdfmyurl.com/faq">Download the FAQ page as PDF</a>-->
                <h2 style="font-family: '黑体';font-weight: bold ;font-size: 2.2em">健康风险</h2>
                <br>
                <hr style="height:1px;border:none;border-top:3px solid #909090;" />

                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                    <tr>
                        <th>病例名称</th>
                        <th>风险值</th>
                        <th>风险比较</th>
                        <th>10万人中数量</th>
                        <!--                                    <th>删除</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($fxz as $f) { ?>
                        <tr >
                            <td><?=$f['bl']['name']?></td>
                            <td><?=$f['fengxianzhi'] ?></td>
                            <?php
                            if ($f['fengxianzhi'] > 1)
                            {
                                ?>
                                <td><span style="color:red">高于平均风险</span></td>
                                <?php
                            } else
                            {
                                ?>
                                <td><span style="color:green">低于平均风险</span></td>
                                <?php
                            }
                            ?>
                            <td><?= $f['bl']['bingli'] ?> 例</td>
                        </tr>
                    <?php   } ?>

                    </tbody>
                </table>


            </div>

            </div>
        </div>
    </div>
	<!--start-carrer-->
	<!----- Comman-js-files ----->
<!--		<script>-->
<!--			$(document).ready(function() {-->



<!--				$(".tabs-menu a").click(function(event){-->
<!--					event.preventDefault();-->
<!--					var tab=$(this).attr("href");-->
<!--					$(".tab-grid").not(tab).css("display","none");-->
<!--					$(tab).fadeIn("slow");-->
<!--				});-->
<!-- 		});-->





</body>
</html>