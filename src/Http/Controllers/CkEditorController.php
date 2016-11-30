<?php

namespace Anavel\Foundation\Http\Controllers;

use Illuminate\Http\Request;
use URL;

class CkEditorController extends Controller
{
    public function embedProvider(Request $request)
    {
        $streamContext = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => sprintf('Referer: %s\r\n', URL::current())
            ]
        ]);

        $response = file_get_contents(
            sprintf('http://ckeditor.iframe.ly/api/oembed?url=%s&callback=%s', $request->get('url'), $request->get('callback')),
            false,
            $streamContext
        );

        return $response;
    }
}
