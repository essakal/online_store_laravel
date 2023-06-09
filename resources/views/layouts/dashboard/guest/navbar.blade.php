<nav class="flex-no-wrap relative flex w-full items-center justify-between bg-neutral-100 py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4"
    data-te-navbar-ref>
    <div class="flex w-full flex-wrap items-center justify-between px-3">

        <!-- Collapsible navigation container -->
        <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
            id="navbarSupportedContent1" data-te-collapse-item>

            <!-- Left navigation links -->
            <div>

                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <!-- Dashboard link -->
                        <a class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="{{ route('guest.produit.index') }}" data-te-nav-link-ref>Home</a>
                    </li>
                    <!-- Team link -->
                    {{-- <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="#" data-te-nav-link-ref>Team</a>
                    </li> --}}
                </ul>
            </div>
            {{-- categories  --}}
            <div>
                <ul class="mr-auto flex flex-row" data-te-navbar-nav-ref>
                    <li class="static" data-te-nav-item-ref data-te-dropdown-ref>
                        <a class="flex items-center whitespace-nowrap py-2 pr-2  transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 dark:hover:text-white dark:focus:text-white lg:px-2"
                            href="#" data-te-ripple-init data-te-ripple-color="light" type="button"
                            id="dropdownMenuButtonX" data-te-dropdown-toggle-ref aria-expanded="false"
                            data-te-nav-link-ref>categories
                            <span class="ml-2 w-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                        <div class="absolute left-0 right-0 top-full z-[1000] mt-0 hidden w-full border-none bg-white bg-clip-padding text-neutral-600 shadow-lg dark:bg-neutral-700 dark:text-neutral-200 [&[data-te-dropdown-show]]:block"
                            aria-labelledby="dropdownMenuButtonX" data-te-dropdown-menu-ref>
                            <div class="px-6 py-5 lg:px-8">
                                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                                    <div>
                                        @yield('categories')
                                        {{-- <a href="#!" aria-current="true"
                                            class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
                                            Lorem ipsum
                                        </a>
                                        <a href="#!" aria-current="true"
                                            class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700 dark:border-neutral-500 dark:hover:bg-neutral-800 dark:hover:text-white">
                                            Lorem ipsum
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            {{-- search  --}}
            <div class="mx-8">
                <form action="{{ route('guest.produit.search') }}" class="relative flex w-full flex-wrap items-stretch">
                    <input type="search" name="search"
                        class="relative w-72 m-0 -mr-0.5 block min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                        placeholder="Search" aria-label="Search" aria-describedby="button-addon3" />

                    <button type="submit"
                        class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
                        type="button" id="button-addon3" data-te-ripple-init>
                        Search
                    </button>
                </form>
            </div>
            {{-- price range --}}

            <form class="" action="{{ route('guest.produit.filter') }}">
                {{-- <label for="min-price" class="font-bold">Min Price</label> --}}
                <input type="number" id="min-price" name="min-price" class="border rounded-lg py-1 px-2" min="0"
                    step="0.01" placeholder="min price">

                {{-- <label for="max-price" class="font-bold">Max Price</label> --}}
                <input type="number" id="max-price" name="max-price" class="border rounded-lg py-1 px-2" min="0"
                    step="0.01" placeholder="max price">

                <button type="submit"
                    class="bg-blue-500 text-white rounded-lg py-1 px-4 hover:bg-blue-600">Filter</button>
            </form>


        </div>
        <!-- Right elements -->
        <div class="relative flex items-center">
            <!-- Cart Icon -->
            <a class="mr-4 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                href="{{route('guest.produit.shopping')}}">
                <span class="[&>svg]:w-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                    </svg>
                </span>
            </a>

            <!-- Container with two dropdown menus -->
            <div class="relative" data-te-dropdown-ref>
                <!-- First dropdown trigger -->
                <a class="hidden-arrow mr-4 flex items-center text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                    href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref
                    aria-expanded="false">
                    <!-- Dropdown trigger icon -->
                    <span class="[&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <!-- Notification counter -->
                    <span
                        class="absolute -mt-2.5 ml-2 rounded-[0.37rem] bg-danger px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">1</span>
                </a>
                <!-- First dropdown menu -->
                <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                    <!-- First dropdown menu items -->
                    <li>
                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            href="#" data-te-dropdown-item-ref>notification 1</a>
                    </li>
                    <li>
                        <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                            href="#" data-te-dropdown-item-ref>notification 2</a>
                    </li>
                </ul>
            </div>

            <!-- Second dropdown container -->
            <div class="relative" data-te-dropdown-ref>
                <a href="{{ route('login') }}"
                    class="mr-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    login
                </a>
            </div>
        </div>
    </div>
</nav>
