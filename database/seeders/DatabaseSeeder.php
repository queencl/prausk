<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'role_id' =>"admin",
            'name' => "ADMIN",
            'username' => "admin",
            'password' => Hash::make('123')
        ]);
        User::create([
            'role_id' =>"bank",
            'name' => "BANK",
            'username' => "bank",
            'password' => Hash::make('123')
        ]);
        User::create([
            'role_id' =>"kantin",
            'name' => "STORE",
            'username' => "kantin",
            'password' => Hash::make('123')
        ]);
        User::create([
            'role_id' =>"siswa",
            'name' => "NATAN",
            'username' => "natan",
            'password' => Hash::make('natt')
        ]);

        User::create([
            'role_id' =>"siswa",
            'name' => "BABAYO",
            'username' => "babayo",
            'password' => Hash::make('babayo')
        ]);

        Student::create([
            'user_id' => "4",
            'nis' => 12340,
            'classroom' => "XII RPL"
        ]);

        Categorie::create([
            'name' => "JDM"
        ]);

        Categorie::create([
            'name' => "ADM"
        ]);

        Categorie::create([
            'name' => "EDM"
        ]);

        Product::create([
            'name' => "Nissan Skyline R34 02 PW",
            'price' => "250000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198816019121180824/peakpx_1.jpg?ex=65c0476b&is=65add26b&hm=e3a8630dcffef4994956ccdcf748388c344102ac0360a8af6bb65cf916562db4&",
            "desc" => "I Need A Doctor",
            'category_id' => 1,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Toyota Supras Mk4 98 PW",
            'price' => "150000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198817382425182249/Toyota_Supra.jpg?ex=65c048b0&is=65add3b0&hm=ae0c2a01554038a81b094496903749b461cd7da096fe19183c30d760e09317c1&",
            "desc" => "Is That Supra?",
            'category_id' => 1,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Misubitshi Eclipse 95 PW",
            'price' => "120000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198818146207936582/peakpx.jpg?ex=65c04967&is=65add467&hm=0d075a07a65a43a24bc063e195caa6a7ff5b617c23f2ccb72ceb100992d67f17&",
            "desc" => "Call the Cops",
            'category_id' => 1,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Chevrolet Zl1 2020",
            'price' => "100000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198850914572845087/2a215b01b953f858190abba656a5d8cc.jpg?ex=65c067eb&is=65adf2eb&hm=6e0a48331d08d567a7b18fdee2b6dc3e1a5b086633bd9ae7cf47f8556f0fc13e&",
            "desc" => "Hustlin on LBC",
            'category_id' => 2,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Dodge Charger 1970",
            'price' => "115000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198850915201986680/ZOvteBW.jpg?ex=65c067eb&is=65adf2eb&hm=fd731c421e9603290d8d81afa8b6d4eedf4a7868956ea130857d4edff4bd1953&",
            "desc" => "DT to G",
            'category_id' => 2,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Ford Mustang GT 2018",
            'price' => "110000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198850915852095558/peakpx_2.jpg?ex=65c067eb&is=65adf2eb&hm=74a8bac3945cddb4af7f79d2bcb948dbe0168fff78fc37f6e1ef66c5745584ca&",
            "desc" => "California Love",
            'category_id' => 2,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Lamborghini Sian 2019",
            'price' => "260000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198878898474188920/Lamborghini-Sian-cover-MAIN.jpg?ex=65c081fb&is=65ae0cfb&hm=f4376f5dde7fd8f01732d01137ff758054c4194b169dad09fc713095e3895d4f&",
            "desc" => "Ten Second",
            'category_id' => 3,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Ferarri F8 Tributo",
            'price' => "300000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198878899283689582/FerrariF8Tributo.jpg?ex=65c081fb&is=65ae0cfb&hm=c10c71f5ce7e2c197681318ba021a604e65b26dee2bfd6a29ccb5b380dbecdda&",
            "desc" => "Keep it Love",
            'category_id' => 3,
            'stand' => '1'
        ]);

        Product::create([
            'name' => "Buggati Chironss",
            'price' => "280000",
            'stock' => 111,
            'photo' => "https://cdn.discordapp.com/attachments/1103008158907125881/1198878898922983495/2021-Bugatti-Chiron-Pur-Sport-1.jpg?ex=65c081fb&is=65ae0cfb&hm=73de738aa84351830919cda0d8225cf0fd6112427da9adee7d64067b1582d7e6&",
            "desc" => "Ingle Wood to the CPT",
            'category_id' => 3,
            'stand' => '1'
        ]);


        Wallet::create([
            'user_id' => 4,
            'credit' => 1000000,
            'debit' => null,
            'description' => "buka tabungan"
        ]);

        Wallet::create([
            'user_id' => 4,
            'credit' => 15000,
            'debit' => null,
            'description' => "pembelian"
        ]);

        Wallet::create([
            'user_id' => 4,
            'credit' => null,
            'debit' => 21000,
            'description' => "pembelian"
        ]);

        Transaction::create([
            'user_id' =>  4,
            'product_id' => 1,
            'status' => 'di keranjang',
            'order_id' => 'INV_12345',
            'price' => 5000,
            'quantity' => 1
        ]);

        Transaction::create([
            'user_id' =>  4,
            'product_id' => 2,
            'status' => 'di keranjang',
            'order_id' => 'INV_12345',
            'price' => 10000,
            'quantity' => 1
        ]);

        Transaction::create([
            'user_id' =>  4,
            'product_id' => 3,
            'status' => 'di keranjang',
            'order_id' => 'INV_12345',
            'price' => 3000,
            'quantity' => 2
        ]);

    }
}
