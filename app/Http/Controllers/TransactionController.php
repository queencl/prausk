<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function addToCart(Request $request)
    {
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $status = 'di keranjang';
        $price = $request->price;
        $quantity = $request->quantity;

        if($quantity <= 0)
        {
            return redirect()->back()->with('status','Add Quantity Product');
        }
        else
        {            
            Transaction::create([
                
                'user_id' => $user_id,
                'product_id' => $product_id,
                'status' => $status,
                'price' => $price,
                'quantity' => $quantity
    
            ]);
        }

        return redirect()->back()->with('status','Car Added to Cart');
    }

    public function payNow()
    {
        $status= 'dibayar';
        $order_id = 'INV_' . Auth::user()->id .date('YmdHis');
        $wallets = Wallet::where('status', 'selesai')->where('user_id', Auth::user()->id)->get();
            $credit = 0;
            $debit = 0;
            foreach($wallets as $wallet)
            {
                $credit += $wallet->credit;
                $debit += $wallet->debit;
            }

        $saldo = $credit - $debit;
        $carts = Transaction::where('user_id', Auth::user()->id)->where('status','di keranjang')->get();
        // $products = Product::where('stock', 0)->get();

        $total_debit = 0;

        foreach($carts as $cart)
        {
            $total_price = $cart->price * $cart->quantity;
            $total_debit += $total_price;
        }

        
       if($saldo < $total_debit)
       {
        return redirect()->back()->with('status','Your Wallet insufficient');
       }
       elseif($total_debit == 0)
       {
        return redirect()->back()->with('status','No item on your Cart');
       }
       else{

           Wallet::create([
               'user_id' => Auth::user()->id,
               'debit' => $total_debit,
               'description' => 'pembelian produk'
            ]);
            
            foreach($carts as $cart){
                if($cart->product->stock > 0){
                    Transaction::where('status', 'di keranjang')->update(
                        [
                            'status' => $status,
                            'order_id' => $order_id
                                
                        ]
                        );
                    }
                    Product::find($cart->product->id)->update(
                        [
                            'stock' => $cart->product->stock - $cart->quantity
                        ]
                    );
                }
                    
        }
        return redirect()->back()->with('status','Successfully Payment Order');
    }

    public function download($order_id)
    {
       $transactions = Transaction::where('order_id', $order_id)->get();

        $total_biaya = 0;

        foreach($transactions as $transaction){
            $total_price = $transaction->quantity * $transaction->price;
            $total_biaya += $total_price;
        }

        return view('receipt', compact('transactions', 'total_biaya'));

    }

    public function DeleteCart($id)
     {
        $delete = Transaction::find($id)->delete();
        if ($delete)
        {
            return redirect('/home')->with('status', 'Successfully removed Product from the cart');
        }
        else
        {
            return redirect('/home')->with('status','Failed to removed Product from the cart');
        }
     }

    public function take($id)   
    {
        Transaction::find($id)->update([
            'status' => 'diambil'
        ]);

        return redirect()->back()->with('status','Successfully retrieved');
    }
}
