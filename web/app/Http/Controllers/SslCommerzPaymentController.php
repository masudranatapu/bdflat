<?php

namespace App\Http\Controllers;

use App\Models\CustomerPayment;
use Brian2694\Toastr\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Illuminate\Support\Facades\Auth;

class SslCommerzPaymentController extends Controller
{
    protected $payment;
    protected $resp;

    public function __construct(CustomerPayment $payment)
    {
        $this->middleware('auth');
        $this->payment = $payment;
    }

    public function index(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
        ]);

        $this->resp = $this->payment->storePayment($request);

        if ($this->resp->status) {
            $post_data = array();
            $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = uniqid(); // tran_id must be unique

            # CUSTOMER INFORMATION
            $user = Auth::user();
            $post_data['cus_name'] = $user->NAME;
            $post_data['cus_email'] = $user->EMAIL;
            $post_data['cus_add1'] = 'Customer Address';
            $post_data['cus_add2'] = "";
            $post_data['cus_city'] = "";
            $post_data['cus_state'] = "";
            $post_data['cus_postcode'] = "";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = $user->MOBILE_NO;
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "Store Test";
            $post_data['ship_add1'] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_phone'] = "";
            $post_data['ship_country'] = "Bangladesh";

            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = "Recharge";
            $post_data['product_category'] = "Balance";
            $post_data['product_profile'] = "physical-goods";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = $this->resp->data->PK_NO;
            $post_data['value_b'] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";


            $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payment gateway here )
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
            }
        } else {
            Toastr()->error($this->resp->msg);
            return redirect()->route($this->resp->redirect_to);
        }
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        $payment = $this->payment->getPayment($request->input('value_a'));
        $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);
        DB::beginTransaction();
        if ($validation == TRUE) {
            try {
                $payment->PAYMENT_CONFIRMED_STATUS = 1; // Payment confirmed
                $payment->SLIP_NUMBER = $tran_id;
                $payment->PAYMENT_NOTE = $request->input('card_type');
                $payment->save();

                Toastr()->success('Payment successful !');
            } catch (\Exception $e) {
                DB::rollBack();
                Toastr()->error('Something went wrong !');
            }
        } else {
            Toastr()->error('Payment unsuccessful !');
            try {
                $payment->delete();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }

        DB::commit();
        return redirect()->route('recharge-balance');
    }

    public function fail(Request $request)
    {
        Toastr()->error('Payment unsuccessful !');
        DB::beginTransaction();
        try {
            $payment = $this->payment->getPayment($request->input('value_a'));
            $payment->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr()->error('Something went wrong! Please report to administrator.');
        }

        DB::commit();
        return redirect()->route('recharge-balance');
    }

    public function cancel(Request $request)
    {
        Toastr()->warning('Payment cancelled !');
        DB::beginTransaction();
        try {
            $payment = $this->payment->getPayment($request->input('value_a'));
            $payment->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr()->error('Something went wrong! Please report to administrator.');
        }

        DB::commit();
        return redirect()->route('recharge-balance');
    }
}
