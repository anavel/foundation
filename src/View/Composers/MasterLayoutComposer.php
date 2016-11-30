<?php

namespace Anavel\Foundation\View\Composers;

use Anavel\Foundation\Contracts\Anavel;

class MasterLayoutComposer
{
    protected $anavel;

    public function __construct(Anavel $anavel)
    {
        $this->anavel = $anavel;
    }

    public function compose($view)
    {
        $uploadsModuleIsInstalled = $this->anavel->hasModule('Anavel\Uploads\UploadsModuleProvider');

        $ckEditorData = [
            'removePlugins'   => 'image',
            'fileBrowserUrl'  => '',
            'fileUploaderUrl' => '',
            'embedProvider'   => route('anavel.ckeditor.embed-provider', ['url' => '{url}', 'callback' => '{callback}'])
        ];

        if ($uploadsModuleIsInstalled) {
            $ckEditorData['removePlugins'] = '';
            $ckEditorData['fileBrowserUrl'] = route('anavel-uploads.ckeditor.file-browser');
            $ckEditorData['fileUploaderUrl'] = route('anavel-uploads.ckeditor.file-uploader', ['_token' => csrf_token()]);
        }

        $view->with([
            'ckEditorData' => json_encode($ckEditorData),
        ]);
    }
}
