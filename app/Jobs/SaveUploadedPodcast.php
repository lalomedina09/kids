<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{ InteractsWithQueue, SerializesModels };

use App\Models\Podcast;

use Illuminate\Contracts\Filesystem\Cloud;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Exception;

class SaveUploadedPodcast
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var \App\Models\Podcast
     */
    private $podcast;

    /**
     * The uploaded file object.
     *
     * @var UploadedFile
     */
    protected $file;

    /**
     * Create a new job instance.
     *
     * @param  \App\Models\Podcast  $podcast
     * @param  \Symfony\Component\HttpFoundation\File\UploadedFile  $file
     * @return void
     */
    public function __construct(Podcast $podcast, UploadedFile $file = null)
    {
        $this->podcast = $podcast;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @param  \Illuminate\Contracts\Filesystem\Cloud  $cloud
     * @return void
     */
    public function handle(Cloud $cloud)
    {
        if ($this->file != null) {
            $this->validate();

            $path = $cloud->putFile('podcasts/'.date('Y/m'), $this->file);

            $cloud->setVisibility($path, 'public');

            $this->podcast->path = $cloud->url($path);
            $this->podcast->save();
        }
    }

    /**
     * Check the uploaded was successful and the file extension.
     *
     * @throws InvalidArgumentException
     */
    protected function validate()
    {
        if (! $this->file->isValid()) {
            throw new Exception(
                'There was a problem with the uploaded file.'
            );
        }

        if (! in_array($this->file->getClientOriginalExtension(), ['mp3', 'mpga', 'ogg'])) {
            throw new Exception(
                'The uploaded file extension is not allowed.'
            );
        }
    }
}
