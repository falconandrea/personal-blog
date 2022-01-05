<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Posts;

use App\Models\Tag;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\SimpleMDE;
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
            CheckBox::make('post.published')
                ->title(__('labels.published'))
                ->sendTrueOrFalse(),

            Input::make('post.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('labels.title')),

            Relation::make('post.tags')
                ->fromModel(Tag::class, 'name')
                ->multiple()
                ->title(__('labels.tags')),

            DateTimer::make('post.date')
                ->title(__('labels.date'))
                ->required()
                ->format('Y-m-d'),

            TextArea::make('post.intro')
                ->rows(3)
                ->required()
                ->title(__('labels.short_intro')),

            Cropper::make('post.image')
                ->title(__('labels.preview_image'))
                ->maxWidth(1000)
                ->maxHeight(800)
                ->targetRelativeUrl()
                ->maxFileSize(1),

            SimpleMDE::make('post.text')
                ->title('Description'),

            Button::make('Save')
                ->icon('check')
                ->type(Color::DEFAULT())
                ->method('save'),
        ];
    }
}
