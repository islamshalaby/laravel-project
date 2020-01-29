<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BackEndController extends Controller
{
    protected $model;


    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function index() {
        $rows = $this->model::paginate(10);
        $pageTitle = 'Control ' . $this->getPluralModelName();
        $modelName = $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $singularModelName = $this->getSigularModelName();
        if (request()->segment(2) == 'contacts') {
            $pageDescription = 'You Can show | delete ' . $this->getSigularModelName();
        }else {
            $pageDescription = 'You Can add | edit | delete ' . $this->getSigularModelName();
        }

        return view($this->prefixRoute() . '.index', compact(
            'rows',
            'pageTitle',
            'pageDescription',
            'modelName',
            'pluralModelName',
            'singularModelName'
        ));
    }

    public function create() {
        $pageTitle = 'Create ' . $this->getSigularModelName();
        $pageDescription = 'You Can add ' . $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $push = $this->with();
        return view($this->prefixRoute() . '.create', compact('pageTitle', 'pageDescription', 'pluralModelName'))
            ->with($push);
    }

    public function edit($id) {
        $row = $this->model::findOrFail($id);
        $pageTitle = 'Edit ' . $this->getSigularModelName();
        $pageDescription = 'You Can Edit ' . $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $push = $this->with();

        return view($this->prefixRoute() . '.edit', compact(
            'row',
            'pageTitle',
            'pageDescription',
            'pluralModelName'
        ))->with($push);
    }

    public function show($id) {
        $row = $this->model::findOrFail($id);
        $pageTitle = 'Show ' . $this->getSigularModelName();
        $pageDescription = 'You Can Show ' . $this->getSigularModelName();
        $pluralModelName = $this->getModelName();
        $push = $this->with();

        return view($this->prefixRoute() . '.show', compact(
            'row',
            'pageTitle',
            'pageDescription',
            'pluralModelName'
        ))->with($push);
    }

    protected function getSigularModelName() {
        return class_basename($this->model);
    }

    protected function getPluralModelName() {
        return Str::plural($this->getSigularModelName());
    }

    protected function getModelName() {
        return strtolower($this->getPluralModelName());
    }

    public function prefixRoute() {
        return 'backend.' . $this->getModelName();
    }

    public function with() {
        return [];
    }
}
