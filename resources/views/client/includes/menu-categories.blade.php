<ul class="sub-menu">
    @foreach($categories as $category)
        <li class="menu-item  @if($category->children) menu-item-has-children arrow @endif">
            <a href="{{ route('product-by-category', $category->slug ?? "") }}">{{ $category->name }}</a>
            @if($category->children)
                @include('client.includes.menu-categories', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>
