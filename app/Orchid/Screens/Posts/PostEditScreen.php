<?php

namespace App\Orchid\Screens\Posts;

use App\Models\Post;
use App\Orchid\Layouts\Posts\PostsEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'New post';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Create a new post';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Post $post): array
    {
        if ($post->exists) {
            $this->name = 'Edit post';
            $this->description = 'Update the post content';
        }
        return [
            'post' => $post->exists ? $post : null
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
            PostsEditLayout::class
        ];
    }

    public function save(Post $post, Request $request)
    {
        $values = $request->get('post');
        $values['slug'] = Str::slug($values['title']);

        $request->merge(['post' => $values]);

        $request->validate([
            'post.title' => ['required', 'max:255'],
            'post.slug' => ['required', Rule::unique(Post::class, 'slug')->ignore($post)],
            'post.intro' => ['required'],
            'post.text' => ['required']
        ]);

        $post->fill($request->get('post'))->save();

        Toast::info(__('general.save_successfully'));

        return redirect()->route('platform.posts.list');
    }
}
