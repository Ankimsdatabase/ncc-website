$(document).ready(function () {
  // Ajax Call for Already Exists Email Verification
  $('#email').on('keypress blur', function () {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var email = $('#email').val();
    $.ajax({
      url: 'cadet/actions.php',
      type: 'post',
      data: {
        email_check: 'email_check',
        email: email,
      },
      success: function (data) {
        console.log(data);
        if (data != 0) {
          $('#statusMsg2').html(
            '<small style="color:red;"> Email ID Already Registered ! </small>'
          );
          $('#signup').attr('disabled', true);
        } else if (data == 0 && reg.test(email)) {
          $('#statusMsg2').html(
            '<small style="color:green;"> There you go ! </small>'
          );
          $('#signup').attr('disabled', false);
        } else if (!reg.test(email)) {
          $('#statusMsg2').html(
            '<small style="color:red;"> Please Enter Valid Email e.g. example@mail.com </small>'
          );
          $('#signup').attr('disabled', false);
        }
        if (email == '') {
          $('#statusMsg2').html(
            '<small style="color:red;"> Please Enter Email ! </small>'
          );
        }
      },
    });
  });

  $('#regimental_no').on('keydown', function (event) {
    if (event.ctrlKey && (event.keyCode === 86 || event.keyCode === 118)) {
      // Check for Ctrl+V or Cmd+V (Mac)
      event.preventDefault(); // Prevent the paste operation
    }
  });

  $('#regimental_no').on('keypress blur', function () {
    var regimental_no = $('#regimental_no').val();
    $.ajax({
      url: 'cadet/actions.php',
      type: 'post',
      data: {
        regimental_no_check: 'regimental_no_check',
        regimental_no: regimental_no,
      },
      success: function (data) {
        if (data != 0) {
          $('#status_regimental').html(
            '<small style="color:red;"> Regimental No. Already Registered ! </small>'
          );
          $('#signup').attr('disabled', true);
        } else if (data == 0) {
          $('#status_regimental').html(
            '<small style="color:green;"> There you go ! </small>'
          );
          $('#signup').attr('disabled', false);
        }

        if (regimental_no == '') {
          $('#status_regimental').html(
            '<small style="color:red;"> Please Enter Regimental No. ! </small>'
          );
        }
      },
    });
  });

  // Checking name on keypress
  $('#name').keypress(function () {
    var name = $('#name').val();
    if (name !== '') {
      $('#statusMsg1').html(' ');
    }
  });

  // Checking Password on keypress
  $('#password').keypress(function () {
    var password = $('#password').val();
    if (password !== '') {
      $('#statusMsg3').html(' ');
    }
  });
});

// Ajax Call for Adding New Student
function register_student() {
  var regimental_no = $('#regimental_no').val();
  var name = $('#name').val();
  var password = $('#password').val();

  // checking fields on form submission
  if (regimental_no.trim() == '') {
    $('#status_regimental').html(
      '<small style="color:red;"> Please Enter Regimental No. </small>'
    );
    $('#regimental_no').focus();
    return false;
  }
  if (name.trim() == '') {
    $('#status_name').html(
      '<small style="color:red;"> Please Enter Name ! </small>'
    );
    $('#name').focus();
    return false;
  } else if (password.trim() == '') {
    $('#status_password').html(
      '<small style="color:red;"> Please Enter Password ! </small>'
    );
    $('#password').focus();
    return false;
  } else {
    $.ajax({
      url: 'cadet/actions.php',
      type: 'post',
      data: {
        cadet_registration: 'cadet_registration',
        regimental_no: regimental_no,
        name: name,
        password: password,
      },
      success: function (data) {
        console.log(data);
        if (data == 'OK') {
          $('#successMsg').html(
            '<span class="alert alert-success"> Registration Successful ! </span>'
          );
          // making field empty after signup
          clear_register_field();
        } else if (data == 'Failed') {
          $('#successMsg').html(
            '<span class="alert alert-danger"> Unable to Register ! </span>'
          );
        }
      },
    });
  }
}

// Empty All Fields and Status Msg
function clear_register_field() {
  $('#cadet_registration_form').trigger('reset');
  $('#statusMsg1').html(' ');
  $('#statusMsg2').html(' ');
  $('#statusMsg3').html(' ');
}

function closeCadetRegistraion() {
  $('#successMsg').html(' ');
  clear_register_field();
}

// Ajax Call for Student Login Verification
function checkStuLogin() {
  var stuLogEmail = $('#stuLogEmail').val();
  var stuLogPass = $('#stuLogPass').val();
  $.ajax({
    url: 'cadet/actions.php',
    type: 'post',
    data: {
      checkLogemail: 'checklogmail',
      stuLogEmail: stuLogEmail,
      stuLogPass: stuLogPass,
    },
    success: function (data) {
      console.log(data);
      if (data == 0) {
        $('#statusLogMsg').html(
          '<small class="alert alert-danger"> Invalid Email ID or Password ! </small>'
        );
      } else if (data == 1) {
        $('#statusLogMsg').html(
          '<div class="spinner-border text-success" role="status"></div>'
        );
        // Empty Login Fields
        clearStuLoginField();
        setTimeout(() => {
          window.location.href = 'index.php';
        }, 1000);
      }
    },
  });
}

// Empty Login Fields
function clearStuLoginField() {
  $('#stuLoginForm').trigger('reset');
}

// Empty Login Fields and Status Msg
function clearStuLoginWithStatus() {
  $('#statusLogMsg').html(' ');
  clearStuLoginField();
}
