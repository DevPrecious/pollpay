$(document).ready(function () {
  var i = 1;

  $("#add").click(function (e) {
    e.preventDefault();
    i++;
    $("#dynamic_field").append(
      '<div id="row' +
        i +
        '"><input type="text" name="option[]" required class="rounded-lg p-4 ring ring-gray-100 ring-offset-0 w-full h-8 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Option" /> <div class="p-2"> <button class = "btn-remove w-full rounded-lg text-white shadow-md bg-blue-200" id = "' +
        i +
        '" > - </button> </div></div>'
    );
  });

  $(document).on("click", ".btn-remove", function (e) {
    e.preventDefault();
    var button_id = $(this).attr("id");
    $("#row" + button_id + "").remove();
  });

  $("#submit").click(function (e) {
    e.preventDefault();
    $.ajax({
      url: "/store",
      method: "POST",
      data: $("#add_poll").serialize(),
      type: "json",
      success: function (data) {
        // alert();
        // console.log(data);
        $("#add_poll")[0].reset();
        Toastify({
          text: "Poll Created",
          className: "info",
          style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
          },
        }).showToast();
      },
      error: function (data) {
        // console.log(data);
        Toastify({
          text: data.responseJSON.messages.title,
          className: "info",
          style: {
            background: "red",
          },
        }).showToast();
        Toastify({
          text: data.responseJSON.messages.amount,
          className: "info",
          style: {
            background: "red",
          },
        }).showToast();
      },
    });
  });
});
