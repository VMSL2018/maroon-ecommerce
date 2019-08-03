<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Order;
use App\Invoice;
use App\Cart;
use App\Transaction;
use App\ProductVariation;
use View;
use Mail;

class Checkout extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    
    public function __construct()
    {
        /*
            *
            * $this->middleware('auth');
            *
        */

    }
    /*
    |
    |---
    |
    */
    public function index(){
        return abort(404);
    }
    /*
    |
    |---
    |
    */
    public function checkoutData(Request $request){
        
        $sub_total =$request->sub_total; 
        $shipping=$request->shipping_method;
        $discount = $request->discount_amount;
        $order_total =$request->order_total;
        
        return view('frontend.pages.checkout')->with(compact('sub_total','shipping','order_total','discount'));
    }
    /*
    |
    |---
    |
    */
    public function payment(Request $request){
        
        $invoices_id = Invoice::where('status',0)->value('invoice_id');
        $invoice_status_update = Invoice::where('invoice_id',$invoices_id)->update(['status' => 1]);
        Session::put('invoices_id',$invoices_id);
        
        $hashed_invoices_id = \Hashids::encode($invoices_id);
        /*
        |
        |--- Adding data from session cart to main cart
        |
        */
        $cart_data = Session::get('cart');
        
        
        //dd(count($cart_data));
        if(count($cart_data) <=1){
                $cart = new Cart();
                $cart->invoices_id  =   $invoices_id;
                $cart->products_id  =   $cart_data[0]['products_id'];
                $cart->colors_id    =   $cart_data[0]['colors_id'];
                $cart->sizes_id     =   $cart_data[0]['sizes_id'];
                $cart->quantity     =   $cart_data[0]['quantity'];
                $cart->sub_total    =   $cart_data[0]['sub_total'];
                $cart->save();
        }else{
            foreach($cart_data as $value){
                $cart = new Cart();
                $cart->invoices_id  =   $invoices_id;
                $cart->products_id  =   $value['products_id'];
                $cart->colors_id    =   $value['colors_id'];
                $cart->sizes_id     =   $value['sizes_id'];
                $cart->quantity     =   $value['quantity'];
                $cart->sub_total    =   $value['sub_total'];
                $cart->save();
            }
        }
        /*
        |
        |--- Updating Inventory data
        |
        */
        foreach($cart_data as $value){
            $new_quantity = $value['product_variations_quantity'] - $value['quantity'];
            $update_quantity = ProductVariation::where('id',$value['product_variations_id'])->update(['quantity'=>$new_quantity]);   
        }
        /*
        |
        |--- Adding data in Order Table
        |
        */
        $sub_total= intval($request->sub_total);
        $shipping= $request->shipping;
        $discount = $request->discount;
        $order_total = $request->order_total;
        $billing_address = $request->billing_first_name." ".$request->billing_last_name."<br>".$request->billing_your_address."<br>".$request->billing_second_address."<br>".$request->billing_your_email."<br>".$request->billing_phone_number;
        $shipping_address =$request->shipping_first_name." ".$request->shipping_last_name."<br>".$request->shipping_your_address."<br>".$request->shipping_second_address."<br>".$request->shipping_your_email."<br>".$request->shipping_phone_number;
        $payment_method =$request->payment_method;
        $order_status = "Payment Processing";
        
        $new_order                      = new Order;
        $new_order->invoices_id         = $invoices_id ;
        $new_order->sub_total           = $sub_total;
        $new_order->shipping            = $shipping;
        $new_order->discount            = $discount;
        $new_order->order_total         = $order_total;
        $new_order->billing_address     = $billing_address;
        $new_order->shipping_address    = $shipping_address;
        $new_order->payment_method      = $payment_method;
        $new_order->order_status        = $order_status;
        
        $place_order = $new_order->save();
        
        
        if($place_order){
            
            
            if($new_order->payment_method =="online"){
                /*---------------------------------------------------------*/
                	$ch = curl_init();
	   
                    $options = array( 'Merchant_Username'=>'spaytest', 'Merchant_password'=>'pass1234');  
                	$uniq_transaction_key='NOK'.time();//Given By Shurjumukhi Limited  
                	$amount=$new_order->order_total;
                	$clientIP = '127.0.0.1';//getRealIpAddr();// $_SERVER['REMOTE_ADDR'];exit("IP");
                				
                	$xml_data = 'spdata=<?xml version="1.0" encoding="utf-8"?>
                				<shurjoPay><merchantName>'.$options['Merchant_Username'].'</merchantName>
                				<merchantPass>'.$options['Merchant_password'].'</merchantPass>
                				<userIP>'.$clientIP.'</userIP>
                				<uniqID>'.$uniq_transaction_key.'</uniqID>
                				<totalAmount>'.$amount.'</totalAmount>
                				<paymentOption>shurjopay</paymentOption>								
                				<returnURL>https://maroon-akandshuvo.c9users.io/paymentreturn</returnURL></shurjoPay>'; 			
                	$url = "https://shurjotest.com/sp-data.php"; 
                	
                	
                	
                	  curl_setopt($ch,CURLOPT_URL,$url);
                	  curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
                	  curl_setopt($ch,CURLOPT_POSTFIELDS,$xml_data);
                	  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
                	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                	  $response = curl_exec($ch);
                	  print_r($response);
                	  curl_close ($ch);
                /*--------------------------------------------------------------*/
                    Session::put('shipping_phone_number',$request->shipping_phone_number);
                    Session::put('order_total',$request->order_total);
                /*-------------------------------------------------------------*/
                	  
                	  
                	  
            }
            
            
            if($new_order->payment_method =="cash"){
                /*
                |
                |--- Adding data from session cart to main cart
                |
                */
                /*
                $cart_data = Session::get('cart');
                foreach($cart_data as $value){
                    $cart = new Cart();
                    $cart->invoices_id  =   $invoices_id;
                    $cart->products_id  =   $value['products_id'];
                    $cart->colors_id    =   $value['colors_id'];
                    $cart->sizes_id     =   $value['sizes_id'];
                    $cart->quantity     =   $value['quantity'];
                    $cart->sub_total    =   $value['sub_total'];
                    $cart->save();
                }
                */
                /*
                |
                |--- Updating Inventory data
                |
                */
                foreach($cart_data as $value){
                    $new_quantity = $value['product_variations_quantity'] - $value['quantity'];
                    $update_quantity = ProductVariation::where('id',$value['product_variations_id'])->update(['quantity'=>$new_quantity]);   
                }
                /*
                |
                |---Update Order Status
                |
                */
                $order_status           = "Cash on delivery";
                $update_order_status    = Order::where('invoices_id',$invoices_id)->update(['order_status'=>$order_status]); 
                
                /*
                |
                |---SENDING SMS
                |
                */
                /*
                $message = $invoices_id;
    			$url="http://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=01534653592&password=8d2ab8d870266d4a1e03029bd616d54e&MsgType=TEXT&receiver=8801534653592&message=".$message; 
    			$crl = curl_init(); 
    			curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE); 
    			curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2); 
    			curl_setopt($crl,CURLOPT_URL,$url);  
    			curl_setopt($crl,CURLOPT_HEADER,0); 
    			curl_setopt($crl,CURLOPT_RETURNTRANSFER,1); 
    			curl_setopt($crl,CURLOPT_POST,1); 
    			$response = curl_exec($crl); 
    			curl_close($crl); 
    			echo "<pre>".$response."</pre>"; 
                /*
                |
                |---SENDING EMAIL
                |
                */
                
                //dd($request->billing_email);
                $mail   = $request->billing_email;
                $name   = $request->billing_first_name.$request->billing_last_name;
                $data = array('name'=>$name,"invoice"=>$invoices_id,"invoice_encrypted"=>$hashed_invoices_id);

                
                Mail::send(['text'=>'purchasemail'], $data, function($message) use($mail,$name) {
                    $message->to($mail, $name)->subject('Thank you for Purchasing from MAROON');
                    $message->from('maroon.fashion.bd@gmail.com','MAROON-House of Attire');
                });
                                
                /*
                |
                |--- Flushing session data of a specific key
                |
                */
                Session::flush('cart');
                Session::flush('invoices_id');
                
                /*
                |
                |--- Hashing Invoice ID for Security
                |--- Redirecting to invoice Page
                |
                */
                
                
                return redirect('invoice/'.$hashed_invoices_id);
            }
            
        }
        
    }
    
    
    /*
    |
    |---
    |
    */
    
    public function paymentreturn(){
        
    	if(count($_POST)>0){
        		$response_encrypted = $_POST['spdata'];
        		
        		$fp = fopen('return.txt', 'a');
        		$e = $response_encrypted."\n";
        		fwrite($fp,$response_encrypted);
        		fclose($fp);
        		
        		$response_decrypted = file_get_contents("http://shurjotest.com/merchant/decrypt.php?data=".$response_encrypted);		
        		
        		$fp = fopen('return-decrypt.txt', 'a');
        		$e = $response_decrypted."\n";
        		fwrite($fp,$response_decrypted);
        		fclose($fp);
        		
        		$data= simplexml_load_string($response_decrypted) or die("Error: Cannot create object");
        		
        		
        			$tx_id = $data->txID;
        			$bank_tx_id = $data->bankTxID;
        			$bank_status = $data->bankTxStatus;
        			$sp_code = $data->spCode;
        			$sp_code_des = $data->spCodeDes;
        			$sp_payment_option = $data->paymentOption;
        			
        		$fp = fopen('return.txt', 'a');
        		$d = $tx_id.' | '.$bank_tx_id.' | '.$bank_status.' | '.$sp_code.' | '.$sp_code_des.' | '.$sp_payment_option."\n";
        		fwrite($fp,$d);
        		fclose($fp);		
        
        			switch($sp_code) {
        				case '000':
        					$res = array('status'=>true,'msg'=>'success');
        					break;
        				case '100':
        					$res = array('status'=>false,'msg'=>'Transaction Decline');
        					break;            
        				case '109':
        					$res = array('status'=>false,'msg'=>'Invalid Merchant');
        					break;            
        				case '201':
        					$res = array('status'=>false,'msg'=>'Card Expired');
        					break;            
        				case '202':
        					$res = array('status'=>false,'msg'=>'Suspected Fraud');
        					break;            
        				case '300':
        					$res = array('status'=>false,'msg'=>'Action Successful');
        					break;
        				case '304':
        					$res = array('status'=>false,'msg'=>'File Edit Error');
        					break;            
        				case '700':
        					$res = array('status'=>false,'msg'=>'Accepted');
        					break;            
        				case '096':
        					$res = array('status'=>false,'msg'=>'Transaction Failed');
        					break;            
        				case '601':
        					$res = array('status'=>false,'msg'=>'Transaction not permitted to cardholder');
        					break;            
        				case '603':
        					$res = array('status'=>false,'msg'=>'Invalid Card number');
        				default:
        					$res = array('status'=>false,'msg'=>'Unknow Error Occured.');
        					break;            
        			}
        
        
        	if($res['status']) 
        	{
        		$paymentStatus = 'Transaction is Successfull!';
            }
        	else 
        	{
        		$paymentStatus = 'Transaction is Failed!';	
            }
        
        }
        
        
        
        $invoices_id = Session::get('invoices_id');
        $merchant_transaction_id = $tx_id;
        $gateway_transaction_id = $bank_tx_id;
        $payment_status = $bank_status;
        $payment_method = $sp_payment_option;
        
        
        $transaction_record = new Transaction();
        $transaction_record->invoices_id                =   $invoices_id ;
        $transaction_record->merchant_transaction_id    =   $merchant_transaction_id;
        $transaction_record->gateway_transaction_id     =   $gateway_transaction_id;
        $transaction_record->payment_status             =   $payment_status;
        $transaction_record->payment_method             =   $payment_method;
        
        $transaction_record->save();
        
        
        
        
        if($payment_status != 'CANCEL'){
            /*
            |
            |--- Sending SMS
            |
            */
    		$user = "Maroon";  
    		$pass = "Maroon123";  
    		$sid = "MaroonBrandEng";
    		$phone = Session::get('shipping_phone_number') ;
    		$order_total = Session::get('order_total') ;
    		$message = "New order has been placed.Amount#".$order_total."BDT. Order ID#".$invoices_id;
    		$url="http://sms.sslwireless.com/pushapi/dynamic/server.php"; 
    		$param="user=$user&pass=$pass&sms[0][0]=$phone&sms[0][1]=".urlencode($message)."&sid=$sid"; 
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

    		
            $order_status           = "Payment Complete";
            $update_order_status    = Order::where('invoices_id',$invoices_id)->update(['order_status'=>$order_status]);   
            
            /*
            $mail   = $request->billing_email;
            $name   = $request->billing_first_name.$request->billing_last_name;
            $data = array('name'=>$name,"invoice"=>$invoices_id,"invoice_encrypted"=>$hashed_invoices_id);
            
            
            Mail::send(['text'=>'purchasemail'], $data, function($message) use($mail,$name) {
            $message->to($mail, $name)->subject('Thank you for Purchasing from MAROON');
            $message->from('maroon.fashion.bd@gmail.com','MAROON-House of Attire');
            });
            */
            
            /*
            |
            |--- Flushing session data of a specific key
            |
            */
            Session::flush('cart');
            Session::flush('invoices_id');
            
            /*
            |
            |--- Hashing Invoice ID for Security
            |--- Redirecting to invoice Page
            |
            */
            $hashed_invoices_id = \Hashids::encode($invoices_id);
            
            return redirect('invoice/'.$hashed_invoices_id);
    		
    		//return to invoice route
       }
       if($payment_status == 'CANCEL'){
        /*
        |
        |--- Updating Inventory data
        |
        */
        $cart_data = Session::get('cart');
        foreach($cart_data as $value){
            $product_variations_quantity    = ProductVariation::where('id',$value['product_variations_id'])->value('quantity');
            $new_quantity                   =  $product_variations_quantity+$value['quantity'];
            $update_quantity                = ProductVariation::where('id',$value['product_variations_id'])->update(['quantity'=>$new_quantity]);   
        }
        /*
        |
        |---Update Order Status
        |
        */
        $order_status           = "Cancel";
        $update_order_status    = Order::where('invoices_id',$invoices_id)->update(['order_status'=>$order_status]);  
        /*
        |
        |--- Flushing session data of a specific key
        |
        */
        //Session::flush('cart');
        Session::flush('invoices_id');
        
        return redirect('cart');
       }

    }
}
