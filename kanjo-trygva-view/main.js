const ax = axios.create({
  baseURL: "http://localhost:8080/",
  timeout: 1000,
  headers: { "Authorization": "Basic 123" },
});

function getUsers() {
  ax.get("/users").then(function (response) {
    $("#users").empty();
    for (let user of response.data.users) {
      $("#users").append(`
            <a class="list-group-item list-group-item-action" href="/users/${user.id}">
                ${user.id} - ${user.name}
            </a>
          `);
    }
  });
}

getUsers();

$(function () {
  $("#signup [name='submit']").on("click", function () {
    ax.post("/users", {
      name: $("[name='name']").val(),
      email: $("[name='email']").val(),
      phone: $("[name='phone']").val(),
      password: $("[name='password']").val(),
    }).then(function (response) {
      getUsers();
    });
  });

  $("#delete [name='delete-button']").on("click", function () {
    ax.delete("/users/" + $("[name='delete-id']").val()).then(function (response) {
      console.log(response);
      getUsers();
    });
  });
});
