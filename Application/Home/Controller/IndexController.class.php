<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $content = M('content')->where(array("status" => 1))->order('ctime DESC')->select();

        $this->assign('content',$content);
        $this->display();
    }

    public function add(){
        $this->display();
    }


    public function save(){

        $content = I('content');
        $pics = I('pic');

        if(empty($content)){

            $this->error('留言内容为空!');
        }


        $data['content'] = I('content');
        $data['ctime'] = time();
        $gid = M('content')->data($data)->add();

        if($gid === false){

            $this->error('留言保存失败');

        }


        if(!empty($pics)){
            foreach ($pics as $v) {
                $arr['name'] = $v;
                $arr['gid'] = $gid;
                M('pic')->data($arr)->add();
            }
        }

        $this->display();
    }


    public function upload(){

        $file_string = I('post.base64_string','','base64_decode');

        $savename = date("Ym").'/'.date("Ymd").'_'.uniqid().'.jpg';//localResizeIMG压缩后的图片都是jpeg格式
        $file_path = './Upload/' . $savename;

        $file = new \Think\Storage\Driver\File;
        $info = $file->put($file_path,$file_string);

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
