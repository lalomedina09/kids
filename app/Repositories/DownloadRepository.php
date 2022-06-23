<?php

namespace App\Repositories;

use \Illuminate\Http\UploadedFile;

use App\Models\Download;

class DownloadRepository
{

    /**
     * Save download on storage
     *
     * @param  array  $params
     * @param  \App\Models\Download  $download
     * @return \App\Models\Download
     */
    public function save($params, Download $download=null) : Download
    {
        $download = ($download) ?: new Download;

        $download->name = $params['name'];
        $download->description = $params['description'];
        $download->save();

        if (array_has($params, 'payload')
            && $params['payload'] instanceof UploadedFile
            && $file = $params['payload']
        ) {
            $download->savePayload($file);
        }

        return $download;
    }

}
