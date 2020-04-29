<?php
namespace App\MyClasses;
class MyService implements MyServiceInterface{
  //クラスのメンバ変数はthisを使う
  private $serial;
  private $id = -1;
  private $msg = 'no id...';
  private $data = ['Hello','Welcome','Bye'];

  /*
  public function __construct(int $id = -1){
    // $this->msg = 'Hello This is MyService';
    // $this->data = ['Hello','Welcome','Bye'];
    // if($id >= 0){
    //   $this->id = $id;
    //   $this->msg = 'select: '.$this->data[$id];
    // }
  }
  */
  /*
  public function __construct($id){
    $this->setId($id);
    $this->serial = rand();
    echo "「".$this->serial."」";
  }
  */

  public function __construct(){
    $this->serial = rand();
    echo "「".$this->serial."」";
  }

  public function setId($id){
    $this->id = $id;
    if($id >= 0 && $id < count($this->data)){
      //$this->msg = 'select id:'.$id.' data:'.$this->data[$id];
      $this->msg = "select id:".$id.' data:"'.$this->data[$id].'"';
    }
  }
  public function getid(){
    return $this->id;
  }
  public function say(){
    return $this->msg;
  }

  public function data(int $id){
    return $this->data[$id];
  }

  public function alldata(){
    return $this->data;
  }
}
?>
