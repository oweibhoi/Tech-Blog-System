$(function () {
    $(".btn-like").on("click", function (e) {
        e.preventDefault();
        let likes = $(this).text();

        let addup = false;
        if(!($(this).text()).includes('k')) {
            likes = isNaN(parseFloat(likes)) ? 0 : parseFloat(likes);
            addup = true;
        }

        if ($(this).hasClass("btn-outline-primary")) {
            $(this).removeClass("btn-outline-primary");
            $(this).addClass("btn-primary");
            addup && likes++;
        } else {
            $(this).addClass("btn-outline-primary");
            $(this).removeClass("btn-primary");
            addup && likes--;
        }

        $(this).html('<i class="fa fa-thumbs-up"></i> ' + likes);
    });

    $(".btn-dislike").on("click", function (e) {
        e.preventDefault();
        let likes = $(this).text();

        let addup = false;
        if(!($(this).text()).includes('k')) {
            likes = isNaN(parseFloat(likes)) ? 0 : parseFloat(likes);
            addup = true;
        }

        if ($(this).hasClass("btn-outline-danger")) {
            $(this).removeClass("btn-outline-danger");
            $(this).addClass("btn-danger");
            addup && likes++;
        } else {
            $(this).addClass("btn-outline-danger");
            $(this).removeClass("btn-danger");
            addup && likes--;
        }

        $(this).html('<i class="fa fa-thumbs-down"></i> ' + likes);
    });
});
