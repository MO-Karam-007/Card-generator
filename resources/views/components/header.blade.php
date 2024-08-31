<header>
    <nav class="bg-white border-gray-200 px-0  py-2.5  dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>

            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <!-- <x-nav href="/" class="block py-2 pr-4 pl-3 {{ request()->is('/') ? 'text-white' :'text-gray-700'  }} rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white">Home</x-nav> -->
                        <x-nav href="/" :active="request()->is('/')">Home</x-nav>
                    </li>
                    <li>
                        <x-nav href="/jobs"
                            :active="request()->is('jobs')">Cards</x-nav>
                    </li>
                    <li>
                        <x-nav href="/contact"
                            :active="request()->is('contact')">Contact</x-nav>
                    </li>
                </ul>
            </div>

            @guest
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <x-nav href="/register" :active="request()->is('/register')">Register</x-nav>
                    </li>
                    <li>
                        <x-nav href="/login"
                            :active="request()->is('login')">Log in</x-nav>
                    </li>

                </ul>
            </div>
            @endguest
            @auth
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 mx-0 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                  
                    <form method="post" action="/logout" >
                        @csrf
                    <li>
                        <button class="rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Log out</button>
                        </li>
                    </form>

                </ul>
            </div>
            @endauth
            

        </div>
    </nav>
</header>