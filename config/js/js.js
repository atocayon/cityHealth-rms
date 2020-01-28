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

})
