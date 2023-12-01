<?php

namespace App\Http\Controllers;

use App\Models\CredentialStripe;
use App\Models\Order;
use App\Models\OrderAdmin;
use App\Models\Transation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function create($id_order)
    {
        $main_order = OrderAdmin::find($id_order);
        return view('Payments.Strip', compact('main_order'));
    }


    public function CreatePaymentIntent($order_id)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => OrderAdmin::find($order_id)->total,
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];

        // ________________transaction pending________________________________________

        $this->create_transaction(OrderAdmin::find($order_id)->total, $paymentIntent, $order_id, "pending");
        // ________________________________________________________
        return $output;
    }

    public function retrive(Request $request, $id_order)
    {

        try {

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $order_details =  $stripe->paymentIntents->retrieve(
                $request->payment_intent,
                []
            );

            if ($order_details->status == "succeeded") {
                // ________________update order Status________________________________________

                $this->update_order($id_order, $order_details);
                // ________________transaction Completed________________________________________

                $this->create_transaction($order_details->amount, $order_details, $id_order, "completed");

                $this->update_status_orders($id_order);

                sweetalert()->addSuccess('Your Order Payed Sucessfully');

                return redirect('products_list');
            } else {

                sweetalert()->adderror('Faild to Paid Order');
                return redirect()->back();
            }
        } catch (\Exception $e) {

            sweetalert()->adderror('Error to Paid Order');
        }
    }

    private function update_status_orders($id_order)
    {

        OrderAdmin::find($id_order)->orders()->update([
            'status' => 'completed',
            'payment_status' => 'paid',
            'payment_method' => 'card'


        ]);
    }





    private function create_transaction($mount, $order_intent, $order_id, $status)
    {


        Transation::create([

            'mount' => $mount,
            'orderadmin_id' => $order_id,
            'currency' => 'usd',
            'method' => 'card',
            'status' => $status,
            'transaction_id' => $order_intent->id,
        ]);
    }

    private function update_order($id_order, $order_details)
    {


        OrderAdmin::find($id_order)->update([
            'status' => "completed",
            'payment_status' => "paid",
            'payment_method' => $order_details->payment_method_types[0]
        ]);
    }
}
