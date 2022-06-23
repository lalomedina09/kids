<?php

use Illuminate\Database\Seeder;

use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $pages = [
        ['title' => 'Sobre nosotros'],
        ['title' => 'Políticas'],
        ['title' => 'Aviso de privacidad'],
        ['title' => 'Términos y condiciones'],
        ['title' => 'Colaboraciones'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_walk($this->pages, function ($attributes) {
            $page = Page::create($attributes);
        });
    }
}
