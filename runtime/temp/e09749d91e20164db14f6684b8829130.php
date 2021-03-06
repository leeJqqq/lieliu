<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp3\wamp64\www\lieliu\public/../application/admin\view\news\edit.html";i:1525774580;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
  content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>内容编辑</title>
<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
</head>
<style>
.label_img{
  object-fit:cover;
  width:100%;
  height:100%;
}
.hide{
  display:none;
}
</style>

<body style="padding:10px;">

  <form class="layui-form" action=""  style="width:70%;">
  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
      <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']: ''; ?>">
    </div>
  </div>

<!--   <div class="layui-form-item">
    <label class="layui-form-label">选择栏目</label>
    <div class="layui-input-block">
      <select name="cate" lay-verify="required">
        <option value=""></option>
        <option value="0">北京</option>
        <option value="1">上海</option>
        <option value="2">广州</option>
        <option value="3">深圳</option>
        <option value="4">杭州</option>
      </select>
    </div>
  </div> -->
  


<div style="margin-bottom:30px;display:flex;margin-left:63px;">
  <p style="margin-right:15px;">内容</p>
  <script id="container" name="content" type="text/plain">  
<?php echo isset($data['content'])?$data['content']:''; ?>
  </script>
</div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即发布</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>
    
    <script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/static/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
  <script src="/static/js/jquery-3.2.1.min.js"></script>
  <script src="/static/layui/layui.js"></script>
  <script>
   var ue = UE.getEditor('container',{
     initialFrameWidth :1000,
     initialFrameHeight :300,
     zIndex:300 ,
       pasteplain:false,
          toolbars: [
                     ['fullscreen', 'source', 'undo', 'redo', 'fontfamily', 'fontsize','paragraph'],
                     ['bold', 'italic', 'underline', 'fontborder','justifyleft','justifyright','justifycenter','justifyjustify',  'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','simpleupload',]
                 ]
   });
  layui.use(['form','upload','layer'], function(){
      var form   = layui.form;
      var upload = layui.upload;
      var layer  = layui.layer;
      
      //监听提交
      form.on('submit(formDemo)', function(data){
   
      if(ue.getContent()==""){
        layer.msg("请编辑内容",{icon:5,shift:6})
        return false;
      }

       var url="<?php echo url('save'); ?>";
       var data={data:data.field,content:ue.getContent()}
         <?php if(isset($data)): ?>
         url="<?php echo url('update'); ?>";
         data['oldContent']='<?php echo $data['content']; ?>';
         data['newsid']="<?php echo $data['newsid']; ?>";
         <?php endif; ?>
        /* layer.msg(JSON.stringify(data.field)); */
        $.ajax({
          url:url,
          data:data,
          type:"POST",
          beforeSend:function(){
           layer.load(2, {shade: false});
          },
          success:function(data){
            layer.closeAll()
            if(data==1){
              layer.msg("保存成功",{ time: 700 },function(){
                history.go(0)
              })
            }
          }       
        })
        return false;
      });
            
       
         
      
      
    });
  </script>

</body>
</html>