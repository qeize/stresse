// Functions
$(document).ready(function () {

    $("html body#kt_body div.d-flex.flex-column.flex-root div.d-flex.flex-column.flex-column-fluid-jum.flex-lg-row.justify-content-center div.d-flex.flex-center.w-lg-50.p-10 div.card.rounded-1.w-md-650px div.card-body.p-10.p-lg-6 form#Register.form.w-100.fv-plugins-bootstrap5.fv-plugins-framework div.d-grid.mb-10 button.btn.btn-sm.btn-light-primary.fs-5.fw-bold.py-3").click(function () {
        Register();
    });

    $("html body#kt_body div.d-flex.flex-column.flex-root div.d-flex.flex-column.flex-column-fluid-jum.flex-lg-row.justify-content-center div.d-flex.flex-center.w-lg-50.p-10 div.card.rounded-1.w-md-650px div.card-body.p-10.p-lg-6 form#Login.form.w-100.fv-plugins-bootstrap5.fv-plugins-framework div.d-grid.mb-10 button.btn.btn-sm.btn-light-primary.fs-5.fw-bold.py-3").click(function () {
        Login();
    });

    $("html body#kt_body div.d-flex.flex-column.flex-root div.page.d-flex.flex-row.flex-column-fluid div#kt_wrapper.wrapper.d-flex.flex-column.flex-row-fluid div#kt_content.content.d-flex.flex-column.flex-column-fluid div#kt_content_container.container-xxl div.row.g-5.g-xl-8.mb-xl-5.mb-5 div.col-sm-7.col-xxl-8 div.card div.card-header form#stopall.card-toolbar button.btn.btn-sm.btn-light-danger.fw-bold").click(function () {
        StopAll();
    });

    $("html body#kt_body div.d-flex.flex-column.flex-root div.page.d-flex.flex-row.flex-column-fluid div#kt_wrapper.wrapper.d-flex.flex-column.flex-row-fluid div#kt_content.content.d-flex.flex-column.flex-column-fluid div#kt_content_container.container-xxl div.row.g-5.g-xl-8.mb-xl-5.mb-5 div.col-sm-5.col-xxl-4 div.card div.card-body div#myTabContent.tab-content div#tab_layer4 form#Launch4 div.d-flex.flex-column button.btn.btn-sm.btn-light-primary.fs-5.fw-bold.py-1").click(function () {
        StartLayer4();
    });

    $("html body#kt_body.aside-enabled div.d-flex.flex-column.flex-root div.page.d-flex.flex-row.flex-column-fluid div#kt_wrapper.wrapper.d-flex.flex-column.flex-row-fluid div#kt_content.content.d-flex.flex-column.flex-column-fluid div#kt_content_container.container-xxl div.row.g-5.g-xl-8.mb-xl-5.mb-5 div.col-sm-5.col-xxl-4 div.card div.card-body div#myTabContent.tab-content div#tab_layer7.tab-pane.smooth-transition.show.active form#Launch7 div.d-flex.flex-column button.btn.fw-bold.btn-sm.btn-active-primary.bg-primary.mt-2").click(function () {
        StartLayer7();
    });

    $('html body#kt_body div.d-flex.flex-column.flex-root div.page.d-flex.flex-row.flex-column-fluid div#kt_wrapper.wrapper.d-flex.flex-column.flex-row-fluid div#kt_content.content.d-flex.flex-column.flex-column-fluid div#kt_content_container.container-xxl div.row.g-5.g-xl-8.mb-xl-5.mb-5 div.col-sm-4.col-xxl-4.hover-elevate-up div.card.card-xl-stretch.mb-xl-8 div.card-footer.d-flex.justify-content-center form button.btn.btn-sm.btn-light-primary.fs-5.fw-bold.py-1').click(function (event) {
        var data = event.target;
        var ok = $(data).parents('form').attr('id');
        var res = ok.split("Purchase");
        Purchase(res[1]);
    });

    $('html body#kt_body div.d-flex.flex-column.flex-root div.page.d-flex.flex-row.flex-column-fluid div.wrapper.d-flex.flex-column.flex-row-fluid div.content.d-flex.flex-column.flex-column-fluid div.d-flex.flex-column-fluid.align-items-start.container-fluid div.content.flex-row-fluid div.row.g-2.mb-2 div.col-xl-12 div.card div.card-body  form#CreateApi div.card-footer.pt-1.pb-0.d-flex.justify-content-center button.btn.btn-sm.btn-light-primary.fs-5.fw-bold.py-1.mt-3').click(function () {
        GenerateApi();
    });

    // Display or hide Post Data input
    $('input[name="requestmethod"]').on('change', function () {
        var isPostMethod = $(this).val() == 'POST';
        $('#postdata').toggle(isPostMethod);
        $('#headers').toggle(isPostMethod);
    });

    $('select[name="headers"]').on('change', function () {
        if ($(this).val().length > 1 && $(this).val().includes('none')) {
            // Remove 'none' from the selection
            $(this).val($(this).val().filter(value => value !== 'none')).trigger('change.select2');
        }
    });

});

$(document).ready(() => {

    const $methodSelect = $('#method-select').select2({
        minimumResultsForSearch: Infinity
    });

    const sections = [
        {id: "cookie", allowedValues: ['1']},
        {id: "http", allowedValues: ['3']},
        {id: "geo", allowedValues: ['3']},
        {id: "reconnection", allowedValues: ['3']},
    ];

    const ratelimitTexts = {
        'default': 'Min: 1 | Max: 100',
        '1': 'Min: 1  | Max: 100', // Custom text for method 8
        '2': 'Min: 1 | Max: 100' // Custom text for method 26
    };

    const $sections = sections.reduce((acc, {id}) => {
        const $section = $(`#${id}`);
        $section.hide();
        acc[id] = $section;
        return acc;
    }, {});

    const toggleSections = () => {
        const selectedValue = $methodSelect.val();

        Object.entries($sections).forEach(([id, $section]) => {
            const isVisible = sections.find(section => section.id === id)?.allowedValues.includes(selectedValue);
            $section.toggle(isVisible);
        });

        const rateLimitPlaceholder = ratelimitTexts[selectedValue] || ratelimitTexts['default'];
        $('#ratelimitholder').attr('placeholder', rateLimitPlaceholder);
    };

    $methodSelect.on('change', toggleSections);
    toggleSections();
});


/* Register Function */
function Register() {
// Create ajax form
    let formData = new FormData(document.querySelector('#Register'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
// Send ajax request
    $.ajax({
        url: 'process?Register',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);

            //Alert
            showAlert(res[1], res[0]);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.href = 'login';
                }, 500);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Login Function */
function Login() {
// Create ajax form
    let formData = new FormData(document.querySelector('#Login'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
// Send ajax request
    $.ajax({
        url: 'process?Login',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);

            showAlert(res[1], res[0], '');
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.href = 'home';
                }, 500);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Add Balance */
let isCreatingInvoice = false;

function CreateInvoice() {

    if (isCreatingInvoice) {
        showAlert('Please wait for the previous invoice creation to complete.', 'info');
        return;
    }

    // Check if amount input is empty
    let amountValue = document.querySelector('#amount').value.trim();

    if (!amountValue) {
        showAlert('Amount not indicated', 'error');
        return;
    }

    isCreatingInvoice = true; // Set the flag to prevent multiple calls

    showAlert('Creating invoice. Please wait.', 'info');

    // Create ajax form
    let formData = new FormData(document.querySelector('#InvoiceObj'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);

    // Send ajax request
    $.ajax({
        url: 'process?CreateInvoice',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.href = '/invoices';
                }, 1000);
            }
            isCreatingInvoice = false; // Reset the flag
            return false;
        },
        error: function (err) {
            isCreatingInvoice = false; // Reset the flag in case of an error
            return false;
        }
    });

    // Allow the function to be called again after a 3-second timeout
    setTimeout(function () {
        isCreatingInvoice = false;
    }, 5000);
}


/* Buy Plan */
function Purchase(id) {
// Create ajax form
    let formData = new FormData(document.querySelector('#Purchase' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
// Send ajax request
    $.ajax({
        url: 'process?Purchase',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            // Alert
            showAlert(res[1], res[0]);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.replace("purchase");
                }, 500);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Buy Plan */
function PurchaseCustom() {
// Create ajax form
    let formData = new FormData(document.querySelector('#PurchaseCustom'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
// Send ajax request
    $.ajax({
        url: 'process?BuyCustomPlan',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            // Alert
            showAlert(res[1], res[0]);
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

async function StartLayer4() {
    // Get the value of the input with id "slots"
    const slots = document.querySelector('.slotsl4').value;

    // Function to delay next request
    const delay = ms => new Promise(res => setTimeout(res, ms));

    for (let i = 0; i < slots; i++) {
        // Create ajax form
        const formData = new FormData(document.querySelector('#Launch4'));

        let _csrf = $('input[id="_csrf"]').attr('value');
        formData.append('_csrf', _csrf);

        try {
            // Send ajax request
            const response = await $.ajax({
                url: 'process?StartLayer4',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData
            });

            const res = JSON.parse(response);
            $('.table-attacks').DataTable().ajax.reload();
            showAlert(res[1], res[0]);
            console.log(slotsl4);

            // if (res[0] === 'error') {
            //     // Stop making requests if this one fails
            //     return false;
            // }

            // Delay the next request by 2 seconds
            await delay(2000);
        } catch (err) {
            // Stop making requests if this one fails
            // return false;
        }
    }
}


async function StartLayer7() {
    // Get the value of the input with id "slots"
    const slots = document.querySelector('.slotsl7').value;

    const postdata = document.querySelector('input[name="postdata"]').value;

    if (!postdata.startsWith('{') || !postdata.endsWith('}')) {
        return showAlert('PostData is not enclosed within braces.', 'error');
    }

    const target = document.querySelector('input[name="target"]').value;

    if (!target) {
        return showAlert('Target is not indicated.', 'error');
    }


    for (let i = 0; i < slots; i++) {
        // Create ajax form
        const formData = new FormData(document.querySelector('#Launch7'));

        let _csrf = $('input[id="_csrf"]').attr('value');
        formData.append('_csrf', _csrf);

        try {
            // Send ajax request
            const response = await $.ajax({
                url: 'process?StartLayer7',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData
            });

            const res = JSON.parse(response);
            $('.table-attacks').DataTable().ajax.reload();
            showAlert(res[1], res[0]);

            if (res[0] === 'error') {
                return false;
            }
        } catch (err) {
            return false;
        }
    }
}


/* Stop Attack */
function Stop(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#Stop' + id));
    // Send ajax request
    $.ajax({
        url: 'process?Stop',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            // Refresh tables with class 'tab-table'
            $('.table-attacks').DataTable().ajax.reload();
        },
        error: function (err) {
            return false;
        }
    });
}


/* Stop All Attacks */


function StopAll() {

// Create ajax form
    let formData = new FormData(document.querySelector('#stopall'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
// Block button

    $("#blockUIall").addClass("disabled")
    // Send ajax request
    $.ajax({
        url: 'process?StopAll',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            // Refresh tables with class 'tab-table'
            $('.table-attacks').DataTable().ajax.reload();
            $("#blockUIall").removeClass("disabled");
        },
        error: function (err) {
            return false;
            $("#blockUIall").removeClass("disabled");
        }
    });
}

/* Change Profile */
function UpdateProfile() {
// Create ajax form
    let formData = new FormData(document.querySelector('#UpdateProfile'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);

// Send ajax request
    $.ajax({
        url: 'process?UpdateProfile',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.replace("profile");
                }, 1000);
            }
            // Alert
            showAlert(res[1], res[0]);
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Generate api_key */
function GenerateApi() {
// Create ajax form
    let formData = new FormData(document.querySelector('#CreateApi'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
// Send ajax request
    $.ajax({
        url: 'process?CreateApi',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.replace("api");
                }, 500);
            }
            // Alert
            showAlert(res[1], res[0]);
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Delete api_key */
function DeleteApi(id) {
// Create ajax form
    let formData = new FormData(document.querySelector('#DeleteApi' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);

// Send ajax request
    $.ajax({
        url: 'process?RemoveApi',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.replace("api");
                }, 500);
            }
            // Alert
            showAlert(res[1], res[0]);
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Delete Account */
function DeleteAccount() {
// Create ajax form
    let formData = new FormData(document.querySelector('#DeleteAccount'));
// Send ajax request
    $.ajax({
        url: 'process?DeleteUser',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            window.location.reload()
            // Alert
            showAlert(res[1], res[0]);
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Toastr function */
const toastrOptions = {
    closeButton: true,
    debug: false,
    progressBar: true,
    newestOnTop: true,
    positionClass: "toastr-top-center",
    preventDuplicates: false,
    onclick: null,
    showDuration: "3000",
    hideDuration: "2000",
    timeOut: "2000",
    extendedTimeOut: "2000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

function showAlert(message, type) {
    switch (type) {
        case "success":
            toastr.success(message, null, toastrOptions);
            break;
        case "error":
            toastr.error(message, null, toastrOptions);
            break;
        case "info":
            toastr.info(message, null, toastrOptions);
            break;
        case "warning":
            toastr.warning(message, null, toastrOptions);
            break;
        default:
            break;
    }
}


/* Register Captcha */
function CaptchaRegister() {
// $('#CaptchaImg').html('request/captcha/');
    document.getElementById("CaptchaImg").src = "captcha";
    return false;
}


$(document).ready(function () {
    $('.slotsl7').attr('value', 1).on('input', function () {
        $('.slider_slotsl7').text($(this).val());
        console.log($(this).val());
    });
});

$(document).ready(function () {
    $('.slotsl4').attr('value', 1).on('input', function () {
        $('.slider_slotsl4').text($(this).val());
        console.log($(this).val());
    });
});


function countdown(element, seconds) {
    let interval = setInterval(function () {
        // decrement the seconds
        seconds--;
        // update the HTML element
        element.innerHTML = seconds;

        // If the countdown has expired, remove the row from the table and redraw the table
        if (seconds <= 0) {
            clearInterval(interval); // make sure to clear the interval

            let row = $(element).closest('tr');
            let table = $('.table-attacks').DataTable();

            // If row is already removed, don't repeat the process
            if ($.contains(document, row[0])) {
                // remove the row from the table
                table.row(row).remove().draw();

                // fade out the row
                row.fadeOut();
            }
        }
    }, 1000);
}


$(function () {
    $('.table-attacks').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        order: [],
        columnDefs: [{
            targets: [0],
            visible: true,
            searchable: true
        }],
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        processing: true,
        serverSide: true,
        sPaginationType: "full",
        language: {
            emptyTable: `<div class="d-flex flex-center mt-4">
          <div class="fs-6 fw-bold">Empty attack list</div>
        </div>`,
            processing: "<span class='spinner-border spinner-border-sm mr-2' role='status'></span>",
            paginate: {
                "first": '<i class="ki-duotone ki-password-check fs-1">  <i class="path1"></i>  <i class="path2"></i>  <i class="path3"></i>  <i class="path4"></i>  <i class="path5"></i> </i>',
                "last": '<i class="ki-duotone ki-password-check fs-1" style="transform: rotate(180deg);">  <i class="path1"></i>  <i class="path2"></i>  <i class="path3"></i>  <i class="path4"></i>  <i class="path5"></i> </i>',
                "next": '<i class="ki-duotone ki-to-right fs-1"></i>',
                "previous": '<i class="ki-duotone ki-to-left fs-1"></i>'
            },
        },
        ajax: {
            url: "/global/data/attacks",
            type: "POST",
            data: function (data) {
                return data;
            },
            dataSrc: function (json) {
                return json.data;
            },
            error: function (xhr, error, thrown) {
                // Handle the error here (e.g., show an alert or log it)
                console.log("An error occurred: ", error);
            },
        },
        columns: [
            {
                data: "target",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                    if (cellData.length > 15) {
                        $(td).text(cellData.substring(0, 15) + '...');
                        var expandButton = $('<button/>', {
                            html: '<i class="ki-duotone ki-magnifier"><i class="path1"></i><i class="path2"></i></i>',
                            class: 'btn btn-icon ms-1',
                            click: function () {
                                $(td).text(cellData);
                                $(this).remove();
                            }
                        });
                        $(td).append(expandButton);
                    }
                }
            },
            {
                data: "time",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-7');
                    countdown(td, cellData);
                }
            },
            {
                data: "method",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-7');
                }
            },
            {
                data: "handler",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-7');
                }
            },
            {
                data: "id",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).html(`<form method="POST" id="Stop${cellData}"><input type="hidden" id="_csrf" name="_csrf" value="${rowData.csrftoken}"><input type="hidden" id="id" name="id" value="${cellData}"><button type="button" onclick="Stop(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"><i class="ki-duotone ki-trash text-danger fs-2"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span><span class="path5"></span> </i></button></form>`);
                }
            }
        ]
    });
});

function initializeDataTable(layer, tableElement) {
    $(tableElement).DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        order: [],
        columnDefs: [{
            targets: [0],
            visible: true,
            searchable: true
        }],
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
        processing: true,
        serverSide: true,
        sPaginationType: "full",
        language: {
            emptyTable: `<div class="d-flex flex-center mt-4">
          <div class="fs-6 fw-bold">Empty server list</div>
        </div>`,
            processing: "<span class='spinner-border spinner-border-sm mr-2' role='status'></span>",
            paginate: {
                "first": '<i class="ki-duotone ki-password-check fs-1">  <i class="path1"></i>  <i class="path2"></i>  <i class="path3"></i>  <i class="path4"></i>  <i class="path5"></i> </i>',
                "last": '<i class="ki-duotone ki-password-check fs-1" style="transform: rotate(180deg);">  <i class="path1"></i>  <i class="path2"></i>  <i class="path3"></i>  <i class="path4"></i>  <i class="path5"></i> </i>',
                "next": '<i class="ki-duotone ki-to-right fs-1"></i>',
                "previous": '<i class="ki-duotone ki-to-left fs-1"></i>'
            },
        },
        ajax: {
            url: "/global/data/servers",
            type: "POST",
            data: function (data) {
                data.layer = layer; // Send the layer parameter
                return data;
            },
            dataSrc: function (json) {
                return json.data;
            }
        },
        columns: [
            {
                data: "name",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "count",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-warning">${cellData}</span>`);
                }
            },
            {
                data: "layer",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-warning">Layer ${cellData}</span>`);
                }
            },
            {
                data: "network",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "status",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-${cellData === 'online' ? 'success' : 'danger'}">${cellData}</span>`);
                }
            }
        ]
    });
}

$(function () {
    $('.table-servers').each(function () {
        let layer = $(this).data('layer'); // Get the layer from the table data attribute
        initializeDataTable(layer, this);
    });
});

const calculatePrice = (time, slots, month) => {
    let price = 50 * (time / 3600);
    price += 50 * (slots - 1);

    if (month > 1) {
        price += price * (month - 1);
    }

    if (slots >= 50) {
        price *= 0.9; // 10% discount
    }

    if (slots >= 5) {
        price *= 0.9; // 10% discount
    }

    if (time >= 32000) {
        price *= 0.9; // 10% discount
    }

    if (month >= 3) {
        price *= 0.9; // 10% discount
    }

    return price.toFixed(2);
};

const updateBadgeValue = (elementId, value) => {
    $(elementId).text(value);
};

const updatePrice = () => {
    const time = parseFloat($("#time").val()) || 0;
    const slots = parseInt($("#slots").val()) || 0;
    const month = parseInt($("#month").val()) || 0;
    const price = calculatePrice(time, slots, month);

    updateBadgeValue("#price", `$${price}`);
    updateBadgeValue("#time-badge", time);
    updateBadgeValue("#slots-badge", slots);
    updateBadgeValue("#month-badge", month);
};

$(document).ready(() => {
    // Set default values and update the price
    $("#time").val(3600);
    $("#slots").val(1);
    $("#month").val(1);
    updatePrice();

    // Update the price whenever an input field changes
    $("#time, #slots, #month").on("input", updatePrice);

    // Update the range slider when the input field changes
    $("#time").on("change", function () {
        $("#time-slider").val($(this).val());
        updatePrice();
    });

    // Update the input field when the range slider changes
    $("#time-slider").on("input", function () {
        $("#time").val($(this).val());
        updatePrice();
    });

    // Update the Concurrents range slider and input field
    $("#concurrents").on("input", function () {
        const value = $(this).val();
        updateBadgeValue("#concurrents-badge", value);
        $("#slots").val(value);
        updatePrice();
    });
});
