$(document).ready(function () {
    // form toggler
    $("#addNewUser").on("click", function () {
        $("#mainContainer").removeClass("hidden");
    });

    // close
    $("#cancelbtn").on("click", function () {
        $("#mainContainer").addClass("hidden");
    });
    $("#cancelbtnAdminForm").on("click", function () {
        $("#mainContainer").addClass("hidden");
    });
    $("#cancelbtnUserForm").on("click", function () {
        $("#mainContainer").addClass("hidden");
    });

    function updateLeftContainer(selectedRole, isChecked) {
        if (isChecked) {
            $("#leftContainer").removeClass("hidden");
            $("#btns").addClass("hidden"); // Add "hidden" class to #btns
            if (selectedRole === "admin") {
                $("#user-form").addClass("hidden"); // Hide user form
                $("#admin-form").removeClass("hidden"); // Show admin form
            } else if (selectedRole === "user") {
                $("#admin-form").addClass("hidden"); // Hide admin form
                $("#user-form").removeClass("hidden"); // Show user form
            }
        } else {
            $("#btns").removeClass("hidden"); // Remove "hidden" class from #btns
            $("#user-form").addClass("hidden"); // Hide user form
            $("#admin-form").addClass("hidden"); // Hide admin form
            $("#leftContainer").addClass("hidden");
        }
    }

    $("#completeAccount").on("change", function () {
        var selectedRole = $("#account-level").val();
        var isChecked = $(this).is(":checked");
        updateLeftContainer(selectedRole, isChecked);
    });

    $("#account-level").on("change", function () {
        var selectedRole = $(this).val();
        var isChecked = $("#completeAccount").is(":checked");
        updateLeftContainer(selectedRole, isChecked);
    });

    //ajax
    // $("#addUserForm").submit(function (e) {
    //     e.preventDefault();

    //     var formData = new FormData(this);

    //     $.ajax({
    //         type: "POST",
    //         url: "{{ route('addNewUserAJAX') }}",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: (data) => {
    //             console.log(data);
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         },
    //     });
    // });

    //end line
});
