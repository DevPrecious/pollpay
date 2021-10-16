<?= $this->extend('layouts/auth_layout') ?>

<?= $this->section('content') ?>

<div class="py-6 px-6">
    <div class="flex justify-center md:p-4 p-6 md:max-w-md max-w-lg mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
        <div class="py-4 px-4 flex flex-col">
            <span class="md:text-2xl text-xl md:flex md:justify-center font-bold">Create account</span>
            <span class="pt-2 font-light text-lg">Already have an account?
                <a href="/login" class="text-blue-700 font-semibold"><u>Login</u></a>
            </span>
            <form action="" class="">
                <div class="pt-6">
                    <input type="text" name="email" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Email Address" />
                </div>
                <div class="md:flex md:flex-row">
                    <div class="pt-6">
                        <input type="text" name="firstname" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="First Name" />
                    </div>
                    <div class="pt-6 md:pl-2">
                        <input type="text" name="lastname" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Last Name" />
                    </div>
                </div>
                <div class="pt-6">
                    <input type="password" name="password" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Password" />
                </div>
                <div class="pt-6">
                    <div class="flex justify-center md:p-1 p-2 max-w-lg mx-auto bg-blue-500 rounded-xl shadow-md">
                        <button type="submit" class="flex justify-evenly">
                            <span class="text-white">Sign Up</span>
                            <span class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="pt-6">
                    <input type="checkbox" name="" id="">
                    <span class="font-thin text-md">I agree to the terms and conditions</span>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>