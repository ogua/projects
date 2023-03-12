<?php

namespace App\Http\Controllers\Voyager\ContentTypes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image as InterventionImage;
use TCG\Voyager\Http\Controllers\ContentTypes\BaseType;

class MultipleImage extends BaseType
{
    /**
     * @return string
     */
    public function handle()
    {

        $filesPath = [];
        $files = $this->request->file($this->row->field);

        if (!$files) {
            return;
        }

        foreach ($files as $file) {
            if (!$file->isValid()) {
                continue;
            }

            $image = InterventionImage::make($file)->orientate();


            $filename = Str::random(20);
            $path = $this->slug.DIRECTORY_SEPARATOR.date('FY').DIRECTORY_SEPARATOR;
            array_push($filesPath, $path.$filename.'.'.$file->getClientOriginalExtension());
            $filePath = $path.$filename.'.'.$file->getClientOriginalExtension();

            Storage::disk(config('voyager.storage.disk'))->put($filePath, (string) file_get_contents($file), 'public');
            
        }

        return json_encode($filesPath);
    }
}
