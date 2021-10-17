<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title><?= esc($title) ?></title>
</head>

<body class="bg-yellow-100">
    <?= $this->renderSection('content') ?>
</body>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        var i = 1;

        $("#add").click(function(e) {
            e.preventDefault();
            i++;
            $('#dynamic_field').append('<div id="row' + i + '"><input type="text" name="name[]" class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Option" /> <div class="p-2"> <button class = "btn-remove w-full rounded-lg text-white shadow-md bg-blue-200" id = "' + i + '" > - </button> </div></div>')
        });

        $(document).on('click', '.btn-remove', function(e) {
            e.preventDefault();
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>

</html>