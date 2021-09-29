<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Tags;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class TagsEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('tag.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('labels.name')),

            Button::make('Save')
                ->icon('check')
                ->type(Color::DEFAULT())
                ->method('save'),
        ];
    }
}
