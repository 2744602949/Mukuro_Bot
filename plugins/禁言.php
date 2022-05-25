<?php
use PHProbot\Api;
use PHProbot\GT;

$return=PHProbot\Api::MsgS($MsgS_Data=["msg"=>"禁言","data"=>$msg]);
//禁言#群号#QQ号#时间
if ($return!=null){
$return_data=explode("#",$return);
if (count($return_data)==4){
$set_array = [
"qun"=>$return_data[1],
//执行人
"qq"=>$qq,
//被禁言的QQ号
"ban_user"=>$return_data[2],
//禁言时间
"time"=>$return_data[3]
];
if (PHProbot\GT::ban($set_array)=="OK"){
$Api_data = array(
"qun"=>$qun,
"qq"=>$qq,
"msg"=>"禁言成功",
"S_type"=>$msg_type,
"msg_id"=>$msg_id
);
$data=PHProbot\Api::send($Api_data);
}
}
if (count($return_data)==3){
$set_array = [
"qun"=>$qun,
//执行人
"qq"=>$qq,
//被禁言的QQ号
"ban_user"=>$return_data[1],
//禁言时间
"time"=>$return_data[2]
];
if (PHProbot\GT::ban($set_array)=="OK"){
$Api_data = array(
"qun"=>$qun,
"qq"=>$qq,
"msg"=>"禁言成功",
"S_type"=>$msg_type,
"msg_id"=>$msg_id
);
$data=PHProbot\Api::send($Api_data);
}
}

$return_data=explode(",qq=",$return);
$return_data1=explode("]",$return_data[1]);
if (count($return_data1)==2){
$return_time=str_replace(' ', '', $return_data1[1]);
$set_array = [
"qun"=>$qun,
//执行人
"qq"=>$qq,
//被禁言的QQ号
"ban_user"=>$return_data1[0],
//禁言时间
"time"=>$return_time
];
if (PHProbot\GT::ban($set_array)=="OK"){
if ($return_time==0){
$Api_data = array(
"qun"=>$qun,
"qq"=>$qq,
"msg"=>"解禁成功",
"S_type"=>$msg_type,
"msg_id"=>$msg_id
);
}else{
$Api_data = array(
"qun"=>$qun,
"qq"=>$qq,
"msg"=>"禁言成功",
"S_type"=>$msg_type,
"msg_id"=>$msg_id
);
}
$data=PHProbot\Api::send($Api_data);
}
}
}
