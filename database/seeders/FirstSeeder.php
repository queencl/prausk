<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total_debit = 0;

        $transaktions = Transaction::where('order_id' ==
        'INV_12345');
        
        foreach($transaktions as $transaction)
        {
            $total_price = $transaction->price * $transaction->quantity;

            $total_debit += $total_price;
        }

        User::create([
            'role_id' =>"bank",
            'name' => "BANK",
            'username' => "bank",
            'password' => Hash::make('123')
        ]);
        
        Wallet::create([
            'user_id' => 4,
            'debit' => $total_debit,
            'description' => "Pembelian Product"
        ]);

        foreach($transaktions as $transaction)
        {
            Transaction::find($transaction->id)->update([
                'status' => 'dibayar'
            ]);
        }
        foreach($transaktions as $transaction)
        {
            Transaction::find($transaction->id)->update([
                'status' => 'diambil'
            ]);
        }
        foreach($transaktions as $transaction)
        {
            Transaction::find($transaction->id)->update([
                'status' => 'di keranjang'
            ]);
        }
    }
}
 