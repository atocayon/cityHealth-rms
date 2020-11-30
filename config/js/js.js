$(document).ready(function () {
  $("#btn-login").click(function (event) {
    event.preventDefault();
    //Login
    if ($("#uname").val() !== "" && $("#pword").val() !== "") {
      $.ajax({
        url: ".//db/login-action.php",
        type: "POST",
        dataType: "json",
        data: {
          uname: $("#uname").val(),
          pword: $("#pword").val(),
        },
        success: function (data) {
          console.log(data.login);
          if (data.login === "success") {
            location.reload(true);
          }

          if (data.login === "failed") {
            alert("Ops! It seems that you are an unregistered user...");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    } else {
      $("#unameHelp").show();
      $("#pwordHelp").show();
      $("#uname").css("border", "1px solid red");
      $("#pword").css("border", "1px solid red");
    }
  });

  $("#dashboard").click(function (event) {
    event.preventDefault();
    $("#dashboard").css("text-decoration", "underline");
    $("#transaction").css("text-decoration", "none");
    $("#reports").css("text-decoration", "none");
    $("#userManagement").css("text-decoration", "none");
    $("#maintenance").css("text-decoration", "none");
    $("#logout").css("text-decoration", "none");

    $("#dashboard-container").show();
    $("#transaction-container").hide();
    $("#maintenance-container").hide();
    $("#userManagement-container").hide();
    $("#generate-container").hide();
  });

  $("#transaction").click(function (event) {
    event.preventDefault();
    $("#transaction").css("text-decoration", "underline");
    $("#dashboard").css("text-decoration", "none");
    $("#reports").css("text-decoration", "none");
    $("#userManagement").css("text-decoration", "none");
    $("#maintenance").css("text-decoration", "none");
    $("#logout").css("text-decoration", "none");

    $("#transaction-container").show();
    $("#dashboard-container").hide();
    $("#maintenance-container").hide();
    $("#userManagement-container").hide();
    $("#generate-container").hide();
  });

  $("#reports").click(function (event) {
    event.preventDefault();
    $("#reports").css("text-decoration", "underline");
    $("#dashboard").css("text-decoration", "none");
    $("#transaction").css("text-decoration", "none");
    $("#userManagement").css("text-decoration", "none");
    $("#maintenance").css("text-decoration", "none");
    $("#logout").css("text-decoration", "none");

    $("#dashboard-container").hide();
    $("#transaction-container").hide();
    $("#maintenance-container").hide();
    $("#userManagement-container").hide();
    $("#generate-container").show();
  });

  $("#userManagement").click(function (event) {
    event.preventDefault();
    $("#userManagement").css("text-decoration", "underline");
    $("#dashboard").css("text-decoration", "none");
    $("#transaction").css("text-decoration", "none");
    $("#reports").css("text-decoration", "none");
    $("#maintenance").css("text-decoration", "none");
    $("#logout").css("text-decoration", "none");

    $("#dashboard-container").hide();
    $("#transaction-container").hide();
    $("#maintenance-container").hide();
    $("#userManagement-container").show();
    $("#generate-container").hide();
  });

  $("#maintenance").click(function (event) {
    event.preventDefault();
    $("#maintenance").css("text-decoration", "underline");
    $("#dashboard").css("text-decoration", "none");
    $("#transaction").css("text-decoration", "none");
    $("#reports").css("text-decoration", "none");
    $("#userManagement").css("text-decoration", "none");
    $("#logout").css("text-decoration", "none");

    $("#dashboard-container").hide();
    $("#transaction-container").hide();
    $("#userManagement-container").hide();
    $("#maintenance-container").show();
    $("#generate-container").hide();
  });

  $("#tbl-dashboard").DataTable();
  $("#tbl-modalManagePatient").DataTable();
  $("#tbl-manageBranch").DataTable();
  $("#manage-physicianOrNurse").DataTable();
  $("#tbl-manageAdmin").DataTable();
  $(".table-checkup-records").DataTable();

  // $("#bdate").mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });

  function upload_patient_img(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#patient_img").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#upload_patient_img").change(function () {
    upload_patient_img(this);
  });

  $("#btn-submitNewRecord").click(function (event) {
    event.preventDefault();

    if ($("#referringPhysicianOrNurse").val() === "") {
      $("#referringPhysicianOrNurse").css("border", "1px solid red");
    }

    if ($("#lname").val() === "") {
      $("#lname").css("border", "1px solid red");
    }

    if ($("#fname").val() === "") {
      $("#fname").css("border", "1px solid red");
    }

    if ($("#mname").val() === "") {
      $("#mname").css("border", "1px solid red");
    }

    if ($("#gender").val() === "") {
      $("#gender").css("border", "1px solid red");
    }

    if ($("#age").val() === "") {
      $("#age").css("border", "1px solid red");
    }

    if ($("#bdate").val() === "") {
      $("#bdate").css("border", "1px solid red");
    }

    if ($("#homeAddress").val() === "") {
      $("#homeAddress").css("border", "1px solid red");
    }

    if ($("#bplace").val() === "") {
      $("#bplace").css("border", "1px solid red");
    }

    if ($("#maritalStatus").val() === "") {
      $("#maritalStatus").css("border", "1px solid red");
    }

    if ($("#height").val() === "") {
      $("#height").css("border", "1px solid red");
    }

    if ($("#weight").val() === "") {
      $("#weight").css("border", "1px solid red");
    }

    if ($("#motherName").val() === "") {
      $("#motherName").css("border", "1px solid red");
    }

    if ($("#fatherName").val() === "") {
      $("#fatherName").css("border", "1px solid red");
    }

    var bday = new Date($("#bdate").val());
    bday_day = bday.getDate();
    bday_month =
      bday.getMonth() + 1 >= 10
        ? bday.getMonth() + 1
        : "0" + (bday.getMonth() + 1);
    bday_year = bday.getFullYear();

    if (
      $("#referringPhysicianOrNurse").val() !== "" &&
      $("#lname").val() !== "" &&
      $("#fname").val() !== "" &&
      $("#mname").val() !== "" &&
      $("#gender").val() !== "" &&
      $("#homeAddress").val() !== "" &&
      $("#bplace").val() !== "" &&
      $("#maritalStatus").val() !== "" &&
      $("#height").val() !== "" &&
      $("#weight").val() !== "" &&
      $("#motherName").val() !== "" &&
      $("#fatherName").val() !== ""
    ) {
      let form_data = new FormData();
      let patient_img = $("#upload_patient_img").prop("files")[0];
      form_data.append("patient_img", patient_img);
      form_data.append("branch_id", $("#branch").val());
      form_data.append("lname", $("#lname").val());
      form_data.append("fname", $("#fname").val());
      form_data.append("mname", $("#mname").val());
      form_data.append("gender", $("#gender").val());
      form_data.append("age", $("#age").val());
      form_data.append("bdate", [bday_year, bday_month, bday_day].join("-"));
      form_data.append("homeAddress", $("#homeAddress").val());
      form_data.append("bplace", $("#bplace").val());
      form_data.append("maritalStatus", $("#maritalStatus").val());
      form_data.append("height", $("#height").val());
      form_data.append("weight", $("#weight").val());
      form_data.append("motherName", $("#motherName").val());
      form_data.append("fatherName", $("#fatherName").val());
      $.ajax({
        url: ".//db/insertNewApplicant.php",
        type: "POST",
        dataType: "json",
        data: form_data,
        success: function (data) {
          console.log(data);
          if (data.insert === "success") {
            window.location.replace("http://localhost/cityHealth-rms");
          } else {
            alert("Already in database...");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    }
  });

  function update_patient_img(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#patient_img_update").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#update_patient_img").change(function () {
    update_patient_img(this);
  });

  $("#btn-editRecord").click(function () {
    $("#referringPhysicianOrNurse").prop("disabled", false);
    $("#lname").prop("disabled", false);
    $("#fname").prop("disabled", false);
    $("#mname").prop("disabled", false);
    $("#gender").prop("disabled", false);
    $("#age").prop("disabled", false);
    $("#bdate").prop("disabled", false);
    $("#homeAddress").prop("disabled", false);
    $("#bplace").prop("disabled", false);
    $("#maritalStatus").prop("disabled", false);
    $("#height").prop("disabled", false);
    $("#weight").prop("disabled", false);
    $("#motherName").prop("disabled", false);
    $("#fatherName").prop("disabled", false);
    $("#update_patient_img").prop("disabled", false);
    $("#btn-editRecord").hide();
    $("#btn-updateRecord").show();
    $("#btn-deleteRecord").prop("disabled", true);
    $("#btn-checkUp").prop("disabled", true);
  });

  $("#btn-updateRecord").click(function () {
    var bday = new Date($("#bdate").val());
    bday_day = bday.getDate();
    bday_month =
      bday.getMonth() + 1 >= 10
        ? bday.getMonth() + 1
        : "0" + (bday.getMonth() + 1);
    bday_year = bday.getFullYear();
    let form_data = new FormData();
    let update_img = $("#update_patient_img").prop("files")[0];
    form_data.append("update_img", update_img);
    form_data.append("branch", $("#branch").val());
    form_data.append("patient_id", $("#patient_id").val());
    form_data.append("lname", $("#lname").val());
    form_data.append("fname", $("#fname").val());
    form_data.append("mname", $("#mname").val());
    form_data.append("gender", $("#gender").val());
    form_data.append("age", $("#age").val());
    form_data.append("bdate", [bday_year, bday_month, bday_day].join("-"));
    form_data.append("homeAddress", $("#homeAddress").val());
    form_data.append("bplace", $("#bplace").val());
    form_data.append("maritalStatus", $("#maritalStatus").val());
    form_data.append("height", $("#height").val());
    form_data.append("weight", $("#weight").val());
    form_data.append("motherName", $("#motherName").val());
    form_data.append("fatherName", $("#fatherName").val());
    $.ajax({
      url: ".//db/updateRecord.php",
      type: "POST",
      dataType: "json",
      data: form_data,
      success: function (data) {
        $("#referringPhysicianOrNurse").prop("disabled", true);
        $("#lname").prop("disabled", true);
        $("#fname").prop("disabled", true);
        $("#mname").prop("disabled", true);
        $("#gender").prop("disabled", true);
        $("#age").prop("disabled", true);
        $("#bdate").prop("disabled", true);
        $("#homeAddress").prop("disabled", true);
        $("#bplace").prop("disabled", true);
        $("#maritalStatus").prop("disabled", true);
        $("#height").prop("disabled", true);
        $("#weight").prop("disabled", true);
        $("#motherName").prop("disabled", true);
        $("#fatherName").prop("disabled", true);
        $("#update_patient_img").prop("disabled", true);

        $("#btn-editRecord").show();
        $("#btn-updateRecord").hide();
        $("#btn-deleteRecord").prop("disabled", false);
        $("#btn-checkUp").prop("disabled", false);
      },
      error: function (err) {
        alert(err);
      },
    });
  });

  $("#btn-deleteRecord").click(function () {
    $.ajax({
      url: ".//db/deleteRecord.php",
      type: "POST",
      dataType: "json",
      data: {
        patient_id: $("#patient_id").val(),
      },
      success: function (data) {
        console.log(data);
        window.location.replace("http://localhost/rms");
      },
      error: function (err) {
        alert(err);
      },
    });
  });

  $("#btn-saveCheckUp").click(function () {
    if (
      $("#checkUpType").val() !== "" &&
      $("#treatment").val() !== "" &&
      $("#findings").val() !== ""
    ) {
      let form_data = new FormData();
      let scanned = $("#scanned_form").props("files")[0];
      form_data.append("scanned_form", scanned);
      form_data.append("patient_id", $("#patient_id").val());
      form_data.append("physicianOrNurse", $("#physicianOrNurse").val());
      form_data.appendO("checkUpType", $("#checkUpType").val());
      form_data.append("treatment", $("#treatment").val());
      form_data.append("findings", $("#findings").val());
      $.ajax({
        url: ".//db/recordCheckUp.php",
        type: "POST",
        dataType: "json",
        data: form_data,
        succes: function (data) {
          if (data.insert === "success") {
            window.location.replace("http://localhost/cityHealth-rms");
          } else {
            alert("Already in database...");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    } else {
      $("#physicianOrNurse").css("border", "1px solid red");
      $("#checkUpType").css("border", "1px solid red");
      $("#treatment").css("border", "1px solid red");
      $("#findings").css("border", "1px solid red");
    }
  });

  $("#save").click(function () {
    if ($("#userBranch").val() === "") {
      $("#userBranch").css("border", "1px solid red");
    }

    if ($("#userName").val() === "") {
      $("#userName").css("border", "1px solid red");
    }

    if ($("#userPassword").val() === "") {
      $("#userPassword").css("border", "1px solid red");
    }

    if ($("#userBranch").val() !== "") {
      $("#userBranch").css("border", "1px solid #E0E0E0");
    }

    if ($("#userName").val() !== "") {
      $("#userName").css("border", "1px solid #E0E0E0");
    }

    if ($("#userPassword").val() !== "") {
      $("#userPassword").css("border", "1px solid #E0E0E0");
    }

    if (
      $("#userBranch").val() !== "" &&
      $("#userName").val() !== "" &&
      $("#userPassword").val() !== ""
    ) {
      $.ajax({
        url: ".//db/insertNewUser.php",
        type: "POST",
        dataType: "json",
        data: {
          sessionUser: $("#sessionUser").val(),
          userBranch: $("#userBranch").val(),
          userName: $("#userName").val(),
          userPassword: $("#userPassword").val(),
        },
        success: function (data) {
          if (data.insert === "success") {
            confirm("Success!!!");
            $("#userManagementModal").modal("hide");
          }

          if (data.insert === "exist") {
            confirm("The username is already taken!!!");
            $("#userManagementModal").modal("hide");
          }
        },
        error: function (err) {
          console.log(err);
          alert(err);
        },
      });
    }
  });

  function update_physician_img(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#physician_img").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#update_physician_img").change(function () {
    update_physician_img(this);
  });

  $("#btn-editUserInfo").click(function () {
    $("#btn-editUserInfo").hide();
    $("#btn-updateUserInfo").show();
    $("#btn-addNewUser").hide();

    $("#user-Username").prop("disabled", false);
    $("#user-Password").prop("disabled", false);
    $("#update_physician_img").prop("disabled", false);
    $("#user-Title").prop("disabled", false);
    $("#user-Name").prop("disabled", false);
  });

  $("#btn-updateUserInfo").click(function () {
    let form_data = new FormData();
    let physician_img = $("#upload_physician_img").prop("files")[0];

    form_data.append("physician_img", physician_img);
    form_data.append("name", $("#user-Name").val());
    form_data.append("title", $("#user-Title").val());
    form_data.append("username", $("#user-Username").val());
    form_data.append("password", $("#user-Password").val());
    $.ajax({
      url: ".//db/updateUserInfo.php",
      type: "POST",
      dataType: "json",
      data: form_data,
      success: function (data) {
        if (data.update === "duplicate") {
          confirm("Username is already taken!!!");
        }

        if (data.update === "success") {
          confirm("Update Success");
          $("#btn-editUserInfo").show();
          $("#btn-updateUserInfo").hide();
          $("#btn-addNewUser").show();

          $("#user-Username").prop("disabled", true);
          $("#user-Password").prop("disabled", true);
          $("#update_physician_img").prop("disabled", true);
          $("#user-Title").prop("disabled", true);
          $("#user-Name").prop("disabled", true);
        }
      },
      error: function (err) {},
    });
  });

  $("#btn-addNewPhysician").click(function () {
    $(".tableManagePhysician-container").hide();
    $("#btn-addNewPhysician").hide();
    $(".addNewPhysician-container").show();
    $("#btn-saveNewPhysician").show();
    $("#btn-backManagePhysician").show();
  });

  function upload_physician_img(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#physician-img").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#upload_physician_img").change(function () {
    upload_physician_img(this);
  });
  $("#btn-saveNewPhysician").click(function () {
    if (
      $("#userBranch").val() === "" &&
      $("#title").val() === "" &&
      $("#physician_name").val() === "" &&
      $("#physician_uname").val() === "" &&
      $("#physician_pword").val() === "" &&
      $("#physician_cpword").val() === ""
    ) {
      $("#title").css("border", "1px solid red");
      $("#physician_name").css("border", "1px solid red");
      $("#physician_uname").css("border", "1px solid red");
      $("#physician_pword").css("border", "1px solid red");
      $("#physician_cpword").css("border", "1px solid red");
      $("#userBranch").css("border", "1px solid red");
    } else {
      if ($("#physician_pword").val() === $("#physician_cpword").val()) {
        let form_data = new FormData();
        let upload_physician_img = $("#upload_physician_img").prop("files")[0];
        form_data.append("physician_img", upload_physician_img);
        form_data.append("branch", $("#userBranch").val());
        form_data.append("title", $("#title").val());
        form_data.append("name", $("#physician_name").val());
        form_data.append("uname", $("#physician_uname").val());
        form_data.append("pword", $("#physician_pword").val());
        $.ajax({
          url: ".//db/saveNewPhysician.php",
          type: "POST",
          dataType: "json",
          data: form_data,
          success: function (data) {
            console.log(data);
            if (data.insert === "failed") {
              alert("Warning, Data duplication!");
            }

            if (data.insert === "success") {
              window.location.replace("http://localhost/cityHealth-rms");
            }
          },
          error: function (err) {
            alert(err);
          },
        });
      } else {
        alert("Password don't match...");
        $("#physician_pword").css("border", "1px solid red");
        $("#physician_cpword").css("border", "1px solid red");
      }
    }
  });

  $("#btn-backManagePhysician").click(function () {
    $(".tableManagePhysician-container").show();
    $("#btn-addNewPhysician").show();
    $(".addNewPhysician-container").hide();
    $("#btn-saveNewPhysician").hide();
    $("#btn-backManagePhysician").hide();
  });

  $("#findings").on("change", function () {
    var value = this.value;
    // console.log(value);

    if ($("#findings").val() !== "") {
      $.ajax({
        url: ".//db/findings.php",
        type: "POST",
        dataType: "json",
        data: {
          findings: value,
        },
        success: function (data) {
          console.log(data);
          console.log(data.length);
          // array = [];
          // for (var i = 0; i < data.length; i++) {
          //   array.push(data[i]);
          // }

          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title: {
              text: value,
            },
            data: [
              {
                type: "column", //change type to bar, line, area, pie, etc
                indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelFontSize: 16,
                indexLabelPlacement: "outside",
                dataPoints: data,
              },
            ],
          });

          chart.render();
        },
        error: function (err) {
          alert(err);
        },
      });
    }
  });
});
