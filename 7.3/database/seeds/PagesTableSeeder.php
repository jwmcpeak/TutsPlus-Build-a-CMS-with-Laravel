<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Page::truncate();

        $about = new Page([
            'title' => 'About',
            'url' => '/about',
            'content' => 'This is about us.',
        ]);

        $contact = new Page([
            'title' => 'Contact',
            'url' => '/contact',
            'content' => 'You can contact us.'
        ]);

        $faq = new Page([
            'title' => 'FAQ',
            'url' => '/another-page',
            'content' => 'This is another page.'
        ]);

        $admin->pages()->saveMany([
            $about,
            $contact,
            $faq,
        ]);

        $about->appendNode($faq);
    }
}
