$(document).ready(function(){

  $("#btn-login").click(function(event){
    event.preventDefault();
    //Login
    if ($("#uname").val() !== "" && $("#pword").val() !== "") {
      $.ajax({
        url: ".//db/login-action.php",
        type: "POST",
        dataType: "json",
        data: {
          uname: $("#uname").val(),
          pword: $("#pword").val()
        },
        success: function(data){
          console.log(data);
          location.reload(true);
        },
        error: function(err){
          alert(err);
        }
      });
    }else{
      $("#unameHelp").show();
      $("#pwordHelp").show();
      $("#uname").css("border","1px solid red");
      $("#pword").css("border","1px solid red");
    }
  });

  $("#dashboard").click(function(event){
    event.preventDefault();
    $("#dashboard").css("text-decoration","underline");
    $("#transaction").css("text-decoration","none");
    $("#reports").css("text-decoration","none");
    $("#userManagement").css("text-decoration","none");
    $("#maintenance").css("text-decoration","none");
    $("#logout").css("text-decoration","none");

    $("#dashboard-container").show();
    $("#transaction-container").hide();
  });

  $("#transaction").click(function(event){
    event.preventDefault();
    $("#transaction").css("text-decoration","underline");
    $("#dashboard").css("text-decoration","none");
    $("#reports").css("text-decoration","none");
    $("#userManagement").css("text-decoration","none");
    $("#maintenance").css("text-decoration","none");
    $("#logout").css("text-decoration","none");

    $("#transaction-container").show();
    $("#dashboard-container").hide();
  });

  $("#reports").click(function(event){
    event.preventDefault();
    $("#reports").css("text-decoration","underline");
    $("#dashboard").css("text-decoration","none");
    $("#transaction").css("text-decoration","none");
    $("#userManagement").css("text-decoration","none");
    $("#maintenance").css("text-decoration","none");
    $("#logout").css("text-decoration","none");

    $("#dashboard-container").hide();
    $("#transaction-container").hide();
  });

  $("#userManagement").click(function(event){
    event.preventDefault();
    $("#userManagement").css("text-decoration","underline");
    $("#dashboard").css("text-decoration","none");
    $("#transaction").css("text-decoration","none");
    $("#reports").css("text-decoration","none");
    $("#maintenance").css("text-decoration","none");
    $("#logout").css("text-decoration","none");

    $("#dashboard-container").hide();
    $("#transaction-container").hide();
  });

  $("#maintenance").click(function(event){
    event.preventDefault();
    $("#maintenance").css("text-decoration","underline");
    $("#dashboard").css("text-decoration","none");
    $("#transaction").css("text-decoration","none");
    $("#reports").css("text-decoration","none");
    $("#userManagement").css("text-decoration","none");
    $("#logout").css("text-decoration","none");

    $("#dashboard-container").hide();
    $("#transaction-container").hide();
  });

  $("#tbl-dashboard").DataTable();

  // $("#bdate").mask("9999/99/99", {placeholder: 'YYYY/MM/DD' });

  $("#btn-submitNewRecord").click(function(event){
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

    var bday = new Date(
      $("#bdate").val()
    );
    bday_day = bday.getDate();
    bday_month = bday.getMonth();
    bday_year = bday.getFullYear();

    if ($("#referringPhysicianOrNurse").val() !== "" && $("#lname").val() !== "" &&
      $("#fname").val() !== "" && $("#mname").val() !== "" &&
      $("#gender").val() !== "" && $("#homeAddress").val() !== "" &&
      $("#bplace").val() !== "" && $("#maritalStatus").val() !== "" &&
      $("#height").val() !== "" && $("#weight").val() !== "" &&
      $("#motherName").val() !== "" && $("#fatherName").val() !== ""
  ) {
    console.log($("#branch").val());
      $.ajax({
        url: ".//db/insertNewApplicant.php",
        type: "POST",
        dataType: "json",
        data: {
          branch_id: $("#branch").val() ,
          referringPhysicianOrNurse: $("#referringPhysicianOrNurse").val(),
          lname: $("#lname").val(),
          fname: $("#fname").val(),
          mname: $("#mname").val(),
          gender: $("#gender").val(),
          age: $("#age").val(),
          bdate: [
            bday_year,
            bday_month,
            bday_day
          ].join("-"),
          homeAddress: $("#homeAddress").val(),
          bplace: $("#bplace").val(),
          maritalStatus: $("#maritalStatus").val(),
          height: $("#height").val(),
          weight: $("#weight").val(),
          motherName: $("#motherName").val(),
          fatherName: $("#fatherName").val()
        },
        success: function(data){
          console.log(data);
          window.location.replace("http://localhost/rms");
        },
        error: function(err){
          alert(err);
        }
      });
    }


  });

})
