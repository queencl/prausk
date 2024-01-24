<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function topUpNow(Request $request){
        $user_id = Auth::user()->id;
        $credit = $request->credit;
        $status = "proses";
        $description = "Top up Wallet";

        Wallet::create([
            'user_id' =>$user_id,
            'credit' =>$credit,
            'status' =>$status,
            'description' => $description
        ]);

        return redirect()->back()->with('status','Top Up Success to Bank');
    }

    public function request_topup(Request $request)
    {
        Wallet::find($request->id)->update([
            'status' => 'done'
        ]);

        return redirect()->back()->with('status', 'Top Up Success');

    }
}
