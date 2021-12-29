<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTransaction;
use App\Models\Product;
use App\Models\ProductCoupon;
use App\Models\User;
use App\Notifications\Frontend\Customer\OrderCreatedNotification;
use App\Notifications\Frontend\Customer\OrderThanksNotification;
use App\Services\OmnipayService;
use App\Services\OrderService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function checkout_now(Request $request)
    {
        $order = (new OrderService)->createOrder($request->except(['_token', 'submit']));
        if (\Str::lower($request->payment_method_code) == 'ppex') {
            $omniPay = new OmnipayService('PayPal_Express');
            $response = $omniPay->purchase([
                'amount' => $order->total,
                'transactionId' => $order->ref_id,
                'currency' => $order->currency,
                'cancelUrl' => $omniPay->getCancelUrl($order->id),
                'returnUrl' => $omniPay->getReturnUrl($order->id),
            ]);
            if ($response->isRedirect()) {
                $response->redirect();
            }
            toast($response->getMessage(), 'error');
        } else {
            return redirect()->route('checkout.complete', $order->id);
        }
        
        return redirect()->route('frontend.index');
    }

    public function cancelled($order_id)
    {
        $order = Order::find($order_id);
        $order->update([
            'order_status' => Order::CANCELED
        ]);
        $order->products()->each(function ($order_product) {
            $product = Product::whereId($order_product->pivot->product_id)->first();
            $product->update([
                'quantity' => $product->quantity + $order_product->pivot->quantity
            ]);
        });

        toast('You have cancelled your order payment!', 'error');
        return redirect()->route('frontend.index');
    }

    public function completed($order_id)
    {
        $order = Order::with('products', 'user', 'payment_method')->find($order_id);

        if (\Str::lower($order->payment_method()->first()->code) == "ppex") {
            $omniPay = new OmnipayService('PayPal_Express');
            $response = $omniPay->complete([
                'amount' => $order->total,
                'transactionId' => $order->ref_id,
                'currency' => $order->currency,
                'cancelUrl' => $omniPay->getCancelUrl($order->id),
                'returnUrl' => $omniPay->getReturnUrl($order->id),
                'notifyUrl' => $omniPay->getNotifyUrl($order->id),
            ]);
            $transaction_number = $response->getTransactionReference();
        } else {
            $COD = true;
            $transaction_number = '';
        }
       

        if (isset($COD) || $response->isSuccessful() ) {
            $order->update(['order_status' => Order::PAYMENT_COMPLETED]);
            $order->transactions()->create([
                'transaction' => OrderTransaction::PAYMENT_COMPLETED,
                'transaction_number' => $transaction_number,
                'payment_result' => 'success'
            ]);

            if (session()->has('coupon')) {
                $coupon = ProductCoupon::whereCode(session()->get('coupon')['code'])->first();
                $coupon->increment('used_times');
            }

            Cart::instance('default')->destroy();

            session()->forget([
                'coupon',
                'saved_customer_address_id',
                'saved_shipping_company_id',
                'saved_payment_method_id',
                'shipping',
            ]);

            // 當有新訂單產生，發送通知給 admin & supervisor
            /*
            User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'supervisor']);
            })->each(function ($admin, $key) use ($order) {
                $admin->notify(new OrderCreatedNotification($order));
            });
            */  


            $data = $order->toArray();
            $data['currency_symbol'] = $order->currency == 'NTD' ? '$' : $order->currency;
            //$pdf = PDF::loadView('layouts.invoice', $data);
            //$saved_file = storage_path('app/pdf/files/' . $data['ref_id'] . '.pdf');
            //$pdf->save($saved_file);

            $customer = User::find($order->user_id);
            //$customer->notify(new OrderThanksNotification($order, $saved_file));

            toast(__('Your order has been completed')."!", 'success');
            //toast('Your recent payment is successful with reference code: ' . $transaction_number, 'success');
            return redirect()->route('frontend.index');
        }
    }

    public function webhook($order, $env)
    {
        //
    }
}
