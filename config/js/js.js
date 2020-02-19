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
    $("#maintenance-container").hide();
    $("#userManagement-container").hide();
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
    $("#maintenance-container").hide();
    $("#userManagement-container").hide();
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
    $("#maintenance-container").hide();
    $("#userManagement-container").hide();
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
    $("#maintenance-container").hide();
    $("#userManagement-container").show();
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
    $("#userManagement-container").hide();
    $("#maintenance-container").show();
  });

  $("#tbl-dashboard").DataTable();
  $("#tbl-modalManagePatient").DataTable();
  $("#tbl-manageBranch").DataTable();

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
          if (data.insert === 'success') {
            window.location.replace("http://localhost/rms");
          }else{
            alert("Already in database...");
          }

        },
        error: function(err){
          alert(err);
        }
      });
    }


  });

  $("#btn-editRecord").click(function(){
    $("#referringPhysicianOrNurse").prop("disabled",false);
    $("#lname").prop("disabled",false);
    $("#fname").prop("disabled",false);
    $("#mname").prop("disabled",false);
    $("#gender").prop("disabled",false);
    $("#age").prop("disabled",false);
    $("#bdate").prop("disabled",false);
    $("#homeAddress").prop("disabled",false);
    $("#bplace").prop("disabled",false);
    $("#maritalStatus").prop("disabled",false);
    $("#height").prop("disabled",false);
    $("#weight").prop("disabled",false);
    $("#motherName").prop("disabled",false);
    $("#fatherName").prop("disabled",false);
    $("#btn-editRecord").hide();
    $("#btn-updateRecord").show();
    $("#btn-deleteRecord").prop("disabled",true);
    $("#btn-checkUp").prop("disabled",true);
  });

  $("#btn-updateRecord").click(function(){

    var bday = new Date(
      $("#bdate").val()
    );
    bday_day = bday.getDate();
    bday_month = bday.getMonth();
    bday_year = bday.getFullYear();

    $.ajax({
      url: ".//db/updateRecord.php",
      type: "POST",
      dataType: "json",
      data: {
        branch: $("#branch").val(),
        patient_id: $("#patient_id").val(),
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
        $("#referringPhysicianOrNurse").prop("disabled",true);
        $("#lname").prop("disabled",true);
        $("#fname").prop("disabled",true);
        $("#mname").prop("disabled",true);
        $("#gender").prop("disabled",true);
        $("#age").prop("disabled",true);
        $("#bdate").prop("disabled",true);
        $("#homeAddress").prop("disabled",true);
        $("#bplace").prop("disabled",true);
        $("#maritalStatus").prop("disabled",true);
        $("#height").prop("disabled",true);
        $("#weight").prop("disabled",true);
        $("#motherName").prop("disabled",true);
        $("#fatherName").prop("disabled",true);
        $("#btn-editRecord").show();
        $("#btn-updateRecord").hide();
        $("#btn-deleteRecord").prop("disabled",false);
        $("#btn-checkUp").prop("disabled",false);
      },
      error: function(err){
        alert(err);
      }
    });
  });

  $("#btn-deleteRecord").click(function(){
    $.ajax({
      url: ".//db/deleteRecord.php",
      type: "POST",
      dataType: "json",
      data: {
        patient_id: $("#patient_id").val()
      },
      success: function(data){
          console.log(data);
          window.location.replace("http://localhost/rms");
      },
      error: function(err){
        alert(err);
      }
    });
  });

  $("#btn-saveCheckUp").click(function(){

    if ($("#physicianOrNurse").val() !== "" && $("#checkUpType").val() !== "" && $("#treatment").val() !== "" && $("#findings").val() !== "") {
      $.ajax({
        url: ".//db/recordCheckUp.php",
        type: "POST",
        dataType: "json",
        data: {
          patient_id: $("#patient_id").val(),
          physicianOrNurse: $("#physicianOrNurse").val(),
          checkUpType: $("#checkUpType").val(),
          treatment: $("#treatment").val(),
          findings: $("#findings").val()
        },
        succes: function(data){
            console.log(data);
            $("#myModal").modal("hide");
            window.location.replace("http://localhost/rms/patient.php?id="+$("#patient_id").val());

        },
        error: function(err){
          alert(err);
        }
      });
    }else{
      $("#physicianOrNurse").css("border","1px solid red");
      $("#checkUpType").css("border","1px solid red");
      $("#treatment").css("border","1px solid red");
      $("#findings").css("border","1px solid red");
    }

  });


  $("#save").click(function(){

    if ($("#userBranch").val() === "" ) {
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


    if ($("#userBranch").val() !== "" && $("#userName").val() !== "" && $("#userPassword").val() !== "") {
      $.ajax({
        url: ".//db/insertNewUser.php",
        type: "POST",
        dataType: "json",
        data: {
          sessionUser: $("#sessionUser").val(),
          userBranch: $("#userBranch").val(),
          userName: $("#userName").val(),
          userPassword: $("#userPassword").val()
        },
        success: function(data){

          if (data.insert === "success") {
            confirm('Success!!!');
            $("#userManagementModal").modal("hide");
          }

          if (data.insert === "exist") {
            confirm('The username is already taken!!!');
            $("#userManagementModal").modal("hide");
          }




        },
        error: function(err){
          console.log(err);
          alert(err)
        }
      });
    }


  });

  $("#btn-editUserInfo").click(function(){
    $("#btn-editUserInfo").hide();
    $("#btn-updateUserInfo").show();
    $("#btn-addNewUser").hide();


    $("#user-Username").prop("disabled",false);
    $("#user-Password").prop("disabled",false);

  });

  $("#btn-updateUserInfo").click(function(){

    $.ajax({
      url: ".//db/updateUserInfo.php",
      type: "POST",
      dataType: "json",
      data: {
        sessionUser: $("#sessionUser").val(),
        username: $("#user-Username").val(),
        password: $("#user-Password").val()
      },
      success: function(data){
        if (data.update === 'duplicate') {
          confirm('Username is already taken!!!');
        }

        if (data.update === "success") {
          confirm('Update Success');
          $("#btn-editUserInfo").show();
          $("#btn-updateUserInfo").hide();
          $("#btn-addNewUser").show();


          $("#user-Username").prop("disabled",true);
          $("#user-Password").prop("disabled",true);
        }
      },
      error: function(err){

      }
    });
  });

  // $(".btn-activate").click(function(){
  //   console.log($("#patient-id").val());
  //   $.ajax({
  //     url: ".//db/activatePatient.php",
  //     type: "POST",
  //     dataType: "json",
  //     data: {
  //       patientID: $("#patient-id").val()
  //     },
  //     success: function(data){
  //       if (data.update === "success") {
  //         console.log("success");
  //         // window.location.replace("http://localhost/rms");
  //         $("#managePatientModal").modal("hide");
  //       }
  //     },
  //     error: function(err){
  //       alert(err);
  //     }
  //   });
  // });
  //
  // $(".btn-deactivate").click(function(){
  //     console.log($("#patient-id").val());
  //   $.ajax({
  //     url: ".//db/deactivatePatient.php",
  //     type: "POST",
  //     dataType: "json",
  //     data: {
  //       patientID: $("#patient-id").val()
  //     },
  //     success: function(data){
  //       if (data.update === "success") {
  //         console.log("success");
  //         // window.location.replace("http://localhost/rms");
  //         $("#managePatientModal").modal("hide");
  //       }
  //     },
  //     error: function(err){
  //       alert(err);
  //     }
  //   });
  // });
  //
  // $(".btn-branchActivate").click(function(){
  //   console.log($(".branch-id").val());
  //   $.ajax({
  //     url: ".//db/activateBranch.php",
  //     type: "POST",
  //     dataType: "json",
  //     data: {
  //       branchID: $(".branch-id").val()
  //     },
  //     success: function(data){
  //       if (data.update === "success") {
  //         console.log("success");
  //         // window.location.replace("http://localhost/rms");
  //         $("#manageBranchModal").modal("hide");
  //       }
  //     },
  //     error: function(err){
  //       alert(err);
  //     }
  //   });
  // });
  //
  // $(".btn-branchDeactivate").click(function(){
  //   console.log($(".branch-id").val());
  //   $.ajax({
  //     url: ".//db/deactivateBranch.php",
  //     type: "POST",
  //     dataType: "json",
  //     data: {
  //       branchID: $(".branch-id").val()
  //     },
  //     success: function(data){
  //       if (data.update === "success") {
  //         console.log("success");
  //         // window.location.replace("http://localhost/rms");
  //         $("#manageBranchModal").modal("hide");
  //       }
  //     },
  //     error: function(err){
  //       alert(err);
  //     }
  //   });
  // });

})
