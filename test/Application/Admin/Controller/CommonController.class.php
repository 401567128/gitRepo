<?php
namespace Admin\Controller ;
use Think\Controller ;

class CommonController extends Controller{

	public function _initialize(){
        $username=session('userinfo.username');
        if(!isset($username)) 
            $this->redirect('Login/index');
    }
}
?>