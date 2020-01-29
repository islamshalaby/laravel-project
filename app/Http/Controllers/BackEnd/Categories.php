<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Support\Facades\Session;



class Categories extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    // Use FileUploadTrait
    use \App\Http\Controllers\FileUploadTrait;

    // Store
    public function store(Store $request) {
        $post = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = $this->fileUpload($request, 'photo_id');
            $photo = Photo::create(['file' => $name]);
            $post['photo_id'] = $photo->id;
        }

        $this->model::create($post);

        Session::flash('success', 'Category has been created successfully');

        return redirect('admin/' . $this->getModelName());
    }

    // Update
    public function update(Store $request, $id) {
        $post = $request->all();
        $row = $this->model::findOrFail($id);
        if ($file = $request->file('photo_id')) {
            $name = $this->fileUpload($request, 'photo_id');
            $photo = Photo::findOrFail($row->photo_id);
            unlink("." . $row->photo->file);

            $photo->update(['file' => $name]);
            $post['photo_id'] = $row['photo_id'];
        }

        $row->update($post);

        Session::flash('success', 'Category has been updated successfully');

        return redirect('admin/' . $this->getModelName());
    }

    public function destroy($id) {
        $row = $this->model::findOrFail($id);
        unlink("." . $row->photo->file);
        Session::flash('removed', $row->name_en . ' has been deleted');
        $row->delete();

        return redirect()->back();
    }
}
