<?php

namespace App\Http\View;


use App\Models\Post;
use Illuminate\View\View;

class SideBarViewComposer
{
    private $posts = [];

    public function __construct()
    {
        $this->posts = Post::query()
            ->where([
                'status' => Post::STATUS['publish'],
            ])->limit(5)->get();
    }

    public function compose(View $view)
    {
        $view->with('posts', $this->posts);
    }
}
