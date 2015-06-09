<?php

use Illuminate\Database\Seeder;

/**
 * Description of UserTableSeeder
 *
 * @author arasm_000
 */
class ConfigurationTableSeeder extends Seeder
{

    public function run()
    {
        \App\Configuration::truncate();
        \App\Configuration::create(['variable' => 'app_name', 'value' => 'Nick Simonis']);
        \App\Configuration::create(['variable' => 'twitter_link', 'value' => 'https://twitter.com/nicksimonis']);
        \App\Configuration::create([
            'variable' => 'facebook_link',
            'value' => 'https://www.facebook.com/pages/Nick-Simonis-Photography'
        ]);
        \App\Configuration::create(['variable' => 'flickr_link', 'value' => '']);
        \App\Configuration::create(['variable' => 'vimeo_link', 'value' => '']);
        \App\Configuration::create(['variable' => 'instagram_link', 'value' => 'http://instagram.com/nicksimonis']);
        \App\Configuration::create(['variable' => 'linkedin_link', 'value' => 'https://linkedin.com/in/nicksimonis']);
        \App\Configuration::create(['variable' => 'admin_email', 'value' => 'nick@nicksimonis.co']);
        \App\Configuration::create(['variable' => 'admin_phone', 'value' => '+31616767067']);
    }

}
