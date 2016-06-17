<?php
namespace Anavel\Foundation\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        return view(config('anavel.dashboard_view'));
    }

    /**
     * Store the files uploaded by ckeditor
     *
     * @param Request $request
     * @return Response
     */
    public function ckeditorFileUploader(Request $request)
    {
        $url = '';
        $message = '';

        if ($request->hasFile('upload')) {
            $fileName = uniqid() . '-' . $request->file('upload')->getClientOriginalName();

            $request->file('upload')->move(
                base_path(DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . config('anavel.ckeditor_uploads_path')),
                $fileName
            );

            $url = url(config('anavel.ckeditor_uploads_path')) . DIRECTORY_SEPARATOR . $fileName;
        } elseif (! empty($request->file('upload')) && ! $request->file('upload')->isValid()) {
            $message = $request->file('upload')->getErrorMessage();
        }

        return view('anavel::pages.ckeditor.uploader', [
            'funcNum' => $request->get('CKEditorFuncNum'),
            'url' => $url,
            'message' => $message
        ]);
    }

    public function ckeditorFileBrowser()
    {
        $base = public_path(config('anavel.ckeditor_uploads_path'));

        if (!is_dir($base) && ! @mkdir($base, 0700, true)) {
            throw new Exception(__('Folder %s not exists and can not be created', config('anavel.ckeditor_uploads_path')));
        }

        if (!is_dir($base)) {
            throw new Exception(__('Folder %s not exists', config('anavel.ckeditor_uploads_path')));
        } elseif (!is_writable($base)) {
            throw new Exception(__('Folder %s has not write permissions', config('anavel.ckeditor_uploads_path')));
        }

        $dir = null;

        list($files, $directories) = $this->getFilesDirectories($base, $dir, config('anavel.ckeditor_uploads_path'));

        return view('anavel::pages.ckeditor.browser', [
            'directories' => $directories,
            'files' => $files
        ]);
    }

    private function getFilesDirectories($base, $dir, $public)
    {
        if (substr($base, -1) !== DIRECTORY_SEPARATOR) {
            $base = $base.DIRECTORY_SEPARATOR;
        }

        if (substr($public, -1) !== DIRECTORY_SEPARATOR) {
            $public = $public.DIRECTORY_SEPARATOR;
        }

        $directories = $files = [];
        foreach (glob($base.'*', GLOB_MARK) as $each) {
            $each = str_replace($base, '', $each);
            if (substr($each, -1) === '/') {
                $directories[] = [
                    'dir' => base64_encode($dir.$each),
                    'slug' => base64_encode($each),
                    'name' => $each,
                ];
            } else {
                $files[] = [
                    'slug' => base64_encode($each),
                    'url' => asset($public.$each),
                    'name' => $each,
                ];
            }
        }
        return [$files, $directories];
    }
}
