<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="categories" href="{{ route('categories') }}" :isActive="request()->routeIs('categories')">
        <x-slot name="icon">
            <x-icons.category class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="products" href="{{ route('products') }}" :isActive="request()->routeIs('products')">
        <x-slot name="icon">
            <x-icons.category class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="users" href="{{ route('users') }}" :isActive="request()->routeIs('users')">
        <x-slot name="icon">
            <x-icons.category class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
       
</x-perfect-scrollbar>