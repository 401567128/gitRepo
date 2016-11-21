<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$Base = M('Base');
        $base = $Base->where('id=1')->find();
        $this->assign('base',$base);
        $this->display();
    }

    /**
     * 首页第一页
     * @return [type] [description]
     */
    public function indexpage(){
        $Msg = M('Msg');
        $num=$Msg->where('locked=0')->count();
        if($num>30){
            $num=30;
        }
        $data = $Msg->where('locked=0')->order('time desc')->limit($num)->select();
        for($i=0;$i<$num;$i++){
            $data[$i]['msg'] = replace_phiz($data[$i]['msg']);
        }
        $this->assign('data',$data);
        $this->display();
    }


    /**
     * 留言页
     * @return [type] [description]
     */
    public function message(){
        $Base = M('Base');
        $base = $Base->where('id=1')->find();
        $this->assign('base',$base);
        $this->display();
    }


    /**
     * 留言列表页面
     * @return [type] [description]
     */
    public function msglist(){
        $Msg = M('Msg');
        $num = 6;
        $where = "id>0 AND locked=0";
        $count = $Msg->where($where)->count();
        $p = getpage($count,$num);
        $list = $Msg->field(true)->where($where)->order('id desc')->limit($p->firstRow, $p->listRows)->select();
        foreach($list as $key => $value){
            $list[$key]['msg'] = replace_phiz($list[$key]['msg']);
            $list[$key]['num'] = mb_strlen($list[$key]['msg'],'utf8');
        }
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    /**
     * 添加留言
     * @return [type] [description]
     */
    public function msgAdd(){
        $Msg = M('Msg');
        $data['name'] = I('name');
        $data['sex'] = I('sex') ;
        $data['nickname'] = I('nickname') ;
        $data['type'] = I('type');
        $data['class'] = I('class');
        $data['tel'] = I('tel');
        $data['msg'] = I('msg');
        $data['time'] = time();

        $Black = M('Blacklist');
        $badwords = $Black->where('id=1')->getField('content');
        if(badwords($badwords,$data['msg'])){
            $return['state'] = '2' ;
            $return['message'] = '您的留言中含有敏感词汇！';
        }else{
            if($Msg->data($data)->add()){
                $return['state'] = '1' ;
                $return['message'] = '留言成功';
            }else{
                $return['state'] = '0';
                $return['message'] = '留言失败';
            }
        }

        
        $this->ajaxReturn($return);
    }

    public function showMsg(){
        $Msg = M('Msg');
        $uid = I('uid');
        $content = $Msg->where('id='.$uid)->getField('msg');
        $content = replace_phiz($content);
        $this->ajaxReturn($content);
    }
}