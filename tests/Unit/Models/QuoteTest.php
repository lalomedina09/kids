<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Quote;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuoteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function quote_has_fillable_fields()
    {
        $quote = new Quote;

        $this->assertEquals([
            'title',
            'body'
        ], $quote->getFillable());
    }

    /** @test */
    public function quote_has_column_fields()
    {
        $quote = factory(Quote::class)->create(['title' => 'test_title', 'body' => 'loremp upsum']);

        $this->assertEquals('test_title', $quote->title);
        $this->assertEquals('loremp upsum', $quote->body);
    }

    /** @test */
    public function it_is_soft_deletable()
    {
        $quote = new Quote;

        $this->assertContains(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($quote));
        $this->assertContains('deleted_at', $quote->getDates());
    }

    /** @test */
    public function it_has_presenter_collaborator()
    {
        $presenter = (new Quote)->present();

        $this->assertInstanceOf(\App\Models\Presenters\QuotePresenter::class, $presenter);
    }
}
