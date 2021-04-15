<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    public function store(Request $request)
    {
        $extension = $request->file('upload_file')->extension();
        $minetype = $request->file('upload_file')->getMimeType();
        $pach = Storage::disk('do_spaces')->post('uploads', $request->file('upload_file'),time().'.'.$extension);

        // dd($extension, $minetype, $pach);
        return back()->with('success_mensage', 'Upload successful');
    }

    public function show()
    {
        $file = Storage::disk('do_spaces')->get('uploads/2.jpg');
        $headers = [
            'Content-Type' => 'image/jpg'
        ];

        return response($file, 200, $headers);
    }
}
