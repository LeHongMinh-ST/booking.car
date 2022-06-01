<div>
    @for($i=0;$i<$category->depth;$i++) &nbsp;&nbsp;&nbsp;&nbsp; @endfor
    <label class="checkbox">
        <input type="checkbox" style="cursor: pointer" wire:model="categoryChecked" value="{{ $category->id }}" >
        <span style="font-size: 16px">{{ $category->name }}</span>
    </label>
</div>
@if ($category->children)
    @foreach ($category->children as $childCategory)
        @include('admin.includes.category-option', ['category' => $childCategory])
    @endforeach
@endif
