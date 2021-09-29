<?php

namespace App\Orchid\Screens\Tags;

use App\Models\Tag;
use App\Orchid\Layouts\Tags\TagsListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class TagListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Tags list';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'List of post tags';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $tags = Tag::filters()->defaultSort('name')->paginate(10);
        return [
            'tags' => $tags,
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
            Link::make(__('general.create_new'))
                ->icon('plus')
                ->route('platform.tags.create'),
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
            TagsListLayout::class,
        ];
    }

    public function remove(Tag $tag)
    {
        $tag->delete();

        Alert::info(__('general.delete_successfully'));

        return redirect()->route('platform.tags.list');
    }
}
