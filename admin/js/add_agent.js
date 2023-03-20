jQuery(document).ready(function ($) {
  const table = document.querySelector("#goa_booking_add_agent_table");
  const form = document.querySelector("#goa_booking_add_agent_form");
  const btn = document.querySelector("#goa_booking_add_agent_button");
  const inputs = form.querySelectorAll("input");
  const data = {};

  btn.addEventListener("click", (e) => {
    inputs.forEach((item) => {
      e.preventDefault();

      data[item.name] = item.value;
      item.classList.remove("border-danger");
    });

    data.action = "admin_add_agent";
    data.nonce = goa_booking_admin_add_agent_obj.nonce;

    console.log(data);
    $.ajax({
      url: goa_booking_admin_add_agent_obj.ajaxurl,
      type: "post",
      data: data,
      success: function (data) {
        let response = JSON.parse(data);
        console.log(response);

        if (response.error_fields.length > 0) {
          response.error_fields.forEach((item) => {
            console.log(item);
            form.querySelector(`[name=${item}]`).classList.add("border-danger");
          });
        } else {
          table
            .querySelector("tbody")
            .insertAdjacentHTML("beforeend", response.html);
          $("#modalAddAgent").modal("hide");
          form.reset();
          console.log("нет ошибок");
        }
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });
});
