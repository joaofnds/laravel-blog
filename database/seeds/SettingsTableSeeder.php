<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Laravel Blog',
            'address' => 'Somewhere',
            'contact_number' => '053 981 355 565',
            'contact_email' => 'info@blog.com'
        ]);
    }
}
