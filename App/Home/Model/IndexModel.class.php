<?php
namespace Home\Model;

use Think\Model;
//不需要数据操作，可以设置为虚拟模型或者 IndexModel不要继承Model来 两种方式都可以
//class IndexModel extends Model{
class IndexModel{
	//Protected $autoCheckFields = false;  //关闭字段信息的自动检测 虚拟模型??
	public function http_curl($url, $type='get',$res='json',$arr='', $header=''){
    $ch = curl_init();   
    // 添加apikey到header
    if($header){
    	curl_setopt($ch, CURLOPT_HTTPHEADER , $header);
    }
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if( $type == "post" ){
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
    }
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $out = curl_exec($ch);
    curl_close( $ch );
    if( curl_errno( $ch ) ){
      return json_decode(curl_error($ch), true) ;
    }
    if( $res == 'json' ){
    	return json_decode($out, ture);
    }
    //return 'aa';
	}
  public function sequenceNo($id=0){
    if(!$id){
      return ;
    }
    $where['mid'] = $id;
    $data = M('Seq_dw')->where( $where )->select();
    if(!!count( $data )){
      $date['mid'] = $id;
      $date['seq'] = $data[0]['seq'] + 1;
      M('Seq_dw')->where( $where )->save($date);
    }else{
      $data =array(
        'mid'=>$id,
        'seq'=>100
      );
      M('Seq_dw')->add($data);
    }
    return $date['seq'];
  }
  public function test(){
    return sha1('aa');
  }
}

