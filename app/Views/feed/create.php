<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-6 px-6">
    <div class="flex justify-center md:p-4 p-6 md:max-w-md max-w-lg mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
        <div class="py-4 px-4 flex flex-col">
            <span class="md:text-2xl text-xl md:flex md:justify-center font-bold">Create a Poll</span>
            <!-- <span class="pt-2 font-light text-lg">PollPay
                <a href="/register" class="text-blue-700 font-semibold"><u>Register</u></a>
            </span> -->
            <form id="add_poll" class="">
                <?= $this->include('layouts/messages') ?>
                <!-- <?= csrf_field() ?> -->
                <div class="pt-6">
                    <input type="text" name="title" value="<?= set_value('title') ?>" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="What is it about?" />
                </div>
                <div class="pt-6" id="dynamic_field">
                    <div class="flex flex-col">
                        <input type="text" name="option[]" required class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Option" />
                    </div>
                    <div class="p-2">
                        <button class="w-full rounded-lg text-white shadow-md bg-blue-200" id="add">+</button>
                    </div>
                </div>
                <div class="pt-6">
                    <input type="number" name="amount" id="amount" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Stake">
                </div>
                <div class="pt-6">
                    <input type="datetime-local" required name="datetostop" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Time to stop" />
                </div>
                <div class="pt-6">
                    <div class="flex justify-center md:p-1 p-2 max-w-lg mx-auto bg-blue-500 rounded-xl shadow-md">
                        <button type="submit" id="submit" class="flex justify-evenly">
                            <span class="text-white">Create</span>
                            <span class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- <div class="pt-6">
                    <input type="checkbox" name="" id="">
                    <span class="font-thin text-md">Remember me</span>
                </div> -->
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>