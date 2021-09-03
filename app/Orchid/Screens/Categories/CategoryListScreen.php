<?php

namespace App\Orchid\Screens\Categories;

use App\Models\Category;
use App\Orchid\Layouts\Categories\CategoriesListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class CategoryListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Categories list';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'List of post categories';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $categories = Category::filters()->defaultSort('name')->paginate(10);
        return [
            'categories' => $categories,
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make(__('general.create_new'))
                ->icon('plus')
                ->route('platform.categories.create'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            CategoriesListLayout::class,
        ];
    }

    public function remove(Category $category)
    {
        $category->delete();

        Alert::info(__('general.delete_successfully'));

        return redirect()->route('platform.categories.list');
    }
}
