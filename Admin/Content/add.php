<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
    <hdjs/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/content.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <form action="{|U:'content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'state'=>$_GET['state'])}" class="hd-form">
        <input type="hidden" name="g" value="Hdcms"/>
        <input type="hidden" name="a" value="Content"/>
        <input type="hidden" name="c" value="Content"/>
        <input type="hidden" name="m" value="content"/>
        <input type="hidden" name="mid" value="{$hd.get.mid}"/>
        <input type="hidden" name="cid" value="{$hd.get.cid}"/>
        <input type="hidden" name="state" value="{$hd.get.state}"/>
        <div class="search">
            添加时间：<input id="begin_time" readonly="readonly" class="w80" type="text" value="{$hd.get.search_begin_time}" name="search_begin_time">
            <script>
                $('#begin_time').calendar({format: 'yyyy-MM-dd'});
            </script>
            -
            <input id="end_time" readonly="readonly" class="w80" type="text" value="{$hd.get.search_end_time}" name="search_end_time">
            <script>
                $('#end_time').calendar({format: 'yyyy-MM-dd'});
            </script>
            &nbsp;&nbsp;&nbsp;
            <select name="flag" class="w100">
                <option selected="" value="">全部</option>
                <list from="$flag" name="f">
                    <option value="{$f}" <if value="$hd.get.flag eq $f">selected=''</if>>{$f}</option>
                </list>
            </select>&nbsp;&nbsp;&nbsp;
            <select name="search_type" class="w100">
                <option value="1" <if value="$hd.get.search_type eq 1">selected=''</if>>标题</option>
                <option value="2" <if value="$hd.get.search_type eq 2">selected=''</if>>简介</option>
                <option value="3" <if value="$hd.get.search_type eq 3">selected=''</if>>用户名</option>
                <option value="4" <if value="$hd.get.search_type eq 4">selected=''</if>>用户uid</option>
            </select>&nbsp;&nbsp;&nbsp;
            	关键字：
            <input class="w200" type="text" placeholder="请输入关键字..." value="{$hd.get.search_keyword}" name="search_keyword">
            <button class="hd-cancel" type="submit">搜索</button>
        </div>
    </form>
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'state'=>1)}"
                <if value="$hd.get.state==1">class="action"</if> >内容列表</a>
            </li>
            
            <li>
                <a href="{|U:'content',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'state'=>0)}"
                <if value="$hd.get.state==0">class="action"</if> >未审核</a>
            </li>
            <?php if(check_category_access($_GET['cid'],'add')):?>
            <li><a href="javascript:;" onclick="hd_open_window('{|U:add,array('cid'=>$_GET['cid'],'mid'=>$_GET['mid'])}')">添加内容</a></li>
            <?php endif;?>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" id="select_all"/>
            </td>
            <td class="w30">aid</td>
            <td class="w30">排序</td>
            <td>标题</td>
            <td class="w50">状态</td>
            <td class="w100">栏目</td>
            <td class="w100">作者</td>
            <td class="w80">修改时间</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <list from="$data" name="c">
            <tr>
                <td><input type="checkbox" name="aid[]" value="{$c.aid}"/></td>
                <td>{$c.aid}</td>
                <td>
                    <input type="text" class="w30" value="{$c.arc_sort}" name="arc_order[{$c.aid}]"/>
                </td>
                <td>
                    <a href="{|U:'Index/Article/show',array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'aid'=>$c['aid'])}" target="_blank">{$c.title}</a>
                    <if value="$c.flag">
                        <span style="color:#FF0000"> [{$c.flag}]</span>
                    </if>
                </td>
                <td>
                    <if value="$c.state eq 1">已审核<else>未审核</if>
                </td>
                <td>{$c.catname}</td>
                <td>{$c.username}</td>
                <td>{$c.updatetime|date:"Y-m-d",@@}</td>
                <td>
                    <a href="<?php echo Url::get_content_url($c);?>" target="_blank">访问</a><span
                        class="line">|</span>
                    <?php if(check_category_access($c['cid'],'edit')):?>
                    <a href="javascript:;"
                       onclick="hd_open_window('{|U:edit,array('mid'=>$_GET['mid'],'cid'=>$_GET['cid'],'aid'=>$c['aid'])}')">编辑</a>
                    <?php else:?>
                    	<a href='javascript:alert("您没有编辑文章权限")'>编辑</a>
                    <?php endif;?>
                    <span class="line">|</span>
                    <?php if(check_category_access($c['cid'],'del')):?>
                    <a href="javascript:;" onclick="del({$hd.get.mid},{$hd.get.cid},{$c.aid})">删除</a>
                    <?php else:?>
                    	<a href='javascript:alert("您没有删除文章权限")'>删除</a>
                    <?php endif;?>
                </td>
            </tr>
        </list>
    </table>
    <div class="page1">
        {$page}
    </div>
</div>

<div class="position-bottom">
    <input type="button" class="hd-cancel" value="全选" onclick="select_all('.table2')"/>
    <input type="button" class="hd-cancel" value="反选" onclick="reverse_select('.table2')"/>
    <?php if(check_category_access($_GET['cid'],'order')):?>
    <input type="button" class="hd-cancel" onclick="order({$hd.get.mid},{$hd.get.cid})" value="更改排序"/>
    <?php endif;?>
    <?php if(check_category_access($_GET['cid'],'del')):?>
    <input type="button" class="hd-cancel" onclick="del({$hd.get.mid},{$hd.get.cid})" value="批量删除"/>
    <?php endif;?>
    <?php if(check_category_access($_GET['cid'],'audit')):?>
    <input type="button" class="hd-cancel" onclick="audit({$hd.get.mid},{$hd.get.cid},1)" value="审核"/>
    <?php endif;?>
    <?php if(check_category_access($_GET['cid'],'audit')):?>
    <input type="button" class="hd-cancel" onclick="audit({$hd.get.mid},{$hd.get.cid},0)" value="取消审核"/>
    <?php endif;?>
    <?php if(check_category_access($_GET['cid'],'move')):?>
    <input type="button" class="hd-cancel" onclick="move({$hd.get.mid},{$hd.get.cid})" value="批量移动"/>
    <?php endif;?>
</div>
</body>
</html>