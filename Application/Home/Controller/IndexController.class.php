<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $array =array('apple'=>'eat','train'=>'drive');
        p($array);
    }
}
