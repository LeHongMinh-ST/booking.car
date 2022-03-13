<option value="{{$category->id}}">
    @for($i=0;$i<$category->depth;$i++) &nbsp;&nbsp;&nbsp;&nbsp; @endfor
    @if($category->depth>0)-@endif
    {{ $category->name }}
</option>
@if ($category->children)
    @foreach ($category->children as $childCategory)
        @include('admin.includes.category-children-option', ['category' => $childCategory, 'parent' => $parent])
    @endforeach
@endif
