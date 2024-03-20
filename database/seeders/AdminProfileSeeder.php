<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vendor;

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
        $vendor->phone = '085274817886';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'IDN';
        $vendor->description = 'Alfatih Solution';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
