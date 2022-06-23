<?php

namespace Tests\Unit\Jobs;

use Tests\TestCase;
use App\Models\Podcast;
use App\Jobs\SaveUploadedPodcast;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaveUploadedPodcastTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_get_an_exception_by_extension_audio_file()
    {
        $podcast = factory(Podcast::class)->states('published')->create();

        $this->expectExceptionMessage('The uploaded file extension is not allowed.');

        Bus::dispatch(new SaveUploadedPodcast($podcast, UploadedFile::fake()->create('document.pdf')));
    }

    /** @test */
    public function it_save_friendly_file_name_on_the_podcast()
    {
        $this->markTestSkipped('This needs to be inspected.');

        $podcast = factory(Podcast::class)->states('published')->create();

        Bus::dispatch(new SaveUploadedPodcast($podcast, UploadedFile::fake()->create('Test Audio File.mp3')));

        $this->assertEquals($podcast->path, 'podcasts/'.date('Y/m').'/test-audio-file.mp3');
    }
}
