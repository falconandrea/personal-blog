<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Posts;

use App\Models\Tag;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Color;

class PostsEditLayoutSEO extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('post.seo_title')
                ->type('text')
                ->max(255)
                ->title(__('labels.seo_title')),

            TextArea::make('post.seo_description')
                ->rows(3)
                ->max(255)
                ->title(__('labels.seo_description')),
        ];
    }
}
