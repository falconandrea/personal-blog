<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Posts;

use App\Models\Post;
use Orchid\Icons\Icon;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostsListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'posts';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', __('labels.title'))
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.posts.edit', $post->id);
                }),

            TD::make('published', __('labels.published'))
                ->render(function (Post $post) {
                    return Link::make('')->icon(($post->published ? 'check' : 'circle_thin'))
                    ->route('platform.posts.edit', $post->id);
                }),

            TD::make('tags', __('labels.tags'))
                ->render(function (Post $post) {
                    $temp = [];
                    foreach ($post->tags()->get()->toArray() as $row) {
                        $temp[] = $row['name'];
                    }
                    return implode(", ", $temp);
                }),

            TD::make('date', __('labels.date'))
                ->sort()
                ->render(function (Post $post) {
                    return $post->date->format('d/m/Y');
                }),

            TD::make('updated_at', __('labels.update_date'))
                ->sort()
                ->render(function (Post $post) {
                    return $post->updated_at->toDayDateTimeString();
                }),

            TD::make(__('Edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Post $post) {
                    return Link::make(__('Edit'))
                    ->route('platform.posts.edit', $post->id)
                    ->icon('pencil');
                }),

            TD::make(__('Delete'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Post $post) {
                    return Button::make(__('Delete'))
                        ->icon('trash')
                        ->method('remove')
                        ->confirm(__('general.delete_message'))
                        ->parameters([
                            'id' => $post->id,
                        ]);
                }),

        ];
    }
}
