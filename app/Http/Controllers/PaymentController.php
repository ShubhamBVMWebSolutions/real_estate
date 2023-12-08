<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Payment;
use Crypt;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            if (Auth::user() != null) {
                $response=$this->gateway->purchase(array(
                    'id'=>$request->id,
                    'amount'=> $request->amount,
                    'currency'=>env('PAYPAL_CURRENCY'),
                    'returnUrl'=>url('success?id=' . $request->id),
                    'cancelUrl'=>url('error?id='.$request->id)

                ))->send();
                if ($response->isRedirect()) {
                    $response->redirect();
                }else{
                    return $response->getMessage();
                }
            } else {
                Alert::error('Login Required', 'Please Login First');
                return redirect()->route('login');
            }
            
        } catch (Exception $e) {
            echo($e);
            return $e->getMessage();
        }
    }

     public function success(Request $request)
    {
        $id = $request->input('id'); 
        if ($request->input('paymentId') && $request->input('PayerID') ) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'=> $request->input('PayerID'),
                'transactionReference'=>$request->input('paymentId')
            ));

            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr =$response->getData();
                $payment = new Payment;
                $payment->payment_id=$arr['id'];
                $payment->payer_id=$arr['payer']['payer_info']['payer_id'];
                $payment->payer_email=$arr['payer']['payer_info']['email'];
                $payment->amount=$arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status=$arr['state'];
                $payment->save();
                Alert::success('Transaction Completed',"Your Transaction Id is :" .$arr['id']."Our Experts will Get Back To you soon");
                return redirect()->route('details',['id'=> Crypt::encrypt($request->input('id'))]);
            }else{
                Alert::error('Opps..','Something Went Wrong'.$response->getMessage());
               return redirect()->route('details',['id'=> Crypt::encrypt($request->input('id'))]);
            }
        }else{
            Alert::error('Error','Transaction was Declined. Try Again Later');
           return redirect()->route('details',['id'=> Crypt::encrypt($request->input('id'))]);
        }
    }

    public function error(Request $request)
    {   
        Alert::error('Error','Payment Was Cancled !' );
        return redirect()->route('details',['id'=> Crypt::encrypt($request->input('id'))]);
    }
}
