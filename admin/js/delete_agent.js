jQuery(document).ready(function ($) {
  const table = document.querySelector("#goa_booking_add_agent_table");
  const btns = table.querySelectorAll(".goa_booking_delete_agent_button");
  const modal = document.querySelector("#modalDeleteAgent");
  const discard = modal.querySelector(".delete_agent_button_discard");
  const approve = modal.querySelector(".delete_agent_button_approve");

  const data = {};

  let currentBtn = null;

  btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      currentBtn = e.currentTarget;
      data.id = currentBtn.getAttribute("data-agent-id");
      data.login = currentBtn.getAttribute("data-agent-login");

      modal.querySelector(".modal-title").innerHTML += data.login;
    });
  });

  discard.addEventListener("click", () => {
    currentBtn = null;
    delete data.id;
    delete data.login;
  });

  approve.addEventListener("click", () => {
    data.action = "admin_delete_agent";
    data.nonce = goa_booking_admin_delete_agent_obj.nonce;

    $.ajax({
      url: goa_booking_admin_delete_agent_obj.ajaxurl,
      type: "post",
      data: data,
      success: function (data) {
        let response = JSON.parse(data);

        if (response.status) {
          currentBtn.closest("tr").remove();
          $("#modalDeleteAgent").modal("hide");
        }
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });
});
