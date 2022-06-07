@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-center font-bold text-xl pb-10">{{ $heading }}</h1>

    <div class="flex">
        <aside class="w-48">
            <p class="font-bold text-xl">Links</p>
            <ul class="pt-4 space-y-2">
                <li><a href="/admin" class="{{ request()->is('admin') ? 'text-blue-500 font-bold' : '' }}">Dashboard</a></li>
                <li><a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500 font-bold' : '' }}">All Posts</a></li>
                <li><a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500 font-bold' : '' }}">New Post</a></li>
                <li><a href="/admin/roles" class="{{ request()->is('admin/roles') ? 'text-blue-500 font-bold' : '' }}">All Roles</a></li>
                <li><a href="/admin/roles/create" class="{{ request()->is('admin/roles/create') ? 'text-blue-500 font-bold' : '' }}">New Role</a></li>
                <li><a href="/admin/users" class="{{ request()->is('admin/users') ? 'text-blue-500 font-bold' : '' }}">All Users</a></li>
                <li><a href="/admin/users/create" class="{{ request()->is('admin/users/create') ? 'text-blue-500 font-bold' : '' }}">New User</a></li>
            </ul>
        </aside>
        {{ $slot }}
    </div>
</section>