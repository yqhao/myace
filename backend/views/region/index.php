<?php
// 定义标题和面包屑信息
$this->title = '地区';
?>
<?=\backend\widgets\MeTable::widget()?>
<?php $this->beginBlock('javascript') ?>
<script type="text/javascript">
    var m = meTables({
        title: "地区",
        table: {
            "aoColumns": [
                			{"title": "id", "data": "id", "sName": "id","defaultOrder": "desc", "edit": {"type": "text", "required": true,"number": true}, "search": {"type": "text"}},
			{"title": "父级", "data": "parent_id", "sName": "parent_id", "edit": {"type": "text", "number": true}, "search": {"type": "text"}, "bSortable": false}, 
			{"title": "名称", "data": "name", "sName": "name", "edit": {"type": "text", "rangelength": "[2, 100]"}, "search": {"type": "text"}, "bSortable": false}, 
			{"title": "省份", "data": "province", "sName": "province", "edit": {"type": "text", "rangelength": "[2, 100]"}, "search": {"type": "text"}, "bSortable": false}, 
			{"title": "城市", "data": "city", "sName": "city", "edit": {"type": "text", "rangelength": "[2, 100]"}, "bSortable": false}, 
			{"title": "地区", "data": "county", "sName": "county", "edit": {"type": "text", "rangelength": "[2, 100]"}, "bSortable": false}, 
			{"title": "经度", "data": "Longitude", "sName": "Longitude", "edit": {"type": "text", "rangelength": "[2, 20]"}, "bSortable": false}, 
			{"title": "纬度", "data": "latitude", "sName": "latitude", "edit": {"type": "text", "rangelength": "[2, 20]"}, "bSortable": false}, 
			{"title": "类型", "data": "type", "sName": "type", "edit": {"type": "text", "rangelength": "[2, 10]"}, "bSortable": false}, 
			{"title": "级别", "data": "depth", "sName": "depth", "edit": {"type": "text", "number": true}, "search": {"type": "text"}, "bSortable": false}, 

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