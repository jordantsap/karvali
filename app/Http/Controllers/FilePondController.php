<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class FilePondController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('imgfile')) {
            $image = $request->file('imgfile');
            $filename = $image->getClientOriginalName();
            $folder = uniqid('accommodation',true);
            $image->storeAs('/images/accommodations/tmp/' . $folder, $filename);
            TemporaryFile::create([
               'folder'=> $folder,
               'file'=> $filename,
            ]);

            return $folder;
        } else{
            return 'ery5tuyetr6yu';
        }

    }
    public function tmpDelete()
    {
        return $this;
    }
}
