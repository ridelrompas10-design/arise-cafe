<div class="col">
    <a href="/category/{{ $category->slug }}" wire:navigate class="text-decoration-none">
        <div class="card border-0 rounded-4 shadow-sm h-100 text-center py-3 px-2">
            <img src="{{ asset('/storage/' . $category->image) }}" 
                 class="mx-auto" 
                 style="width: 60px; height: 60px; object-fit: contain;">
            <div class="card-body p-0 mt-2">
                <small class="text-dark fw-semibold">{{ $category->name }}</small>
            </div>
        </div>
    </a>
</div>