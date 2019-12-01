<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use Session;

class CartController extends Controller
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
          'message' => __('alerts.login'),
          'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
      }

      if (Cart::instance('default')->count() == 0) {
        $notification = array(
          'message' => __('alerts.noproducts'),
          'alert-type' => 'warning'
        );
          return redirect()->route('front.products')->with($notification);;
      }
      return view('cart.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
          return $cartItem->id === $request->id;
      });
      if ($duplicates->isNotEmpty()) {
        $notification = array(
          'message' => __('alerts.productincart'),
          'alert-type' => 'warning'
        );
          return redirect()->back()->with($notification);
      }
        Cart::instance('default')->add($request->id, $request->title, 1, $request->price)->associate('App\Product');
        $notification = array(
          'message' => __('alerts.productadded'),
          'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        // exit();
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

        // $notification = array(
        //   'message' => 'Η ποσότητα του προϊόντος ανανεώθηκε!',
        //   'alert-type' => 'info'
        // );
        session()->flash('message', __('alerts.productupdated'));
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('default')->remove($id);
        $notification = array(
          'message' => __('alerts.productdestroy'),
          'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clean()
    {
      Cart::instance('default')->destroy();
      $notification = array(
        'message' => __('alerts.cartclean'),
        'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
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
}
