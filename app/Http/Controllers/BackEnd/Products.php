<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Links\Update;
use App\Http\Requests\BackEnd\products\Store;
use App\Models\Category;
use App\Models\Link;
use App\Models\Photo;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Session;

class Products extends BackEndController
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    use \App\Http\Controllers\FileUploadTrait;

    public function with()
    {
        $array = [
            'categories' => Category::get(),
            'subCategoryArray' => []
        ];
        if (request()->route()->parameter('product')) {
            $array['subCategoryArray'] = SubCategory::findOrFail(request()->route()->parameter('product'))->get()->pluck('id');
        }
        return $array;
    }

    // get subcats
    public function fetchSubCategories($id) {
        $row = Category::findOrFail($id)->subCategories;
        $data = json_decode($row);

        return response($data, 200);
    }

    // Store
    public function store(Store $request) {
        $post = $request->all();

        $this->model::create($post);

        Session::flash('success', 'Product has been created successfully');

        return redirect('admin/' . $this->getModelName());
    }

    // Update
    public function update(Store $request, $id) {
        $post = $request->all();
        $row = $this->model::findOrFail($id);

        $row->update($post);

        Session::flash('success', 'Product has been updated successfully');

        return redirect('admin/' . $this->getModelName());
    }

    // Add product images
    public function productImages(\App\Http\Requests\BackEnd\Photos\Store $request) {
        $post = $request->all();

        $imageName = $this->fileUpload($request, 'file');
        $post['file'] = $imageName;
        $post['product_id'] = (int)$post['product_id'];

        Photo::create($post);
    }

    // Delete product image
    public function deletePhoto($id) {
        $photo = Photo::findOrFail($id);
        unlink('.' . $photo->file);

        $photo->delete();
        Session::flash('removed', 'Image has been deleted successfully');
        return redirect()->back();
    }

    // Get product links
    public function showLinks($id) {
        $product = Product::findOrFail($id);
        $rows = $product->links()->get();
        $productId = $id;
        $pageTitle = 'Control ' . $product['name_en'] . 'links';
        $modelName = $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $singularModelName = $this->getSigularModelName();
        $pageDescription = 'You Can add | edit | delete ' . $product['name_en'] . ' links';

        return view($this->prefixRoute() . '.links', compact(['rows', 'productId', 'pageTitle', 'pageDescription', 'pluralModelName', 'singularModelName', 'modelName']));
    }

    // Add links
    public function storeLinks(\App\Http\Requests\BackEnd\Links\Store $request, $id) {
        $post = $request->all();

        for ($i = 0; $i < count($post['link']); $i ++) {
            Link::create(['link' => $post['link'][$i], 'type' => $post['type'][$i], 'product_id' => $id]);
        }

        Session::flash('success', 'Links has been added successfully');

        return redirect()->back();
    }

    // Edit link
    public function editLink(Update $request, $id) {
        $post = $request->all();
        Link::findOrFail($id)->update($post);

        Session::flash('success', 'Link has been updated successfully');

        return redirect()->back();
    }

    // Delete link
    public function deleteLink($id) {
        Link::findOrFail($id)->delete();

        Session::flash('removed', 'Link has been deleted');
        return redirect()->back();
    }

    public function destroy($id) {
        $row = $this->model::findOrFail($id);
        unlink("../" . $row->photo->file);
        Session::flash('removed', $row->name_en . ' has been deleted');
        $row->delete();

        return redirect()->back();
    }
}
