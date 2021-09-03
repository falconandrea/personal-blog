<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Posts;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

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

            TextArea::make('post.intro')
                ->rows(3)
                ->title('Short intro')
                ->placeholder('Enter the intro of the post'),

            Cropper::make('post.image')
                ->title('Preview image')
                ->maxWidth(1000)
                ->maxHeight(800)
                ->targetRelativeUrl()
                ->maxFileSize(1),

            Quill::make('post.text')
                ->title('Main text'),

            Button::make('Save')
                ->icon('check')
                ->type(Color::DEFAULT())
                ->method('save'),
        ];
    }
}
