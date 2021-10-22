<?= $this->extend('layouts/auth_layout') ?>

<?= $this->section('content') ?>

<div class="py-6 px-6">
    <div class="flex justify-center md:p-4 p-6 md:max-w-md max-w-lg mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
        <div class="py-4 px-4 flex flex-col">
            <span class="md:text-2xl text-xl md:flex md:justify-center font-bold">Deposit</span>
            <!-- <span class="pt-2 font-light text-lg">PollPay
            </span> -->
            <form action="" method="POST" class="">
                <?= $this->include('layouts/messages') ?>
                <?= csrf_field() ?>
                <div class="pt-6">
                    <input type="number" name="amount" value="<?= set_value('amount') ?>" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="500" />
                </div>
                <!-- <div class="pt-6">
                    <input type="password" name="password" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Password" />
                </div> -->
                <div class="pt-6">
                    <div class="flex justify-center md:p-1 p-2 max-w-lg mx-auto bg-blue-500 rounded-xl shadow-md">
                        <button type="submit" class="text-white flex justify-evenly">
                            Fund Wallet
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