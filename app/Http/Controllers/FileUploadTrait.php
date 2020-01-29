<?php
namespace App\Http\Controllers;
trait FileUploadTrait {
    public function fileUpload($request, $fileName) {
        $file = $request->file($fileName);
        $name = time() . "_" . $file->getClientOriginalName();
        $file->move('images', $name);

        return $name;
    }
}
