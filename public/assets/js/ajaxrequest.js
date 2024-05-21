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

  function checkRegimentalNo() {
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
  }

  $('#regimental_no').on('keydown', function (event) {
    if (event.ctrlKey && (event.keyCode === 86 || event.keyCode === 118)) {
      // Check for Ctrl+V or Cmd+V (Mac)
      event.preventDefault(); // Prevent the paste operation
    }
  });

  $('#regimental_no').on('keypress blur', function () {
    checkRegimentalNo();
  });

  $('#regimental_no').on('keydown', function (event) {
    if (event.which == 8) {
      var inputVal = $('#regimental_no').val();
      checkRegimentalNo();
    }
  });
});

// Ajax Call for Adding New Cadet
function register_cadet() {
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
        if (data === 'OK') {
          $('#successMsg').html(
            '<span class="alert alert-success"> Registration Successful ! </span>'
          );
          // making field empty after signup
          clear_register_field();
        } else if (data === 'FALSE') {
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
  $('#status_regimental').html(' ');
  $('#status_name').html(' ');
  $('#status_password').html(' ');
}

function close_cadet_registration() {
  $('#successMsg').html(' ');
  clear_register_field();
}

// Ajax Call for Student Login Verification
function login_cadet() {
  var regimental_no_login = $('#regimental_no_login').val();
  var cadet_password = $('#cadet_password').val();
  $.ajax({
    url: 'cadet/actions.php',
    type: 'post',
    data: {
      regimental_no: regimental_no_login,
      cadet_password: cadet_password,
    },
    success: function (data) {
      if (data === 'FAILED') {
        $('#statusLogMsg').html(
          '<small class="alert alert-danger"> Invalid Regimental No. or Password ! </small>'
        );
      } else if (data === 'OK') {
        $('#statusLogMsg').html(
          '<div class="spinner-border text-success" role="status"></div>'
        );
        // Empty Login Fields
        clear_login_field();
        setTimeout(() => {
          window.location.href = 'index.php';
        }, 1000);
      }
      if (data === 'pending' || data === 'blocked') {
        $('#statusLogMsg').html(
          `<small class="alert alert-danger">Account ${data}</small>`
        );
      }
    },
  });
}

// Empty Login Fields
function clear_login_field() {
  $('#cadet_login_form').trigger('reset');
}

// Empty Login Fields and Status Msg
function close_cadet_login() {
  $('#statusLogMsg').html(' ');
  clear_login_field();
}
