<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Session;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer', ['except' => ['index', 'store', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function index()
    {
      if (auth()->user()) {
        return redirect()->back()->with('error', 'Κάντε είσοδο στο σύστημα ως πελάτης για να πραγματοποιήσετε αγορές!');
      }
      if (Cart::instance('default')->count() == 0) {
          return redirect()->route('products')->with('warning', 'Δέν υπάρχουν προϊόντα, προσθέστε εδώ!');
      }

      if (auth()->user() && request()->is('guestCheckout')) {
          return redirect()->route('checkout.index');
      }

      return view('cart.checkout')->with([
          'discount' => $this->getNumbers()->get('discount'),
          'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
          'newTax' => $this->getNumbers()->get('newTax'),
          'newTotal' => $this->getNumbers()->get('newTotal'),
      ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            $charge = session([
                'amount' => $this->getNumbers()->get('newTotal'),
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                ],
            ]);

            $order = $this->addToOrdersTables($request, null);
            Mail::send(new OrderPlaced($order));

            Cart::instance('default')->destroy();

            $notification = array(
              'message' => 'Ευχαριστούμε! Έγινε αποστολή της παραγγελίας!',
              'alert-type' => 'success'
            );

            return redirect()->route('confirmation.index')->with($notification);

        } catch (CartErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    protected function addToOrdersTables(Request $request)
    {
        // Insert into orders table
        $order = Order::create([
            'customer_id' => auth()->guard('customer')->user() ? auth()->guard('customer')->user()->id : null,
            'billing_email' => $request->input('email'),
            'billing_name' => $request->input('name'),
            'billing_address' => $request->input('address'),
            'billing_city' => $request->input('city'),
            'billing_province' => $request->input('province'),
            'billing_postalcode' => $request->input('postalcode'),
            'billing_phone' => $request->input('phone'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'billing_other_info' => $request->input('otherinfo'),
        ]);
        // dd($order);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

         return $order;
    }

    private function getNumbers()
    {
      $tax = config('cart.tax') / 100;
      $newSubtotal = (Cart::subtotal());
      $newTax = $newSubtotal * $tax;
      $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'tax' => $tax,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
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
}
