$(document).ready(function () {
    cargarUsuarios();
  
    $("#fm").on("submit", function (e) {
      e.preventDefault();
      if (isEditing) {
        editarUsuario();
      } else {
        agregarUsuario();
      }
    });
  });
  
  function cargarUsuarios() {
    $.ajax({
      url: "../Controllers/ApiRest.php",
      type: "GET",
      dataType: "json",
      success: function (data) {
        let rows = "";
        data.forEach((u) => {
          rows += `
                  <tr>
                      <td>${u.cedula}</td>
                      <td>${u.nombre}</td>
                      <td>${u.apellido}</td>
                      <td>${u.direccion}</td>
                      <td>${u.telefono}</td>
                      <td>
                          <button class="btn btn-warning btn-sm rounded-pill" onclick="showEditUser(${u.cedula})"><i class="fa fa-edit"></i> Edit</button>
                          <button class="btn btn-danger btn-sm rounded-pill" onclick="deleteUser(${u.cedula})"><i class="fa fa-trash"></i> Delete</button>
                      </td>
                  </tr>`;
        });
        $("#userTable tbody").html(rows);
      },
    });
  }
  
  function showNewUserModal() {
    isEditing = false;
    $("#fm")[0].reset();
    $('input[name="cedula"]').prop("readonly", false);
    userModal.show();
  }
  
  function showEditUser(cedula) {
    $.ajax({
      url: `../controllers/ApiRest.php?cedula=${cedula}`,
      type: "GET",
      dataType: "json",
      success: function (data) {
        
        if (Array.isArray(data) && data.length > 0) {
          const user = data.find(u => u.cedula == cedula);
          if (user) {
            fillUserForm(user);
          } else {
            alert("No se encontró el usuario con esa cédula");
          }
        } else {
          alert("No se encontró información del usuario");
        }
      },
      error: function(xhr, status, error) {
        console.error("Error al cargar los datos del usuario:", error);
        alert("Error al cargar los datos del usuario");
      }
    });
  }
  
    // Rellenar el formulario con los datos del usuario
  function fillUserForm(user) {
    isEditing = true;
    $('#fm [name="cedula"]').val(user.cedula).prop("readonly", true);
    $('#fm [name="nombre"]').val(user.nombre);
    $('#fm [name="apellido"]').val(user.apellido);
    $('#fm [name="direccion"]').val(user.direccion);
    $('#fm [name="telefono"]').val(user.telefono);
    userModal.show();
  }
  
  function agregarUsuario() {
    $.post(
      "../Controllers/ApiRest.php",
      $("#fm").serialize(),
      function (res) {
        if (res.success) {
          userModal.hide();
          cargarUsuarios();
        } else {
          alert(res.error || "Error al agregar usuario.");
        }
      },
      "json"
    );
  }
  
  function editarUsuario() {
    const datos = {
      cedula: $('input[name="cedula"]').val(),
      nombre: $('input[name="nombre"]').val(),
      apellido: $('input[name="apellido"]').val(),
      direccion: $('input[name="direccion"]').val(),
      telefono: $('input[name="telefono"]').val(),
    };
    $.ajax({
      url: "../Controllers/ApiRest.php",
      type: "PUT",
      contentType: "application/json",
      data: JSON.stringify(datos),
      success: function () {
        userModal.hide();
        cargarUsuarios();
      },
      error: function () {
        alert("Error al editar el usuario");
      },
    });
  }
  
  function deleteUser(cedula) {
    if (!confirm("¿Estás seguro de eliminar este usuario?")) return;
    $.ajax({
      url: "../Controllers/ApiRest.php?cedula=" + cedula,
      type: "DELETE",
      success: function (res) {
        if (res.success) {
          cargarUsuarios();
        } else {
          alert(res.error || "Error al eliminar usuario.");
        }
      },
    });
  }