<?php
/**
 * 替换表情
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
 function replace_phiz($content){
    preg_match_all('/\[.*?\]/is', $content, $arr);
    if ($arr[0]) {
        $phiz = F('phiz', '', './Data/');
        foreach($arr[0] as $v){
            foreach($phiz as $key => $value){
                if($v == '[' . $key . ']'){
                    $content = str_replace($v, '<img src="' . __ROOT__ . '/Public/image/Home/QQFace/' . $value . '.gif" />' , $content);
                }
                continue;
            }
        }
    }
    return $content;
};


/**
 * 数据分页
 * @param  [type]  $count    [description]
 * @param  integer $pagesize [description]
 * @return [type]            [description]
 */
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}

/**
 * 敏感词汇替换
 * @param  [type] $badwords [description]
 * @param  [type] $content  [description]
 * @return [type]           [description]
 */
function badwords($badwords,$content){
    if($content == null) return false;
    $content = str_replace(' ','',$content);
    $badwords = '/'.$badwords.'/i';
    if(preg_match($badwords, $content, $matches))
        return true ;
    return false ;
}
?>