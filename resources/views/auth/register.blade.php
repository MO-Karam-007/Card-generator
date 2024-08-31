<x-layout>
    <x-slot:header>
        Create New Account
        <p class="mt-1 text-sm leading-6 text-gray-600">Join Us</p>

    </x-slot:header>
    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                       
                        <x-form-label for='name'>Full Name</x-form-label>
                        <div class="mt-2">
                           
                            <x-form-input   type="text" name="name" id="name" />
                           
                            <x-form-error name='name' />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                       
                        <x-form-label for='email'>E-mail</x-form-label>
                        <div class="mt-2">
                           
                            <x-form-input   type="email" name="email" id="email" />
                           
                            <x-form-error name='email' />
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                       
                        <x-form-label for='password'>Password</x-form-label>
                        <div class="mt-2">
                           
                            <x-form-input   type="password" name="password" id="password" />
                           
                            <x-form-error name='password' />
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <x-form-label for='password_confirmation'>Confirm Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation" id="password_confirmation" />

                            <x-form-error name='password_confirmation' />
                          
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="">
                <a href="/jobs"
                    class="rounded-md bg-yellow-600 px-3 py-3 mx-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Cancel
                </a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>





</x-layout>
