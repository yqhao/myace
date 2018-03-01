<?php
// 定义标题和面包屑信息
$this->title = '文件仓库';
?>
<?=\backend\widgets\MeTable::widget()?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    var m = meTables({
        title: "文件仓库",
        table: {
            "aoColumns": [
                {"title": "id", "data": "id", "sName": "id","defaultOrder": "desc", "edit": {"type": "text", "required": true,"number": true}},
			{"title": "component", "data": "component", "sName": "component", "edit": {"type": "text", "required": true,"rangelength": "[2, 255]"}, "search": {"type": "text"}, "bSortable": false}, 
			{"title": "base_url", "data": "base_url", "sName": "base_url", "edit": {"type": "text", "required": true,"rangelength": "[2, 1024]"}, "bSortable": false}, 
			{"title": "path", "data": "path", "sName": "path", "edit": {"type": "text", "required": true,"rangelength": "[2, 1024]"}, "bSortable": false}, 
			{"title": "type", "data": "type", "sName": "type", "edit": {"type": "text", "rangelength": "[2, 255]"}, "search": {"type": "text"}, "bSortable": false}, 
			{"title": "size", "data": "size", "sName": "size", "edit": {"type": "text", "number": true}, "bSortable": false}, 
			{"title": "name", "data": "name", "sName": "name", "edit": {"type": "text", "rangelength": "[2, 255]"}, "bSortable": false}, 
			{"title": "upload_ip", "data": "upload_ip", "sName": "upload_ip", "edit": {"type": "text", "rangelength": "[2, 15]"}, "bSortable": false}, 
			{"title": "created_at", "data": "created_at", "sName": "created_at", "edit": {"type": "text", "required": true,"number": true}, "search": {"type": "text"}, "bSortable": false, "createdCell" : meTables.dateTimeString}, 

            ]       
        }
    });
    
    /**
    meTables.fn.extend({
        // 显示的前置和后置操作
        beforeShow: function(data, child) {
            return true;
        },
        afterShow: function(data, child) {
            return true;
        },
        
        // 编辑的前置和后置操作
        beforeSave: function(data, child) {
            return true;
        },
        afterSave: function(data, child) {
            return true;
        }
    });
    */

     $(function(){
         m.init();
     });
</script>
<?php $this->endBlock(); ?>