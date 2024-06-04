<?php

namespace Ecommerce\Base\seeders;

use Ecommerce\Backend\Controllers\Vendor\Models\Vendor;
use Ecommerce\Frontend\Models\User;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploads/1343.jpg';
        $vendor->shop_name = 'Admin Shop';
        $vendor->phone = '12321312';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'Usa';
        $vendor->description = 'shop description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
