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
            TD::make('title', __('labels.title'))
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.posts.edit', $post->id);
                }),

            TD::make('categories', __('labels.categories'))
                ->render(function (Post $post) {
                    $temp = [];
                    foreach ($post->categories()->get()->toArray() as $row) {
                        $temp[] = $row['name'];
                    }
                    return implode(", ", $temp);
                }),

            TD::make('created_at', __('labels.creation_date'))
                ->sort()
                ->render(function (Post $post) {
                    return $post->updated_at->format('d/m/Y');
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
