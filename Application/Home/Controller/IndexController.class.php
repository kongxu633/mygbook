<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $content = M('content')->order('ctime DESC')->select();

        $this->assign('content',$content);
        $this->display();
    }

    public function add(){
        $this->display();

    }


    public function save(){

        //p(I('post.'));

        $content = I('content');

        if(empty($content)){

            $this->error('留言内容为空!');
        }


        $data['content'] = I('content');
        $data['ctime'] = time();


        if(M('content')->data($data)->add()){

            echo "ok";

        }

        $this->display();
    }
}
?>
