<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\service\Validator\CategoryValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    private CategoryValidator $validator;

    public function __construct(CategoryValidator $categoryValidator)
    {
        parent::__construct();
        $this->validator = $categoryValidator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $this->validator->validate($request);
        } catch (ValidationException $e) {
            return $this->response->errorsValidation($e->errors());
        }
        $category = Category::create($data);

        return $this->response->set(
            true, 
            ['category' => $category],
            "Category has been created.",
            201  
        )->output();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            $data = $this->validator->validate($request);
        } catch (ValidationException $e) {
            return $this->response->errorsValidation($e->errors());
        }

        $category->update($data);

        return $this->response->set(
            true, 
            ['category' => $category],
            "Category has been updated.",
            200 
        )->output();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return $this->response->set(
            true, 
            [],
            "Category has been deleted.",
            200  
        )->output();
    }
}
