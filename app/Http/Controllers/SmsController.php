<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendsms($mobile,$sms){

        $mobile = $mobile;
        $sms = $sms;

        $user = "vmsl";
		$pass = "t93<2L82"; 
		$sid = "vmsleng"; 
		$url="http://sms.sslwireless.com/pushapi/dynamic/server.php"; 
		$param="user=$user&pass=$pass&sms[0][0]= $mobile&sms[0][1]=".urlencode($sms)."&sid=$sid"; 
		$crl = curl_init(); 
		curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE); 
		curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2); 
		curl_setopt($crl,CURLOPT_URL,$url); 
		curl_setopt($crl,CURLOPT_HEADER,0);
		curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($crl,CURLOPT_POST,1); 
		curl_setopt($crl,CURLOPT_POSTFIELDS,$param); 
		$response = curl_exec($crl);
		curl_close($crl); 
		//echo $response;
    }
}
