<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Posts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class PostsEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('post.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Title')
                ->placeholder('Enter the title of the post'),

            TextArea::make('post.description')
                ->rows(3)
                ->title('Description')
                ->placeholder('Enter the text of the post'),
        ];
    }
}
