<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Posts;

use App\Models\Post;
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
            TD::make('title', 'Title')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.posts.edit', $post->id);
                }),

            TD::make('updated_at', 'Last update')
                ->sort()
                ->render(function (Post $post) {
                    return $post->updated_at->toDayDateTimeString();
                }),

            TD::make('created_at', 'Creation date')
                ->sort()
                ->render(function (Post $post) {
                    return $post->updated_at->toDayDateTimeString();
                }),

            TD::make('Edit')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Post $post) {
                    return Link::make('Edit')
                    ->route('platform.posts.edit', $post->id)
                    ->icon('pencil');
                }),

            TD::make('Delete')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Post $post) {
                    return Button::make('Delete')
                        ->icon('trash')
                        ->method('remove')
                        ->confirm('Once the post is deleted, all of its resources and data will be permanently deleted.')
                        ->parameters([
                            'id' => $post->id,
                        ]);
                }),

        ];
    }
}
