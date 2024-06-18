<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'about_title' => 'Software Engineer',
            'about_description' => '2+ year experience.',
            'fb_url' => 'https://www.facebook.com/nethmi/',
            'github_url' => 'https://github.com/nethmi',
            'linkedin_url' => 'https://www.linkedin.com/in/elgammal/',
            'freelance_url' => '#li',
            'cv_url' => '#cv',
            'video_url' => '#video'
        ]);
    }
}
