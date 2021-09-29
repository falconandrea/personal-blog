<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Tags;

use App\Models\Tag;
use App\Models\Post;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TagsListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'tags';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('labels.name'))
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Tag $tag) {
                    return Link::make($tag->name)
                        ->route('platform.tags.edit', $tag->id);
                }),

            TD::make('created_at', __('labels.creation_date'))
                ->sort()
                ->render(function (Tag $tag) {
                    return $tag->updated_at->toDayDateTimeString();
                }),

            TD::make('updated_at', __('labels.update_date'))
                ->sort()
                ->render(function (Tag $tag) {
                    return $tag->updated_at->toDayDateTimeString();
                }),

            TD::make(__('Edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Tag $tag) {
                    return Link::make(__('Edit'))
                    ->route('platform.tags.edit', $tag->id)
                    ->icon('pencil');
                }),

            TD::make(__('Delete'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Tag $tag) {
                    return Button::make(__('Delete'))
                        ->icon('trash')
                        ->method('remove')
                        ->confirm(__('general.delete_message'))
                        ->parameters([
                            'id' => $tag->id,
                        ]);
                }),

        ];
    }
}
