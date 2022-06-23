<?php

namespace Tests\Unit\Models\Presenters;

use Tests\TestCase;
use App\Models\Page;

class PagePresenterTest extends TestCase
{
    /** @test */
    public function updated_at()
    {
        $page = (new Page)->setAttribute('updated_at', '2017-01-01 00:00:00');

        $this->assertEquals('1 de enero del 2017', $page->present()->updated_at);
    }
}
