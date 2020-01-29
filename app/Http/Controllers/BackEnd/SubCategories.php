<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\SubCategories\Store;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Session;

class SubCategories extends BackEndController
{
    public function __construct(SubCategory $model)
    {
        parent::__construct($model);
    }

    public function create() {
        $pageTitle = 'Create ' . $this->getSigularModelName();
        $pageDescription = 'You Can add ' . $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $categories = Category::all();
        return view($this->prefixRoute() . '.create', compact('pageTitle', 'pageDescription', 'pluralModelName', 'categories'));
    }

    public function edit($id) {
        $row = $this->model::findOrFail($id);
        $pageTitle = 'Edit ' . $this->getSigularModelName();
        $pageDescription = 'You Can Edit ' . $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $categories = Category::all();

        return view($this->prefixRoute() . '.edit', compact(
            'row',
            'pageTitle',
            'pageDescription',
            'pluralModelName',
            'categories'
        ));
    }

    // Store
    public function store(Store $request) {
        $post = $request->all();
//        dd($post);

        $this->model::create($post);

        Session::flash('success', 'Sub category has been created successfully');

        return redirect('admin/' . $this->getModelName());
    }

    // Update
    public function update(Store $request, $id) {
        $post = $request->all();
        $row = $this->model::findOrFail($id);


        $row->update($post);

        Session::flash('success', 'Category has been updated successfully');

        return redirect('admin/' . $this->getModelName());
    }

    public function destroy($id) {
        $row = $this->model::findOrFail($id);
        Session::flash('removed', $row->name_en . ' has been deleted');
        $row->delete();

        return redirect()->back();
    }
}
