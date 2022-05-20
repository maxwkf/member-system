<x-dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
        >
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-icon name="down-arrow" />
        </button>
    </x-slot>

    {{-- 
       - Using routeIs need to set alias in web.php for corresponding route
       - 
    --}}
    <x-dropdown-item href="/{{ 
    count( request()->except('category') ) > 0 ? '?' . http_build_query( request()->except('category') ) : '' }}" :active="request()->routeIs('home')">All</x-dropdown-item>

    @foreach ($categories as $category)
    
        {{-- 
           - Active can be check by the followings
           - 
           - 1. Check by variable
           -    :active="isset($currentCatetory) && $currentCategory->is($category)"    
           -
           - 2. Check by URI
           -    :active="request()->is('categories/' . $category->slug)"
        --}}
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query( request()->except('category') ) }}"
            :active='request("category")==$category->slug'
        >{{ ucwords($category->name) }}
        </x-dropdown-item>

    @endforeach
</x-dropdown>