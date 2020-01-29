<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Contacts extends BackEndController
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

    public function destroy($id) {
        $this->model::findOrFail($id)->delete();
        Session::flash("removed", "Message has been deleted");

        return redirect()->back();
    }
}
