<?php

namespace App\Orchid\Screens\Posts;

use App\Models\Post;
use App\Orchid\Layouts\Posts\PostsListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class PostListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Users list';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'List of all posts, published or not';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $posts = Post::filters()->defaultSort('title')->paginate(10);
        return [
            'posts' => $posts,
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
                ->route('platform.posts.create'),
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
            PostsListLayout::class,
        ];
    }

    public function remove(Post $post)
    {
        $post->delete();

        Alert::info(__('general.delete_successfully'));

        return redirect()->route('platform.posts.list');
    }
}
