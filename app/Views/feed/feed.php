<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="md:py-12 md:px-12 py-8 px-8 flex justify-between">
    <div class="flex flex-row">
        <img width="60" height="60" class="rounded-2xl" src="https://spng.pngfind.com/pngs/s/5-52097_avatar-png-pic-vector-avatar-icon-png-transparent.png" alt="">
        <span class="py-4 pl-4 font-semibold"><?= esc($user['fullname']) ?></span>
    </div>
    <div class="py-6">
        <svg class="font-semibold" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
        </svg>
    </div>
</div>
<?php foreach ($polls as $poll) : ?>
    <div class="md:px-8 md:py-2 px-4 py-4" id="vote_sec">
        <div class="rounded-lg p-8 bg-blue-400 shadow-md max-w-lg md:mx-auto">
            <span class="font-semibold text-xl text-white flex justify-center">
                <?= esc($poll['title']) ?>
            </span>
            <input type="hidden" name="poll_id" id="poll_id" value="<?= esc($poll['poll_id']) ?>">
            <div class="pt-4">
                <input type="number" name="staked" id="staked" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Stake">
            </div>
            <div class="pt-2 flex flex-col">
                <?php foreach ($poll['options'] as $opt) : ?>
                    <div class="pt-4">
                        <button id="<?= esc($opt['option_id']) ?>" class="click-on w-full rounded-lg text-white p-2 bg-blue-300 shadow md">
                            <?= esc($opt['option']) ?>
                        </button>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="pt-2">
                    <div class="rounded-lg text-white p-2 bg-blue-300 shadow md">
                        Not really into it 😞
                    </div>
                </div> -->
            </div>
            <div class="pt-4 flex flex-row justify-between">
                <span class="text-white">
                    Ends
                    <?php
                    $time_to = $time::parse(esc($poll['end_at']));
                    ?>
                    <?= esc($time_to->humanize()) ?>
                </span>
                <span class="text-white"><?= esc($poll['votes']) ?> votes</span>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<?= $this->endSection() ?>