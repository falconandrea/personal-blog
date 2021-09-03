<?php

namespace App\Orchid\Screens\Categories;

use App\Models\Category;
use App\Orchid\Layouts\Categories\CategoriesEditLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class CategoryEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'New category';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Create a new category';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Category $category): array
    {
        if ($category->exists) {
            $this->name = 'Edit category';
            $this->description = 'Update the category content';
        }
        return [
            'category' => $category->exists ? $category : null
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
            Button::make('Save')
                ->icon('check')
                ->method('save'),
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
            CategoriesEditLayout::class
        ];
    }

    public function save(Category $category, Request $request)
    {
        $values = $request->get('category');
        $values['slug'] = Str::slug($values['name']);

        $request->merge(['category' => $values]);

        $request->validate([
            'category.name' => ['required', 'max:255'],
            'category.slug' => ['required', Rule::unique(Category::class, 'slug')->ignore($category)],
        ]);

        $category->fill($request->get('category'))->save();

        Toast::info(__('general.save_successfully'));

        return redirect()->route('platform.categories.list');
    }
}
