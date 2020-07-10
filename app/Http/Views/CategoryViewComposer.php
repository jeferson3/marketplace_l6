<?php
namespace App\Http\Views;

use App\Category;

class CategoryViewComposer
{
    private $categories;
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    public function compose($view)
    {
        $categories = $this->categories->all(['name', 'slug']);
        $view->with('categories', $categories);
    }
}
