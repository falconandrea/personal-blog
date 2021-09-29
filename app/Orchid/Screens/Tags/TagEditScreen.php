<?php

namespace App\Orchid\Screens\Tags;

use App\Models\Tag;
use App\Orchid\Layouts\Tags\TagsEditLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class TagEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'New tag';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Create a new tag';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tag $tag): array
    {
        if ($tag->exists) {
            $this->name = 'Edit tag';
            $this->description = 'Update the tag content';
        }
        return [
            'tag' => $tag->exists ? $tag : null
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Save')
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            TagsEditLayout::class
        ];
    }

    public function save(Tag $tag, Request $request)
    {
        $request->merge(['tag' => array_merge($request->get('tag'), ['slug' => Str::slug($request->input('tag.name'))])]);

        $request->validate([
            'tag.name' => ['required', 'max:255'],
            'tag.slug' => ['required', Rule::unique(Tag::class, 'slug')->ignore($tag)],
        ]);

        $tag->fill($request->get('tag'))->save();

        Toast::info(__('general.save_successfully'));

        return redirect()->route('platform.tags.edit', $tag->id);
    }
}
