// store form data
function storeRequest(form) {
    let data = new FormData(form);
    let button = document.getElementById("storeButton");
    let oldHtml = button.innerHTML;
    button.innerHTML = `<span class="spinner-border spinner-border-sm "></span>`;
    $('.error').remove();
    $.ajax({
        url: `${ADMIN_URL}company`,
        method: "POST",
        data: data,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            button.innerHTML = oldHtml;
            if (res.success) {
                toastr.success(res.success);
                setTimeout(() => (window.location = ADMIN_URL+res.redirect_url), 1500);
            } else {
                button.innerHTML = oldHtml;
                toastr.error(res.error);
            }
        },
        error:function(data){
            button.innerHTML = oldHtml;
            printErrorMsg(data.responseJSON.errors);
        }
    });
}
// update form data
function updateRequest(form,id) {
    let data = new FormData(form);
    let button = document.getElementById("storeButton");
    let oldHtml = button.innerHTML;
    button.innerHTML = `<span class="spinner-border spinner-border-sm "></span>`;
    $('.error').remove();
    $.ajax({
        url: `${ADMIN_URL}company/${id}`,
        headers: {'XSRF-TOKEN': CSRF_TOKEN},
        method: "POST",
        data: data,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res) {
            button.innerHTML = oldHtml;
            if (res.success) {
                toastr.success(res.success);
                setTimeout(() => (window.location = ADMIN_URL+res.redirect_url), 1500);
            } else {
                button.innerHTML = oldHtml;
                toastr.error(res.error);
            }
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
        $(`<p class="error text-danger"><strong>${value}</strong></p>`).insertAfter($('#'+key));
    });
}