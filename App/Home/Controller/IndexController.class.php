<?php
namespace Home\Controller;

use Think\Controller;

//$activeDW=array();
class IndexController extends Controller{
    public function index(){ 
      // $arr = array(
      //   array(
      //     '0'=>'www.ftdsp.com',
      //     '1'=>11111111111,
      //     '2'=>'京ICP备案111',
      //   ),
      //   array(
      //     '0'=>'www.ftdsp.com',
      //     '1'=>11111111111,
      //     '2'=>'京ICP备案1111111111',
      //   ),
      // );
      $url = 'index';
      $aid = $this->getAid($url);
      $this->collectVisiter( $aid );
     // $this->assign( 'arr', json_encode( $arr,JSON_UNESCAPED_UNICODE ) );
      $this->display('index');
    }

    public function icpInfo(){
      $this->display('postIcpInfo');
    }

    public function postIcpInfo(){
      $data = json_encode( array('status'=>1) );

      $this->ajaxReturn($data);
    }
    //稻花香活动
    public function daohuaxiang(){
      $url = 'daohuaxiang';
      $aid = $this->getAid($url);
      $this->collectVisiter( $aid );
      $this->assign( 'aid', $aid );
      $this->display('taohuaxiang');
    }
    public function postUserActive(){
      //数据库CURD操作 M()->add($data);  ->select
      $aid = (int)$_POST['aid'];
      $name = $_POST['name'];
      $kmobile = (int)$_POST['phone'];
      $nick = $_POST['name'];
      $selected = (int)$_POST['selected'];
      $type = 2;


      $data1['aid'] = $aid;
      $data1['num'] = $selected;
      $data1['status'] = 1;

      // $data2=array(
      //   'nick' = $nick;
      // )
      $data2['name']=$name;
      $data2['nick'] = $nick;
      $data2['kmobile'] = $kmobile;
      $data2['type'] = 2;

      $User_dw = M('User_dw');
      $where['kmobile']=$kmobile;
      //where['uid'] =xxx;
      //where['_logic'] ='or' //或者,默认是and
      $data = $User_dw->where($where)->find();
      if($data){
        $data1['uid'] = $data['uid'];
        $User_act_dw = M("User_act_dw");
        $User_act_dw->add($data1);
      }else{
        //$seq = new SeqModel();
        $uid = D('Index')->sequenceNo(1);
        $data1['uid'] = $data2['uid'] = $uid;
        $User_act_dw = M("User_act_dw");
        $User_act_dw->add($data1);
        $User_dw = M('User_dw');
        $User_dw->add($data2);
      }
      $data = json_encode( array('status'=>$data1['uid']) );
      $this->ajaxReturn($data);
    }

    public function regist(){
      $this->display('regist');
    }

    public function collectVisiter($aid=0){
      if($aid){
        $ip = $_SERVER['REMOTE_ADDR'];
        $data['ip'] = $ip;
        $data['aid'] = $aid;
        $data['ldate'] = date(  'Ymd', time() );
        $data['ltime'] = substr(date(  'Ymd His', time() ), 8);
        $Act_browse_dw = M('Act_browse_dw');
        $Act_browse_dw->add($data);
      }
    }
    public function getActiveDW(){
      $Active_dw = M('Active_dw');
      $activeDW = $Active_dw ->select();
      $activeInfo = $activeDW;
      F('user/activeDate', $activeInfo);
      return $activeDW;
    }
    public function getAid($uri){
      $activeDW = F('user/activeDate') ;
      if( ! $activeDW ){
        $activeDW = $this->getActiveDW();
      }
      foreach ($activeDW as $key => $value) {
        if($activeDW[$key]['url'] == $uri ){
          return $activeDW[$key]['aid'];
        }
      };
      return null;
    }
    public function user(){
      //echo C( 'name' ) ;
      //dump($_SERVER);
      $seq = D('User');
      //echo $seq->test();
      $this->display();
    }
}