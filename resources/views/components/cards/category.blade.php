<div class="col-4 col-md-3 mb-3">
    <a href="/category/{{ $category->slug }}" wire:navigate class="text-decoration-none">
        <div class="category-card">
            <div class="category-icon-wrap">
                <img src="{{ asset('/storage/' . $category->image) }}" 
                     alt="{{ $category->name }}"
                     class="category-img">
            </div>
            <span class="category-name">{{ $category->name }}</span>
        </div>
    </a>
</div>