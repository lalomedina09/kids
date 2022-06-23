<?php

namespace Tests\Unit\Config;

use Tests\TestCase;

class CompanyTest extends TestCase
{
    /** @test */
    public function it_defines_a_facebook_url()
    {
        $this->assertEquals(
            'https://www.facebook.com/queridodinero',
            config('money.url.facebook')
        );
    }

    /** @test */
    public function it_defines_an_instagram_url()
    {
        $this->assertEquals(
            'https://www.instagram.com/querido_dinero',
            config('money.url.instagram')
        );
    }

    /** @test */
    public function it_defines_a_twitter_url()
    {
        $this->assertEquals(
            'https://twitter.com/querido_dinero',
            config('money.url.twitter')
        );
    }

    /** @test */
    public function it_defines_a_youtube_url()
    {
        $this->assertEquals(
            'https://www.youtube.com/channel/UCGxHQ_CBYZ5MeLtYE2wlxgg',
            config('money.url.youtube')
        );
    }
}
