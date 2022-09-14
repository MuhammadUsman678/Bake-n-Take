<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderProduct;
use App\ShopProduct;
use App\notification_user;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\mail\ordermail;

class CheckOutController extends Controller
{
    public function checkout(Request $request){
        $user=Auth::user();
        $cartItems=Cart::with('product')->where('user_id',(auth()->user()->id))->get();
        $data=[];
        foreach($cartItems as $key=>$cart){
            $data[$key]['name']=$cart->product->product_name;
            $data[$key]['quantity']=$cart->quantity;
            $data[$key]['price']=$cart->product->price;
            $data[$key]['slug']=$cart->product->slug;
            $data[$key]['image']=$cart->product->getFirstMediaUrl('images','thumb') ? $cart->product->getFirstMediaUrl('images','thumb') : 'https://via.placeholder.com/60?text=No+Image+Found';
        }
        $products=$data;
        return view('checkout',compact('user','products'));
    }

    public function order(Request $request){
        $this->validate($request,
        [
            'full_name'=>'required|max:255',
            'country'=>'required|max:255',
            'city'=>'required|max:255',
            'state'=>'required|max:255',
            'street'=>'required|max:255',
            'post_code'=>'required|max:255',
            'phone'=>'required|max:255',
            'email'=>'required|max:255',
            'method'=>'required'
        ],
        ['method.required'=>'Please Choose Payment Method']
         );
		$data = $request->input();
      
		// print_r($data);
        $cartItems=Cart::with('product:id,price')->where('user_id',(auth()->user()->id))->get();
        $total_price=0;
        $pivot_data=[];
        foreach($cartItems as $key=>$cart){
            $pivot_data[$key]['quantity']=$cart->quantity;
            $pivot_data[$key]['product_id']=$cart->product->id;
            $pivot_data[$key]['price']=$cart->product->price;
            $total_price +=$cart->quantity*$cart->product->price;
        }
       
        $price=$total_price;
        $adminamount=$price*5/100;
        // dd($adminamount);
		
        $order_number=(string) Str::uuid();
if($request->method=='jazzcash'){
    $status='new';
    $payment_status='unpaid';
}elseif($request->method=='stripe'){
    $status='new';
    $payment_status='paid';
}else{
    $status='new';
    $payment_status='unpaid';
}
		$values = array(
			'sub_total'   => $price,
			'total_amount' => $price,
            'adminamount' => $adminamount,
			'description' => 'Stripe',
			'status' 	  => $status,
            'delivery_date'=>$request->delivery_date?? now(),
			'payment_status' 	  => $payment_status,
            'full_name'   =>$request->full_name?? '',
            'country'     =>$request->country?? '',
            'city'        =>$request->city?? '',
            'state'       =>$request->state?? '',
            'street'      =>$request->street?? '',
            'post_code'   =>$request->post_code?? '',
            'phone'       =>$request->phone?? '',
            'email'       =>$request->email?? '',
            'payment_method'      =>$request->method,
            'user_id'      =>auth()->user()->id,
            'order_number'      =>$order_number,
		);
		$order=Order::create($values);
        foreach ($pivot_data as $key => $value) {
            $pivot_data[$key]['order_id']=$order->id;
            $pivot_data[$key]['status']=$status;
         } 
       $oo=OrderProduct::insert($pivot_data);
       $details ='You have new Order Please check your orders';
       foreach($cartItems as $row)
       {
           $shop=ShopProduct::where('id',$row->product->id)->first();
         
           $user=Shop::where('id',$shop->shop_id)->first();
           $this->userNotify($user->user_id,$details);
       }
        Cart::with('product:id,price')->where('user_id',(auth()->user()->id))->delete();
      

		return redirect()->route('front.orders');
    }
    function userNotify($id,$details)
    {
        $notify = new notification_user();
        $notify->user_id =$id;
        $notify->data = $details;
        $notify->save();
    }

    public function jazzcashOrder(Request $request){
        $this->validate($request,
        [
            'full_name'=>'required|max:255',
            'country'=>'required|max:255',
            'city'=>'required|max:255',
            'state'=>'required|max:255',
            'street'=>'required|max:255',
            'post_code'=>'required|max:255',
            'phone'=>'required|max:255',
            'email'=>'required|max:255',
            'method'=>'required'
        ],
        ['method.required'=>'Please Choose Payment Method']
         );
		$data = $request->input();
		// print_r($data);
        $cartItems=Cart::with('product:id,price')->where('user_id',(auth()->user()->id))->get();
        $total_price=0;
        $pivot_data=[];
        foreach($cartItems as $key=>$cart){
            $pivot_data[$key]['quantity']=$cart->quantity;
            $pivot_data[$key]['product_id']=$cart->product->id;
            $total_price +=$cart->quantity*$cart->product->price;
        }
        $price=$total_price;
		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
		//1.
		//get formatted price. remove period(.) from the price
		$temp_amount 	= $price*100;
		$amount_array 	= explode('.', $temp_amount);
		$pp_Amount 		= $amount_array[0];
		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
		//2.
		//get the current date and time
		//be careful set TimeZone in config/app.php
		$DateTime 		= new \DateTime();
		$pp_TxnDateTime = $DateTime->format('YmdHis');
		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
		//3.
		//to make expiry date and time add one hour to current date and time
		$ExpiryDateTime = $DateTime;
		$ExpiryDateTime->modify('+' . 1 . ' hours');
		$pp_TxnExpiryDateTime = $ExpiryDateTime->format('YmdHis');
		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
		//4.
		//make unique transaction id using current date
		$pp_TxnRefNo = 'T'.$pp_TxnDateTime;
		//NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
        // $method=$request->method=='mobile'?'MWALLET':'MPAY';
        $method='MWALLET';
		//--------------------------------------------------------------------------------
		//$post_data
        $order_number=(string) Str::uuid();
		$post_data =  array(
			"pp_Version" 			=> Config::get('constants.jazzcash.VERSION'),
			"pp_TxnType" 			=> $method,
			"pp_Language" 			=> Config::get('constants.jazzcash.LANGUAGE'),
			"pp_MerchantID" 		=> Config::get('constants.jazzcash.MERCHANT_ID'),
			"pp_SubMerchantID" 		=> "",
			"pp_Password" 			=> Config::get('constants.jazzcash.PASSWORD'),
			"pp_BankID" 			=> "TBANK",
			"pp_ProductID" 			=> "RETL",
			"pp_TxnRefNo" 			=> $pp_TxnRefNo,
			"pp_Amount" 			=> $pp_Amount,
			"pp_TxnCurrency" 		=> Config::get('constants.jazzcash.CURRENCY_CODE'),
			"pp_TxnDateTime" 		=> $pp_TxnDateTime,
			"pp_BillReference" 		=> "billRef",
			"pp_Description" 		=> "Purchasing From Bake N Take ",
			"pp_TxnExpiryDateTime" 	=> $pp_TxnExpiryDateTime,
			"pp_ReturnURL" 			=> Config::get('constants.jazzcash.RETURN_URL'),
			"pp_SecureHash" 		=> "",
			"ppmpf_1" 				=> auth()->user()->id,
			"ppmpf_2" 				=> "2",
			"ppmpf_3" 				=> "3",
			"ppmpf_4" 				=> "4",
			"ppmpf_5" 				=> "5",
		);

		$pp_SecureHash = $this->get_SecureHash($post_data);

		$post_data['pp_SecureHash'] = $pp_SecureHash;

		$values = array(
			'TxnRefNo'    => $post_data['pp_TxnRefNo'],
			'sub_total'   => $price,
			'total_amount' => $price,
			'description' => $post_data['pp_Description'],
			'status' 	  => 'process',
			'payment_status' 	  => 'unpaid',
            'full_name'   =>$request->full_name?? '',
            'country'     =>$request->country?? '',
            'city'        =>$request->city?? '',
            'state'       =>$request->state?? '',
            'street'      =>$request->street?? '',
            'post_code'   =>$request->post_code?? '',
            'phone'       =>$request->phone?? '',
            'email'       =>$request->email?? '',
            'payment_method'      =>$request->method,
            'user_id'      =>auth()->user()->id,
            'order_number'      =>$order_number,
		);
    //    dd($post_data);
		$order=Order::create($values);
        foreach ($pivot_data as $key => $value) {
            $pivot_data[$key]['order_id']=$order->id;
         } 
        OrderProduct::insert($pivot_data);
        $maildetail=[
            'username'=>$request->name,
         
        ];
        \Mail::to($request->email)->send(new ordermail($maildetail));
		Session::put('post_data',$post_data);
		return view('do_checkout_v');
    }

	private function get_SecureHash($data_array)
	{
		ksort($data_array);

		$str = '';
		foreach($data_array as $key => $value){
			if(!empty($value)){
				$str = $str . '&' . $value;
			}
		}

		$str = Config::get('constants.jazzcash.INTEGERITY_SALT').$str;

		$pp_SecureHash = hash_hmac('sha256', $str, Config::get('constants.jazzcash.INTEGERITY_SALT'));

		return $pp_SecureHash;
	}


	public function paymentStatus(Request $request)
	{
		$response = $request->input();
        dd($response);
        

        $amount=$response['pp_Amount']/100;

		if($response['pp_ResponseCode'] == '000')
		{
			$response['pp_ResponseMessage'] = 'Your Payment has been Successful';
			// $values = array('status' => 'completed');
			DB::table('order')
				->where('TxnRefNo',$response['pp_TxnRefNo'])->update(['status' => 'completed']);
            $order=DB::table('order')->where('TxnRefNo',$response['pp_TxnRefNo'])->first();
            $user=User::find($response['ppmpf_1']);
            $student=Student::updateOrCreate(['name'=>$user->name,'email'=>$user->email,'user_id'=>$user->id]);
            $user->update(['user_type'=>'Student']);
            $record=Enrollement::select('enrollment_no')->latest()->first();
            $enrollement_no=0;
            if($record->count() == 0)
            {
                $enrollement_no="EZ-".date('Y')."-0001";
            }
            else
            {
                $expNum = explode('-', $record->enrollment_no);
                $enrollement_no =  $expNum[2]+1;
                $enrollement_no =  $expNum[0].'-'.date('Y').'-'.$enrollement_no;
            }
            // dd($enrollement_no);
            $enroll=Enrollement::updateOrCreate(['enrollment_no'=>$enrollement_no,'course_id'=>$order->course_id,'batch_id'=>$order->batch_id,'user_id'=>$response['ppmpf_1']]);
            $course=Course::select('title')->find($order->course_id);
            $batch=batch::select('title','instructor_id')->find($order->batch_id);
            CoursePurchaseHistory::updateOrCreate(['amount'=>$amount,'payment_method'=>'JazzCash','enrollment_id'=>$enroll->id]);
            // $student=User::select('email')->find($response['ppmpf_1']);
            $instructor=Instructor::select('email','user_id')->find($batch->instructor_id);
            $detail_in = [
                'course' => $course->title,
                'batch' => $batch->title,

            ];
            $message1 = [
                'body' => 'Congratulation  For Enrollement In   Course => '.$course->title,
            ];

            // return $students;
            $this->userNotify($response['ppmpf_1'], $message1);

            $detail_admin = [
                'body' => 'Someone Enroolled in Course . '.$course->title.' Batch '.$batch->title,
            ];
            $this->userNotify($instructor->user_id, $detail_admin);
            $user2=User::where('user_type','Admin')->get();
            foreach($user2 as $row)
            {
                $this->userNotify($row->id,$detail_admin);
            }

                Notification::route('mail', $student->email) //Sending mail to STudents
                            ->notify(new Enrollment($detail_in));
                Notification::route('mail', $instructor->email) //Sending mail to STudents
                            ->notify(new EnrollmentNotifyInstructor($detail_in));

		}

		return view('site.front.payment-status',['response'=>$response]);
	}
}
