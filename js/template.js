(function($) {

        $.ajax({
            type: "GET",
            context:this,
            url: "search.php",
            dataType: "json",
            success: function (data) {
                $("#name").html(data.name);
                $("#nationality").html(data.name);
                $("#gender").html(data.gender);
                $("#platform").html(data.platform);
                $("#category").html(data.name);
                $("#follower").html(data.name);
            },
            error: function (jqXHR) {
                alert("發生錯誤: " + jqXHR.status);
            }
        })

})(jQuery); // End of use strict