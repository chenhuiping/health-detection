<?php include "head.php" ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap/chosen/chosen.css" />
<link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />

<!-- END PAGE LEVEL SCRIPTS -->
<link rel="shortcut icon" href="favicon.ico" />
<link href="assets/css/pages/image-crop.css" rel="stylesheet"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<?php include "header.php" ?>
<?php include "pageContainer.php" ?>
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN STYLE CUSTOMIZER -->
            <div class="color-panel hidden-phone">
                <div class="color-mode-icons icon-color"></div>
                <div class="color-mode-icons icon-color-close"></div>
                <div class="color-mode">
                    <p>THEME COLOR</p>
                    <ul class="inline">
                        <li class="color-black current color-default" data-style="default"></li>
                        <li class="color-blue" data-style="blue"></li>
                        <li class="color-brown" data-style="brown"></li>
                        <li class="color-purple" data-style="purple"></li>
                        <li class="color-grey" data-style="grey"></li>
                        <li class="color-white color-light" data-style="light"></li>
                    </ul>
                    <label>
                        <span>Layout</span>
                        <select class="layout-option m-wrap small">
                            <option value="fluid" selected>Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </label>
                    <label>
                        <span>Header</span>
                        <select class="header-option m-wrap small">
                            <option value="fixed" selected>Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </label>
                    <label>
                        <span>Sidebar</span>
                        <select class="sidebar-option m-wrap small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected>Default</option>
                        </select>
                    </label>
                    <label>
                        <span>Footer</span>
                        <select class="footer-option m-wrap small">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected>Default</option>
                        </select>
                    </label>
                </div>
            </div>
            <!-- END BEGIN STYLE CUSTOMIZER -->
            <h3 class="page-title">
                <!--							Advance Form Samples-->
                <!--							<small>advance form layout samples</small>-->
            </h3>
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/jkSystem/admin/index">用户管理</a>
                    <span class="icon-angle-right"></span>
                </li>
                <li>
                    <a href="/jkSystem/admin/userBL/<?=$userId?>">病例管理</a>
                    <span class="icon-angle-right"></span>
                </li>
                <li>
                    添加病例
                    <span class="icon-angle-right"></span>
                </li>
            </ul>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <div class="tabbable tabbable-custom boxless">
                <div class="tab-pane " id="tab_1">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder">添加病例</i></div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <!--                                        <form action="/jkSystem/event/addevent_do">-->
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <h3 class="form-section">添加病例</h3>
                            <div class="row-fluid">
                                <div class="span6 ">
                                    <div class="control-group">
                                        <label class="control-label">选择分类</label>
                                        <div class="controls">
                                            <select id="typeName">
                                                <?php
                                                foreach($type as $tp)
                                                {?>
                                                    <option value="<?=$tp['id']?>"><?=$tp['name']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">病例名称</label>
                                        <div class="controls">
                                            <input type="text" class="m-wrap span6" value="" id="bingliName">
                                        </div>
                                    </div>

                                </div>
                                <div class="sapn6">

                                    <div class="control-group">
                                        <label class="control-label">风险值</label>
                                        <div class="controls">
                                            <input type="text" class="m-wrap span6" value=""  id="fengxianzhi">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">每十万人病例数</label>
                                        <div class="controls">
                                            <input type="text" class="m-wrap span6" value="" id="bingli" >
                                        </div>
                                    </div>
                                </div>

                                <div class="span12 " style="margin-left:0px;">
<!--                                    <div class="control-group">-->
<!--                                        <label class="control-label">位点详情：</label>-->
<!--                                        <div class="controls">-->
<!--                                            <table  class="display table table-bordered table-striped" id="mytable">-->
<!--                                                <thead>-->
<!--                                                <tr>-->
<!--                                                    <th>位点</th>-->
<!--                                                    <th>评价</th>-->
<!--                                                    <th>研究价值</th>-->
<!--                                                    <th>基因型</th>-->
<!--                                                    <th>结果</th>-->
<!--                                                                                                        <th>编辑</th>-->
<!--                                                </tr>-->
<!--                                                </thead>-->
<!--                                                <tbody id="insert" name="table">-->
<!--<!--                                                --><?php
//                                                foreach($table as $tb)
////                                                {?>
<!--<!--                                                    <tr>-->
<!--                                                        <td><input type="text" style="width:60%" value="--><?//=$tb['weidian']?><!--"></td>-->
<!--                                                        <td><input type="text"  style="width:60%"  value="--><?//=$tb['pingjia']?><!--"></td>-->
<!--                                                        <td><input type="text"  style="width:60%"  value="--><?//=$tb['yanjiujiazhi']?><!--"></td>-->
<!--                                                        <td><input type="text"  style="width:60%"  value="--><?//=$tb['jiyinxing']?><!--"></td>-->
<!--                                                        <td><input type="text"  style="width:60%"  value="--><?//=$tb['jieguo']?><!--"></td>-->
<!--<!--                                                        <!--                                                        <td>编辑</td>-->
<!--<!--                                                    </tr>-->
<!--<!--                                                --><?php ////  }
////                                                ?>
<!--                                                </tbody>-->
<!--                                            </table>-->
<!---->
<!--<!--                                                <button><a  href="javascript:addtable();">添加</a></button>-->
<!---->
<!---->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="control-group">
                                                <label class="control-label">文章内容</label>
                                                <div class="controls">
                                                    <script id="editor" type="text/plain" style="width:100%;overflow:scroll;"></script>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!--/span-->
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn blue" onclick="edit()"><i class="icon-ok"></i> 修改</button>
                                <!--                                													<button type="button" class="btn">Cancel</button>-->
                                <!--                                                                                    <input type="submit" value="添加"/>-->
                            </div>

                            <!-- END FORM-->
                        </div>
                        <!--                                        </form>-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->

<!-- END CONTAINER -->
<?php include "footer.php"?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>


<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/form-samples.js"></script>

<script src="assets/plugins/jquery-validation/lib/jquery.form.js"></script>
<!--    <script src="assets/scripts/form-components.js"></script>-->
<script type="text/javascript" charset="utf-8" src="assets/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/ueditor.all.min.js"> </script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormSamples.init();
//            FormComponents.init();
//            var apip = $.Jcrop("#demo3");

        $('form :input').blur(function(){
            var $parent = $(this).parent();
            $parent.find(".formtips").remove();
            if( $(this).is('#eventName') ){
                //alert("shopName");
                if( this.value==""){
                    var errorMsg = '请输入活动名称.';
                    $parent.append('<span class="formtips onError error" style="color: #ff0000">'+errorMsg+'</span>');
                }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
            }
            if( $(this).is('#address') ){
                //alert("shopName");
                if( this.value==""){
                    var errorMsg = '请输入活动地址';
                    $parent.append('<span class="formtips onError error" style="color: #ff0000">'+errorMsg+'</span>');
                }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
            }
            if( $(this).is('#eventTime') ){
                //alert("shopName");
                if( this.value=="" || this.value.length >12  ){
                    var errorMsg = '请输入活动时间.';
                    $parent.append('<span class="formtips onError error" style="color: #ff0000">'+errorMsg+'</span>');
                }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
            }
            if( $(this).is('#category') ){
                //alert("shopName");
                if( this.value=="" ){
                    var errorMsg = '请选择分类.';
                    $parent.append('<span class="formtips onError error" style="color: #ff0000">'+errorMsg+'</span>');
                }else{
//                        var okMsg = '输入正确.';
//                        $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
            }
        })

    });

    $('#upload-btn').click(function(){
//            var file = $("#userfile").val();
//            var FileExt=file.replace(/.+\./,"");   //正则表达式获取后缀
        $('#uploadForm').ajaxForm({
            dataType: 'json',
            success: function (data) {
                alert("上传成功");
                document.getElementById('imgPath').value=data.thumb_path;
                document.getElementById('imagePath').value=data.path
            }
        });
    });


    function edit()
    {
//        var mytable = document.getElementById('mytable');
//        var data = [];
//        for(var i=0,rows=mytable.rows.length; i<rows; i++){
//            for(var j=0,cells=mytable.rows[i].cells.length; j<cells; j++){
//                if(!data[i]){
//                    data[i] = new Array();
//                }
//                data[i][j] =$('#mytable tr:eq('+i+')').find('td').eq(j).find('input').val();
//            }
//        }
//        var tmp=[];
//        for(i=1,rows=data.length; i<rows; i++){
//            for(j=0,cells=data[i].length; j<cells;j++){
//                tmp += data[i][j] + '|';
//            }
//        }
        var blId = <?=$blId?>;
        var userId = <?=$userId?>;
        var typeId = document.getElementById('typeName').value;
//        alert(typeId);
        var fengxianzhi = document.getElementById('fengxianzhi').value;
        var bingli = document.getElementById('bingli').value;
        var bingliName = document.getElementById('bingliName').value;
        var bingli = document.getElementById('bingli').value;
        var content =UE.getEditor('editor').getContent();

        var addEventURL = "/jkSystem/admin/addBL_do";
        $.ajax({
            type: "post",
            url: addEventURL,
            dataType: "json",
            data: {
//                tmp : tmp,
                blId : blId,
                bingli : bingli,
                bingliName : bingliName,
                userId : userId,
                typeId : typeId,
                fengxianzhi : fengxianzhi,
                content : content,
                bingli : bingli
            },

            success: function (data) {
                if(data.statusTable==true & data.statusFXZ==true)
                {
                    alert('添加成功');
                    window.location.href='/jkSystem/admin/userBL/<?=$userId?>';
                }
                else{
                    alert('请填写完整信息');
                }
            }
        })
    }

    function addtable()
    {
        var str = "" ;
        str += "<tr><td><input type=\"text\" style=\"width:50px\" ></td>";
        str += "<td><input type=\"text\" style=\"width:50px\" ></td>";
        str += "<td><input type=\"text\" style=\"width:50px\"></td>";
        str += "<td><input type=\"text\" style=\"width:50px\" ></td>";
        str += "<td><input type=\"text\" style=\"width:50px\"></td>";

        $('#insert').append(str);

    }



</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
