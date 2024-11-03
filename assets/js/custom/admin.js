/** Buttons **/
$(function () {

    $(".maintaince-form").change(function () {
        let type = $(this).attr('value');
        if (this.checked) {
            MaintainceUpdate(1, type);
        } else {
            MaintainceUpdate(0, type);
        }
    });

    $('html body div.d-flex.flex-column.flex-root div.page.d-flex.flex-row.flex-column-fluid div.wrapper.d-flex.flex-column.flex-row-fluid div#kt_content.content.d-flex.flex-column.flex-column-fluid div.d-flex.flex-column-fluid.align-items-start.container-fluid div#kt_content_container.content.flex-row-fluid div.row.g-5.g-xl-8 div.col-xl-12 div.card div.card-body div.table-responsive.dataTables_wrapper.dt-bootstrap4.no-footer div#kt_datatable_example_wrapper.dataTables_wrapper.dt-bootstrap4.no-footer div.table-responsive table#kt_datatable_example.table.align-middle.table-row-dashed.fs-6.dataTable.no-footer tbody.fw-bold.text-gray-600 tr td.d-flex.float-end form button.btn.btn-icon.btn-bg-light.btn-active-color-primary.btn-sm').click(function () {
        var data = event.target;
        var ok = $(data).parents('form').attr('id');
        var res = ok.split("Stop");
        Stop(res[1]);
    });


});

$('.card-body').on('change', '#user_select', function () {
    var selectedUserId = this.value;
    var userPageUrl = 'user?ID=' + selectedUserId; // replace with the actual URL of the user page
    window.location.href = userPageUrl;
});


$(function () {
    $("input[name='type']").click(function () {
        if ($("#notifi").is(":checked")) {
            $("#show").show();
        } else {
            $("#show").hide();
        }
    });
});


// This code is for creating and managing plans for a subscription service.
function AddPlan() {
    // Create ajax form
    let formData = new FormData(document.querySelector('#PlanObj'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AddPlan',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == "success") {
                setTimeout(function () {
                    window.location = 'plans';
                }, 500);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

// This code is for changing a user's current plan in the subscription service. It allows users
function ChangePlan(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#ManagePlan' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((data) => {
        if (data.isConfirmed) {
            // Send ajax request
            $.ajax({
                url: 'process?ChangePlan',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function (r) {
                    // console.log(r);
                    // return false;
                    var res = JSON.parse(r);

                    if (res[0] == "success") {
                        window.location.reload()
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
    });
}


// This code is for deleting a plan from the subscription service. It allows users to remove a plan that they no longer need or want.
function DeletePlan(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#ManagePlan' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send ajax request
            $.ajax({
                url: 'process?DeletePlan',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function (r) {
                    // console.log(r);
                    // return false;
                    var res = JSON.parse(r);
                    showAlert(res[1], res[0]);
                    if (res[0] == "success") {
                        setTimeout(function () {
                            window.location = 'plans';
                        }, 500);
                    }
                    return false;
                },
                error: function (err) {
                    return false;
                }
            });
        }
    });
}

function EnableApi(id) {
    // toastr['info']("Stop is prepairing.", "Info")
    // Create ajax form
    let formData = new FormData(document.querySelector('#ApiObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?EnableApi',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            $('.table-servers').DataTable().ajax.reload(null, false);
        },
        error: function (err) {
            return false;
        }
    });
}

function DisableApi(id) {
    // toastr['info']("Stop is prepairing.", "Info")
    // Create ajax form
    let formData = new FormData(document.querySelector('#ApiObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?DisableApi',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            $('.table-servers').DataTable().ajax.reload(null, false);
        },
        error: function (err) {
            return false;
        }
    });
}


/* Add API */
function AddApi() {
    // Create ajax form
    let formData = new FormData(document.querySelector('#ApiObj'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AddAPI',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == "success") {
                $('.table-servers').DataTable().ajax.reload(null, false);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Delete API */
function DeleteApi(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#ApiObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send ajax request
            $.ajax({
                url: 'process?DeleteAPI',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function (r) {
                    // console.log(r);
                    // return false;
                    var res = JSON.parse(r);
                    showAlert(res[1], res[0]);
                    if (res[0] == "success") {
                        $('.table-servers').DataTable().ajax.reload(null, false);
                    }
                    return false;
                },
                error: function (err) {
                    return false;
                }
            });
        }
    });
}

/* Change API */
function ChangeAPI(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#ApiObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?ChangeAPI',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == "success") {
                setTimeout(function () {
                    window.location = 'servers';
                }, 500);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}


/* Add Methods  */
function AddMethod() {
    // Create ajax form
    let formData = new FormData(document.querySelector('#MethodObj'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AddMethod',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == "success") {
                setTimeout(function () {
                    window.location = 'methods';
                }, 1000);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Delete Method */
function DeleteMethod(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#MethodObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send ajax request
            $.ajax({
                url: 'process?DeleteMethod',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function (r) {
                    // console.log(r);
                    // return false;
                    var res = JSON.parse(r);
                    showAlert(res[1], res[0]);
                    if (res[0] == "success") {
                        setTimeout(function () {
                            window.location = 'methods';
                        }, 500);
                    }
                    return false;
                },
                error: function (err) {
                    return false;
                }
            });
        }
    });
}

/* Change Method */
function ChangeMethod(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#MethodObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?ChangeMethod',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == "success") {
                setTimeout(function () {
                    window.location = 'methods';
                }, 500);
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}


/* Add Blacklist */
function AddBlackList() {
    // Create ajax form
    let formData = new FormData(document.querySelector('#AddBlackList'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AddBlackList',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == "success") {
                $('.table-blacklist').DataTable().ajax.reload();
            }
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Delete Blacklist */
function DeleteBlackList(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#DeleteBlackList' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'process?DeleteBlackList',
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
                            window.location.reload();
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
    });
}

/* Add News */
function AddNews() {
    tinyMCE.triggerSave();
    // Create ajax form
    let formData = new FormData(document.querySelector('#NewsObj'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AddNews',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            if (res[0] == 'success') {
                setTimeout(function () {
                    window.location.reload();
                }, 500);
            }
            // Alert
            return false;
        },
        error: function (err) {
            return false;
        }
    });
}

/* Delete News */
function DeleteNews(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#NewsObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((data) => {
        if (data.isConfirmed) {
            // Send ajax request
            $.ajax({
                url: 'process?DeleteNews',
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
                            window.location.reload();
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
    });
}

/* Change News */
function ChangeNews() {
    // Create ajax form
    let formData = new FormData(document.querySelector('#ChangeNews'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?ChangeNews',
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

function DeleteAttacks(id) {
    // toastr['info']("Stop is prepairing.", "Info")
    // Create ajax form
    let formData = new FormData(document.querySelector('#ApiObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?DeleteAttacks',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            // Refresh tables with class 'tab-table'
            $('.attacks-table').DataTable().ajax.reload();
        },
        error: function (err) {
            return false;
        }
    });
}

/* Stop Attack */
function Stop(id) {
    // toastr['info']("Stop is prepairing.", "Info")
    // Create ajax form
    let formData = new FormData(document.querySelector('#Stop' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AdminStop',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            // Refresh tables with class 'tab-table'
            $('.table-attacks').DataTable().ajax.reload(null, false);
        },
        error: function (err) {
            return false;
        }
    });
}

/* Stop Attack */
function StopAll() {
    // toastr['info']("Stop is prepairing.", "Info")
    // Create ajax form
    let formData = new FormData(document.querySelector('#manageattacks'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?StopAll',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
            // Refresh tables with class 'tab-table'
            $('.attacks-table').DataTable().ajax.reload();
        },
        error: function (err) {
            return false;
        }
    });
}

/* Clear Old Attack */
function ClearOldAttack() {
    // toastr['info']("Stop is prepairing.", "Info")
    // Create ajax form
    let formData = new FormData(document.querySelector('#manageattacks'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?ClearOldAttacks',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (r) {
            // console.log(r);
            // return false;
            var res = JSON.parse(r);
            showAlert(res[1], res[0]);
        },
        error: function (err) {
            return false;
        }
    });
}

/* Change User */
function ChangeUser(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#UserObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?ChangeUser',
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
                    window.location = 'users';
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

/* Delete User */
function DeleteUser(id) {
    // Create ajax form
    let formData = new FormData(document.querySelector('#UserObj' + id));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    //Start sweet confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
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
                    // Alert
                    showAlert(res[1], res[0]);
                    if (res[0] == 'success') {
                        setTimeout(function () {
                            window.location = 'users';
                        }, 500);
                    }
                    // Alert
                    return false;
                },
                error: function (err) {
                    return false;
                }
            });
        }
    });
}

function appendValue(val) {
    let type = $('input[name="type"]')
}

/* Enable Maintenance */
function MaintainceUpdate(value, type) {

    // Create ajax form
    let formData = new FormData(document.querySelector('#MaintainceUpdate'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);

    formData.append('value', value);
    formData.append('type', type);
    // Send ajax request
    $.ajax({
        url: 'process?MaintainceUpdate',
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

/* Additional Expire Time */
function AdditionalTime() {
    // Create ajax form
    let formData = new FormData(document.querySelector('#AdditionalTime'));
    let _csrf = $('input[id="_csrf"]').attr('value');
    formData.append('_csrf', _csrf);
    // Send ajax request
    $.ajax({
        url: 'process?AddTimeAllUsers',
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

// Toastr function
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
    $('.table-blacklist').DataTable({
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
          <div class="fs-6 fw-bold">Empty blacklist</div>
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
            url: "/admin/data/blacklist",
            type: "POST",
            data: function (data) {
                return data;
            },
            dataSrc: function (json) {
                return json.data;
            }
        },
        columns: [
            {
                data: "id",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                }
            },
            {
                data: "word",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                }
            },
            {
                data: "id",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).html(`<form method="POST" id="DeleteBlackList${cellData}"><input type="hidden" id="_csrf" value="${rowData.csrftoken}"><input type="hidden" id="ID" name="ID" value="${cellData}"><button type="button" onclick="DeleteBlackList(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"><i class="ki-duotone ki-trash text-danger fs-2"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span><span class="path5"></span> </i></button></form>`);
                }
            }
        ]
    });
});

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
            url: "/admin/data/attacks",
            type: "POST",
            data: function (data) {
                return data;
            },
            dataSrc: function (json) {
                return json.data;
            }
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
                    $(td).addClass('fw-bold fs-6');
                    countdown(td, cellData);
                }
            },
            {
                data: "method",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                }
            },
            {
                data: "user",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                }
            },
            {
                data: "path",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                }
            },
            {
                data: "handler",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold fs-6');
                }
            },
            {
                data: "id",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).html(`<form method="POST" id="Stop${cellData}"><input type="hidden" id="_csrf" value="${rowData.csrftoken}"><input type="hidden" id="id" name="id" value="${cellData}"><button type="button" onclick="Stop(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"><i class="ki-duotone ki-trash text-danger fs-2"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span><span class="path5"></span> </i></button></form>`);
                }
            }
        ]
    });
});

$(function () {
    $('.table-servers').DataTable({
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
            url: "/admin/data/servers",
            type: "POST",
            data: function (data) {
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
                    $(td).html(`Layer ${cellData}`).addClass('fw-bold');
                }
            },
            {
                data: "status",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-${cellData === 'online' ? 'success' : 'danger'}">${cellData}</span>`);
                }
            },
            {
                data: "lastUsed",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                "data": "id", "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass('text-end');
                    $(td).html(`<div class="d-flex"><a href="server?ID=${cellData}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mx-3"><i class="ki-duotone ki-update-folder fs-2 text-success"><i class="path1"></i><i class="path2"></i></i></a><form method="POST" id="ApiObj${rowData.id}"><input type="hidden" id="_csrf" value="${rowData.csrftoken}"><input type="hidden" id="id" name="ID" value="${cellData}"><button type="button" onclick="DisableApi(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm "><i class="ki-duotone ki-to-right fs-2 text-danger"></i></button><button type="button" onclick="EnableApi(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mx-3"><i class="ki-duotone ki-to-right fs-2 text-primary"></i></button><button type="button" onclick="DeleteApi(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"><i class="ki-duotone ki-trash text-danger fs-2"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span><span class="path5"></span> </i></button><button type="button" onclick="DeleteAttacks(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mx-3"><i class="ki-duotone ki-delete-folder fs-2 text-primary"><i class="path1"></i><i class="path2"></i></i></button></form></div>`);
                }
            }
        ]
    });
});

$(function () {
    $('.table-plans').DataTable({
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
        stateSave: true, // Add this line
        sPaginationType: "full",
        language: {
            emptyTable: `<div class="d-flex flex-center mt-4">
          <div class="fs-6 fw-bold">Empty plans list</div>
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
            url: "/admin/data/plans",
            type: "POST",
            data: function (data) {
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
                data: "price",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "length",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-warning">${cellData}</span>`);
                }
            },
            {
                data: "unit",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold text-capitalize');
                }
            },
            {
                data: "concurrents",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "mbt",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "premium",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "api",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                "data": "ID", "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass('text-end');
                    $(td).html(`<div class="d-flex"><a href="plan?ID=${rowData.ID}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mx-3"><i class="ki-duotone ki-update-folder fs-2 text-success"><i class="path1"></i><i class="path2"></i></i></a><form method="POST" id="ManagePlan${cellData}"><input type="hidden" id="_csrf" value="${rowData.csrftoken}"><input type="hidden" id="id" name="ID" value="${cellData}"><button type="button" onclick="DeletePlan(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"><i class="ki-duotone ki-trash text-danger fs-2"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span><span class="path5"></span> </i></button></form></div>`);
                }
            }
        ]
    });
});

$(function () {
    $('.table-methods').DataTable({
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
          <div class="fs-6 fw-bold">Empty methods list</div>
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
            url: "/admin/data/methods",
            type: "POST",
            data: function (data) {
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
                data: "hubname",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "apiname",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "layer",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-warning">${cellData}</span>`);
                }
            },
            {
                data: "class",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "type",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">Category: ${cellData}</span>`);
                }
            },
            {
                data: "api",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                "data": "id", "createdCell": function (td, cellData, rowData, row, col) {
                    $(td).addClass('text-end');
                    $(td).html(`<div class="d-flex"><a href="method?ID=${rowData.id}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mx-3"><i class="ki-duotone ki-update-folder fs-2 text-success"><i class="path1"></i><i class="path2"></i></i></a><form method="POST" id="MethodObj${cellData}"><input type="hidden" id="_csrf" value="${rowData.csrftoken}"><input type="hidden" id="id" name="id" value="${cellData}"><button type="button" onclick="DeleteMethod(${cellData})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"><i class="ki-duotone ki-trash text-danger fs-2"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span><span class="path5"></span> </i></button></form></div>`);
                }
            }
        ]
    });
});

$(function () {
    $('.table-invoices').DataTable({
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
          <div class="fs-6 fw-bold">Empty invoices list</div>
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
            url: "/admin/data/invoices",
            type: "POST",
            data: function (data) {
                return data;
            },
            dataSrc: function (json) {
                return json.data;
            }
        },
        columns: [
            {
                data: "userID",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "local_price",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                    $(td).text('$' + cellData);
                }
            },
            {
                data: "currency",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "invoice_created",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "invoice_expires",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "invoice_status",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "address",
                createdCell: (td, cellData, rowData, row, col) => {
                    $(td).addClass('fw-bold fs-6 text-center');
                    if (cellData.length > 5) {
                        $(td).text(`${cellData.substring(0, 5)}...`);
                        const copyButton = $('<button/>', {
                            html: '<i class="ki-duotone ki-copy"></i>',
                            class: 'btn btn-icon ms-1',
                            click: () => {
                                navigator.clipboard.writeText(cellData)
                                    .then(() => showAlert('Address copied to clipboard!', 'success'))
                                    .catch(() => showAlert('Error copying address to clipboard', 'error'));
                            }
                        });
                        $(td).append(copyButton);
                    }
                }
            },
        ]
    });
});

$(function () {
    $('.table-logs').DataTable({
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
          <div class="fs-6 fw-bold">Empty logs list</div>
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
            url: "/admin/data/logs",
            type: "POST",
            data: function (data) {
                return data;
            },
            dataSrc: function (json) {
                return json.data;
            }
        },
        columns: [
            {
                data: "userID",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "host",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "method",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold');
                }
            },
            {
                data: "date",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "handler",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            },
            {
                data: "where",
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('fw-bold').html(`<span class="badge badge-light-primary">${cellData}</span>`);
                }
            }
        ]
    });
});
