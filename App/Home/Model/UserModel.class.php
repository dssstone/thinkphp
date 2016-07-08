<?php
namespace Home\Model;

//不需要数据操作，可以设置为虚拟模型或者 IndexModel不要继承Model来 两种方式都可以
//class IndexModel extends Model{
Class UserModel extends \Think\Model {
	Protected $autoCheckFields = false;  //关闭字段信息的自动检测 虚拟模型??
  public function testStr(){
    return sha1('aa');
  }
}

