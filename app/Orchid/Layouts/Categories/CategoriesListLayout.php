<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Categories;

use App\Models\Category;
use App\Models\Post;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoriesListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'categories';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('labels.name'))
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Category $category) {
                    return Link::make($category->name)
                        ->route('platform.categories.edit', $category->id);
                }),

            TD::make('created_at', __('labels.creation_date'))
                ->sort()
                ->render(function (Category $category) {
                    return $category->updated_at->toDayDateTimeString();
                }),

            TD::make('updated_at', __('labels.update_date'))
                ->sort()
                ->render(function (Category $category) {
                    return $category->updated_at->toDayDateTimeString();
                }),

            TD::make(__('Edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Category $category) {
                    return Link::make(__('Edit'))
                    ->route('platform.categories.edit', $category->id)
                    ->icon('pencil');
                }),

            TD::make(__('Delete'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Category $category) {
                    return Button::make(__('Delete'))
                        ->icon('trash')
                        ->method('remove')
                        ->confirm(__('general.delete_message'))
                        ->parameters([
                            'id' => $category->id,
                        ]);
                }),

        ];
    }
}
