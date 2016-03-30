<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $content = M('content')->select();

        $this->assign('content',$content);
        $this->display();
    }
}
?>
