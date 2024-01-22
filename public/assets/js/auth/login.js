function sendLoginRequest() {
    let data = new FormData(document.getElementById("loginForm"));
    data = Object.fromEntries(data.entries());
    let button = document.getElementById("loginButton");
    let oldHtml = button.innerHTML;
    button.innerHTML = `<span class="spinner-border spinner-border-sm "></span>`;

    $.ajax({
        url: `${BASE_URL}login`,
        method: "POST",
        data: data,
        success: function (res) {
            button.innerHTML = oldHtml;
                toastr.success('Login Success || Welcome to admin');
                setTimeout(() => (window.location = ADMIN_URL+'dashboard'), 1500);
            
        },
        error:function(data){
            button.innerHTML = oldHtml;
            printErrorMsg(data.responseJSON.errors);
        }
    });
}
// print error message
function printErrorMsg (msg) {
    $.each(msg, function( key, value ) {
        toastr.error(value[0])
    });
}