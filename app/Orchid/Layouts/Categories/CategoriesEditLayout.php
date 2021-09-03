<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Categories;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class CategoriesEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('category.name')
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
