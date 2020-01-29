<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialMedia extends BackEndController
{
    public function __construct(\App\Models\SocialMedia $model)
    {
        parent::__construct($model);
    }

    public function update($id, Request $request) {
        $post = $request->all();
        $this->model::findOrFail($id)->update($post);

        Session::flash('success', 'Social media has been updated successfully');

        return redirect()->back();
    }

}
