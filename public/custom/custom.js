$(function () {

    $(".login-reminder").on("click", function (e) {
        e.preventDefault();
        $("#md-login-reminder").modal();
    });
});

function like(post_id) {
    let likes = $(".btn-like-" + post_id).text();

    let addup = false;
    let reacted = false;
    if (
        !$(".btn-like-" + post_id)
            .text()
            .includes("k")
    ) {
        likes = isNaN(parseFloat(likes)) ? 0 : parseFloat(likes);
        addup = true;
    }

    if ($(".btn-like-" + post_id).hasClass("btn-outline-primary")) {
        $(".btn-like-" + post_id).removeClass("btn-outline-primary");
        $(".btn-like-" + post_id).addClass("btn-primary");
        addup && likes++;
        reacted = true;
    } else {
        $(".btn-like-" + post_id).addClass("btn-outline-primary");
        $(".btn-like-" + post_id).removeClass("btn-primary");
        addup && likes--;
    }

    $(".btn-like-" + post_id).html('<i class="fa fa-thumbs-up"></i> ' + likes);

    if ($(".btn-dislike-" + post_id).hasClass("btn-danger")) {
        $(".btn-dislike-" + post_id).removeClass("btn-danger");
        $(".btn-dislike-" + post_id).addClass("btn-outline-danger");
        let dislike = $(".btn-dislike-" + post_id).text();
        dislike = isNaN(parseFloat(dislike)) ? 0 : parseFloat(dislike);
        dislike--;
        $(".btn-dislike-" + post_id).html(
            '<i class="fa fa-thumbs-down"></i> ' + dislike
        );
    }

    react(1, post_id, reacted);
}

function dislike(post_id)
{
    let likes = $('.btn-dislike-'+ post_id).text();

    let addup = false;
    let reacted = false;
    if (!$('.btn-dislike-'+ post_id).text().includes("k")) {
        likes = isNaN(parseFloat(likes)) ? 0 : parseFloat(likes);
        addup = true;
    }

    if ($('.btn-dislike-'+ post_id).hasClass("btn-outline-danger")) {
        $('.btn-dislike-'+ post_id).removeClass("btn-outline-danger");
        $('.btn-dislike-'+ post_id).addClass("btn-danger");
        addup && likes++;
        reacted = true;
    } else {
        $('.btn-dislike-'+ post_id).addClass("btn-outline-danger");
        $('.btn-dislike-'+ post_id).removeClass("btn-danger");
        addup && likes--;
    }

    $('.btn-dislike-'+ post_id).html('<i class="fa fa-thumbs-down"></i> ' + likes);

    if ($(".btn-like-" + post_id).hasClass("btn-primary")) {
        $(".btn-like-" + post_id).removeClass("btn-primary");
        $(".btn-like-" + post_id).addClass("btn-outline-primary");
        let like = $(".btn-like-" + post_id).text();
        like = isNaN(parseFloat(like)) ? 0 : parseFloat(like);
        like--;
        $(".btn-like-" + post_id).html(
            '<i class="fa fa-thumbs-down"></i> ' + like
        );
    }

    react(0, post_id, reacted);
}

function react(reaction, post_id, reacted) {
    const _token = $("#frm-reaction-" + post_id)
        .find("input[name=_token]")
        .val();
    $.post(
        globalData.base_url + "/react",
        {
            post_id: post_id,
            reaction: reaction,
            reacted: reacted,
            _token: _token,
        },
        function (response) {
            if (response.success) {
                // alert('success');
            } else {
                alert("error");
            }
        },
        "json"
    );
}
