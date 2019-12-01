<?php

namespace App\Http\Controllers\Client;

use App\Order;
use App\OrderProduct;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      if (auth()->user()) {
        $notification = array(
          'message' => 'Έχετε συνδεθεί στο σύστημα ως καταχωρητής. Παρακαλώ κάντε αποσύνδεση και είσοδο στο σύστημα ως πελάτης για να συνεχίσετε τις αγορές σας!',
          'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
      }

      if (Cart::instance('default')->count() == 0) {
        $notification = array(
          'message' => 'Δέν υπάρχουν προϊόντα, προσθέστε εδώ!',
          'alert-type' => 'warning'
        );
          return redirect()->route('front.products')->with($notification);;
      }
      return redirect()->route('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       // $this->validate($request,[
       //     'title' =>'required|max:100',
       //     'image' =>'nullable',
       //     'meta_description' =>'max:160',
       //     'meta_keywords' =>'',
       //     'post_type'=>'required',
       //     'description' =>'required',
       //     'active' => '',
       //     ]);
       $order = new Order;
       $order->customer_id = auth()->guard('customer')->user() ? auth()->guard('customer')->user()->id : null;
       $order->billing_email = $request->input('email');
       $order->billing_name = $request->input('name');
       $order->billing_address = $request->input('address');
       $order->billing_city = $request->input('city');
       $order->billing_province = $request->input('province');
       $order->billing_postalcode = $request->input('postalcode');
       $order->billing_phone = $request->input('phone');
       $order->billing_subtotal = Cart::subtotal();
       $order->billing_tax = Cart::tax();
       $order->billing_total = Cart::total();
       $order->billing_other_info = $request->input('otherinfo');

       $order->save();

       foreach (Cart::content() as $item) {
           OrderProduct::create([
               'order_id' => $order->id,
               'product_id' => $item->model->id,
               'quantity' => $item->qty,
           ]);
       }

       Mail::queue(new OrderPlaced($order));

       // Cart::instance('default')->destroy();

       $notification = array(
         'message' => 'Ευχαριστούμε! Έγινε αποστολή της παραγγελίας!',
         'alert-type' => 'success'
       );

       return redirect()->route('confirmation.index')->with($notification);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function update(Request $request, $id)
      {
          // return $request->all();
          // Product::find($product->id);
          Cart::instance('default')->update($id, $request->quantity);
          $notification = array(
            'message' => 'Η ποσότητα ανανεώθηκε!',
            'alert-type' => 'success'
          );
          session()->flash($notification);
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
        public function show($id)
        {
            //
        }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          //
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          //
      }
}
