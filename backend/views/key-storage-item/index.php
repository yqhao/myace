<?php
// 定义标题和面包屑信息
$this->title = '键存储';
?>
<?=\backend\widgets\MeTable::widget()?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    var m = meTables({
        title: "键存储",
        table: {
            "aoColumns": [
                			{"title": "key", "data": "key", "sName": "key", "edit": {"type": "text", "required": true,"rangelength": "[2, 128]"}, "search": {"type": "text"}}, 
			{"title": "value", "data": "value", "sName": "value", "edit": {"type": "text", "required": true}, "bSortable": false}, 
			{"title": "comment", "data": "comment", "sName": "comment", "edit": {"type": "text", }, "bSortable": false}, 
			{"title": "updated_at", "data": "updated_at", "sName": "updated_at", "edit": {"type": "text", "number": true}, "bSortable": false, "createdCell" : meTables.dateTimeString}, 
			{"title": "created_at", "data": "created_at", "sName": "created_at", "edit": {"type": "text", "number": true}, "search": {"type": "text"}, "createdCell" : meTables.dateTimeString}, 

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