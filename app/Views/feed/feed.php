<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="md:py-12 md:px-12 py-8 px-8 flex justify-between">
    <div class="flex flex-row">
        <img width="60" height="60" class="rounded-2xl" src="https://spng.pngfind.com/pngs/s/5-52097_avatar-png-pic-vector-avatar-icon-png-transparent.png" alt="">
        <span class="py-4 pl-4 font-semibold"><?= esc($user[0]['fullname']) ?></span>
    </div>
    <div class="py-6">
        <svg class="font-semibold" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
        </svg>
    </div>
</div>

<div class="md:px-8 md:py-2 px-4 py-4">
    <div class="rounded-lg p-8 bg-blue-400 shadow-md max-w-lg md:mx-auto">
        <span class="font-semibold text-xl text-white flex justify-center">
            Are you waiting for the Stranger Things Season 2?
        </span>
        <div class="pt-4 flex flex-col">
            <div class="rounded-lg text-white p-2 bg-blue-300 shadow md">
                Can't wait to watch the show 😄
            </div>
            <div class="pt-2">
                <div class="rounded-lg text-white p-2 bg-blue-300 shadow md">
                    Not really into it 😞
                </div>
            </div>
        </div>
        <div class="pt-4 flex flex-row justify-between">
            <span class="text-white">Ends Jun 4, 11:57 PM</span>
            <span class="text-white">10k votes</span>
        </div>
    </div>
</div>



<?= $this->endSection() ?>