@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-center font-bold text-xl">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-48">
            <p class="font-bold text-xl">Links</p>
            <ul class="pt-4 space-y-2">
                <li><a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'text-blue-500 font-bold' : '' }}">Dashboard</a></li>
                <li><a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500 font-bold' : '' }}">All Post</a></li>
                <li><a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500 font-bold' : '' }}">New Post</a></li>
            </ul>
        </aside>
        {{ $slot }}
    </div>
</section>