<?php if (isset($validation)) : ?>
    <div class="p-4 px-4 py-4 bg-red-400 rounded-lg shadow-md">
        <span class="font-thin"> <?= $validation->listErrors() ?> </span>
    </div>
<?php elseif (session()->get('success')) : ?>
    <div class="p-4 px-4 py-4 bg-green-200 rounded-lg shadow-md">
        <span class="font-thin"><?= session()->get('success') ?></span>
    </div>
<?php endif; ?>