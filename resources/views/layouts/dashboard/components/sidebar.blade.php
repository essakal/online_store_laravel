<nav id="sidenav-2"
    class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
    data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode="side" data-te-sidenav-content="#content">
    <h2 class="text-center p-4">mystore</h2>
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative">
            <a class="
         {{ Route::currentRouteNamed('dashboard')
             ? 'flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-white outline-none transition duration-300 ease-linear bg-blue-500 hover:bg-blue-600 hover:text-white hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10'
             : 'flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-blue-300 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10' }}
         "
                data-te-sidenav-link-ref href="{{ route('dashboard') }}">

                <span>dashboard</span>
            </a>
        </li>
    </ul>
</nav>
