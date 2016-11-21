<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload ;

class IndexController extends CommonController{

	public function index(){
        $checkPms['no1'] = checkPms(session('userinfo.id'),"1");
        $checkPms['no2'] = checkPms(session('userinfo.id'),"2");
        $checkPms['no3'] = checkPms(session('userinfo.id'),"3");
        $checkPms['no4'] = checkPms(session('userinfo.id'),"4");
        $this->assign('checkPms',$checkPms);
		$this->display();
	}


	/**
	 * 退出登陆
	 * @return [type] [description]
	 */
	public function logout(){
		session('userinfo',null);
		$this->success('退出成功',U('Login/index'));
    }


    /**
     * 添加管理员
     * @return [type] [description]
     */
   	public function resign(){
   		$data['username'] = I('username') ;
   		$data['pwd'] 	  = md5(I('pwd'));
   		$data['tel'] 	  = I('tel');
   		$data['permissions'] = implode(',',$_POST["permissions"]);
   		$data['setuptime']	= date('y-m-d H:i:s',time());
   		$User = M('User');
   		
   		if($User->data($data)->add()){
            $this->success('添加成功！');
            echo "<script type='text/javascript'>
                    alert('更新成功!');
                    parent.location.reload();
                </script>";
        }else{
            $this->error('添加失败，请联系管理员');
        } 	
   	}


   	/**
   	 * 后台首页
   	 * @return [type] [description]
   	 */
   	public function welcome(){
        //管理员基本信息
   		$User = M('User');
   		$limit = 'username=' . "\"" .session('userinfo.username') . "\"" ;
   		$list = $User->where($limit)->find();
   		$this->assign('data',$list);

        //留言总数信息
        $Msg = M('Msg');
        $all['all'] = $Msg->count();   //留言总数
        $all['alltea'] = $Msg->where('type=1')->count();//教师留言数
        $all['allstu'] = $Msg->where('type=0')->count();//学生留言数
        $all['allfri'] = $Msg->where('type=2')->count();//校友留言数
        $this->assign('all',$all);

        //今日留言信息
        $starttimeT = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $endtimeT = time();
        $today['all'] = $Msg->where(map('time',$starttimeT,$endtimeT))->count();   //留言总数
        $today['alltea'] = $Msg->where(map('time',$starttimeT,$endtimeT,'1'))->count();//教师留言数
        $today['allstu'] = $Msg->where(map('time',$starttimeT,$endtimeT,'0'))->count();//学生留言数
        $today['allfri'] = $Msg->where(map('time',$starttimeT,$endtimeT,'2'))->count();//校友留言数
        $this->assign('today',$today);

        //昨日留言信息
        $starttimeY = mktime(0,0,0,date("m"),date("d")-1,date("Y"));
        $endtimeY = mktime(0,0,0,date("m"),date("d"),date("Y"));
        $yesterday['all'] = $Msg->where(map('time',$starttimeY,$endtimeY))->count();   //留言总数
        $yesterday['alltea'] = $Msg->where(map('time',$starttimeY,$endtimeY,'1'))->count();//教师留言数
        $yesterday['allstu'] = $Msg->where(map('time',$starttimeY,$endtimeY,'0'))->count();//学生留言数
        $yesterday['allfri'] = $Msg->where(map('time',$starttimeY,$endtimeY,'2'))->count();//校友留言数
        $this->assign('yesterday',$yesterday);

        //本周留言信息
        $num = date('w') ;
        if($num == 0)
            $num = 7 ;
        $starttimeW = mktime(0,0,0,date("m"),date("d")-$num+1,date("Y"));
        $endtimeW = time();
        $week['all'] = $Msg->where(map('time',$starttimeW,$endtimeW))->count();   //留言总数
        $week['alltea'] = $Msg->where(map('time',$starttimeW,$endtimeW,'1'))->count();//教师留言数
        $week['allstu'] = $Msg->where(map('time',$starttimeW,$endtimeW,'0'))->count();//学生留言数
        $week['allfri'] = $Msg->where(map('time',$starttimeW,$endtimeW,'2'))->count();//校友留言数
        $this->assign('week',$week);
        

        //本月留言信息
        $starttimeM = mktime(0,0,0,date("m"),1,date("Y"));
        $endtimeM = time();
        $month['all'] = $Msg->where(map('time',$starttimeM,$endtimeM))->count();   //留言总数
        $month['alltea'] = $Msg->where(map('time',$starttimeM,$endtimeM,'1'))->count();//教师留言数
        $month['allstu'] = $Msg->where(map('time',$starttimeM,$endtimeM,'0'))->count();//学生留言数
        $month['allfri'] = $Msg->where(map('time',$starttimeM,$endtimeM,'2'))->count();//校友留言数
        $this->assign('month',$month);

   		$this->display();
   	}


    
    /**
     * 修改密码
     * @return [type] [description]
     */
    public function changePwd(){
        $User = M('User');
        $limit = 'username=' . "\"" .session('userinfo.username') . "\"" ;
        $list = $User->where($limit)->find();
        if($list['pwd'] == md5(I('oldpwd'))){
            if($User->where($limit)->setField('pwd',md5(I('newpwd')))){
                $this->success('修改成功！');
            }else{
                $this->error('修改失败！');
            }
        }else{
            $this->error('原始密码错误！');
        }
    }


    /**
     * 获取管理员列表
     * @return [type] [description]
     */
    public function admin_list(){
        $User = M('User');
        $list = $User->order('id')->select();
        $userCount = $User->count();            //获取用户数
        $this->assign('userCount',$userCount);
        $this->assign('list',$list);
        $this->display();
    }


    /**
     * 删除管理员
     * @return [type] [description]
     */
    public function admin_delete(){
        $id = I('uid');
        $limit = 'id=' . "\"" . $id . "\"" ;
        $User = M('User');
        if($User->where($limit)->delete())
            echo 1;
        else
            echo "删除失败";
    }


    /**
     * 禁用/启用管理员
     * @return [type] [description]
     */
    public function locked(){
        $id = I('uid');
        $locked = I('locked');
        $limit = 'id=' . "\"" . $id . "\"" ;
        $User = M('User');
        if($User->where($limit)->setField('locked', $locked))
            echo 1;
    }

    /**
     * 读取修改管理员信息
     * @return [type] [description]
     */
    public function admin_edit(){
        //显示部分
        $id = I('uid');
        $User = M('User');
        $limit = 'id=' . "\"" . $id . "\"" ;
        $data = $User->where($limit)->find();
        $data['no1'] = checkPms($id,"1");           
        $data['no2'] = checkPms($id,"2");
        $data['no3'] = checkPms($id,"3");
        $data['no4'] = checkPms($id,"4");
        $this->assign('data',$data);
        $this->display();

        
    }

    /**
     * 修改管理员信息
     * @return [type] [description]
     */
    public function editAdmin(){
        $User = M('User');
        $limit = 'id=' . "\"" . I('uid') . "\"" ;
        if(I('pwd') != null)
            $data['pwd'] = md5(I('pwd'));
        $data['tel'] = I('tel');
        $data['permissions'] = implode(',',$_POST["permissions"]);
        if(I('uid') == "1"){
            $arr = array(1,2,3);
            $data['permissions'] = implode(',',$arr);
        }
        if($User->where($limit)->save($data)){
            // $this->success('更新成功');
            echo "<script type='text/javascript'>
                    alert('更新成功!');
                    parent.location.reload();
                </script>";
        }else{
            $this->error('请修改后再提交');
        }
    }

    /**
     * 读取基本配置
     * @return [type] [description]
     */
    public function system_base(){
        $Base = M('Base');
        $data = $Base->where('id=1')->find();
        $this->assign('data',$data);
        $this->display();
    }



    /**
     * 修改网站基本配置
     * @return [type] [description]
     */
    public function editBase(){
        $data['title'] = I('title');
        $data['slogan'] = I('slogan');
        $data['rule'] = I('rule');
        $data['music'] = I('music') ;
        $data['footer'] = I('footer') ;

        // dump($data);
        $Base = M('Base');
        if($_FILES['image'] != null){
            //处理背景图片
            $config = array(
                    'maxSize'    =>    3145728,
                    'rootPath'   =>    'Public/image/Home/Index/',
                    'autoSub'    =>     false ,
                    'saveName'   =>    'bg3',
                    'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                    'replace'    =>    true
                );
            $upload = new \Think\Upload($config);
            $info   =   $upload->upload();
            if($info)
                $data['image'] = date('y-m-d H:i:s',time()) ;
        }
        if($Base->where('id=1')->save($data))
            $this->success('修改成功！');
        else
            $this->error('请做修改！');
    }


    /**
     * 留言首页
     * @return [type] [description]
     */
    public function article_list() {
        $num = 50 ;  //留言限制条数
        $Msg = M('Msg');      
        $where = "id>0";
        $count = $Msg->where($where)->count();
        $p = getpage($count,$num);
        $list = $Msg->field(true)->where($where)->order('id')->limit($p->firstRow, $p->listRows)->select();
        foreach($list as $key => $value){
            $list[$key]['msg'] = replace_phiz($list[$key]['msg']);
        }
        $this->assign('count',$count);
        $this->assign('select', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display();
    }

    /**
     * 留言删除
     * @return [type] [description]
     */
    public function msg_delete(){
        $id = I('uid');
        $limit = 'id=' . "\"" . $id . "\"" ;
        $Msg = M('Msg');
        if($Msg->where($limit)->delete())
            echo 1;
        else
            echo "删除失败";
    }


    /**
     * 留言审核
     * @return [type] [description]
     */
    public function msg_locked(){
        $id = I('uid');
        $locked = I('locked');
        $limit = 'id=' . "\"" . $id . "\"" ;
        $Msg = M('Msg');
        if($Msg->where($limit)->setField('locked', $locked))
            echo 1;
    }


    /**
     * 批量删除
     * @return [type] [description]
     */
    public function allDelete(){
        $Msg = M('Msg');
        $deleteArr = I('post.data');
        for($i=0;$i<count($deleteArr);$i++) {
            $Msg->delete($deleteArr[$i]);
        }
        $this->ajaxReturn(array('message'=>'删除成功！'));
    }


    /**
     * 批量审核
     * @return [type] [description]
     */
    public function allPass(){
        $Msg = M('Msg');
        $deleteArr = I('post.data');
        $data['locked'] = 0 ;
        for($i=0;$i<count($deleteArr);$i++) {
            $data['id'] = $deleteArr[$i];
            $Msg->save($data);
        }
        $this->ajaxReturn(array('message'=>'更新成功！'));
    }

    /**
     * 导出excel文件
     * @return [type] [description]
     */
    public function outExcel(){
        $Msg = M('Msg');
        $list = $Msg->where('locked=0')->order('id')->select();
        $count = $Msg->count();
        createExcel($list,'毕业生留言板.xls',$count);
    }



    /**
     * 敏感词汇页面
     * @return [type] [description]
     */
    public function blacklist(){
        $Black = M('Blacklist');
        $content = $Black->where('id=1')->getField('content');
        $this->assign('content',$content);
        $this->display();
    }


    /**
     * 更新敏感词
     * @return [type] [description]
     */
    public function doBlackList(){
        $blacklist = I('blackList');
        $Black = M('Blacklist');
        $data['content'] = $blacklist;
        if($Black->where('id=1')->save($data))
            $this->success('修改成功!');
        else
            $this->error('修改后再提交！');
    }

    /**
     * 清空ID
     * @return [type] [description]
     */
    public function droptable(){
        $Msg = M('Msg');
        $table = 'ms_msg';
        $result = $Msg->execute('TRUNCATE TABLE '.$table);
        $this->success('操作成功！');
    }
}
?>