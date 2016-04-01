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


    public function upload(){

        $file_string = I('post.base64_string','','base64_decode');

        $savename = date("Ym").'/'.date("Ymd").'_'.uniqid().'.jpg';//localResizeIMG压缩后的图片都是jpeg格式
        $file_path = './Upload/' . $savename;

        $file = new \Think\Storage\Driver\File;
        $info = $file->put($file_path,$file_string);

        //p($info);

        if($info){
            $result['status'] = 1;
            $result['content'] = "上传成功";
            $result['url'] = $savename;
        } else {
            $result['status'] = 0;
            $result['content'] = "上传失败";
        }

        $this->ajaxReturn($result);

    }


}
?>
