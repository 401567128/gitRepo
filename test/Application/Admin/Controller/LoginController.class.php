<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    
    /**
     * 
     * 登陆操作
     * @return [type] [description]
     */
    public function login(){
        $username = I(username) ;
        $pwd      = md5(I(pwd));
        $User     = M('User') ;
        $limit    = 'username=' . " \"$username\" " ;
        $list   = $User->where($limit)->find();            //查询数据

        // $zero1=strtotime (date("Y-m-d H:i:s")); //当前时间  ,注意H 是24小时 h是12小时 
        // $zero2=strtotime ("0000-00-00 00:00:00");  //过年时间，不能写2014-1-21 24:00:00  这样不对 
        // $guonian=ceil(($zero2-$zero1)/60); //60s*60min*24h   
        // echo "离过年还有<strong>$guonian</strong>分钟！"; 

        if(!$this->check_verify(I('code')))     $this->error('错误的验证码');

        if($username.$pwd == $username.$list['pwd'] && $list['locked'] == 0){
            $data['count'] = $list['count']+1 ;             //登录次数+1
            $data['ip'] = getIP();                          //获取ip
            $data['lasttime'] = $list['thistime'] ;         //记录上次登录时间
            $data['thistime'] = date('Y-m-d H:i:s',time()); //获取当前登录时间
            if($User->where($limit)->save($data)){
                $userinfo = array(
                        'id'       =>$list['id'],
                        'username'  => $username ,
                        'permissions' => $list['permissions'] ,
                    );
                session('userinfo',$userinfo);
                $this->success('登陆成功',U('Index/index'));
            }else{
                $this->error('更新数据失败');
            }
        }else{
            $this->error('错误的密码或用户被锁定！');
        }
    }

    /**
     * 验证码
     * @return [type] [description]
     */
    public function verify(){
        $config =    array(
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            'imageW'      =>    170 ,  
            'imageH'      =>    50 ,
            'useCurve'    =>    false ,
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
    
    /**
     * 验证码鉴定
     * @param  [type] $code [description]
     * @param  string $id   [description]
     * @return [type]       [description]
     */
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}