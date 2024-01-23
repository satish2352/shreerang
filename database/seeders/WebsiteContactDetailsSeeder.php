<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteContactDetails;

class WebsiteContactDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteContactDetails::create(
            [
                'contact_one'  => '+ 91- 8888352777',
                'contact_two'  => '0253-7966831',
                'mail_id'  => 'info@fibovix.com',
                'facebook_link'  => '#',
                'instagram_link'  => '#',
                'address' => 'Express towers, Marine Dr, Nariman Point, Mumbai, Maharashtra 400021'
            ]);
    }
}
