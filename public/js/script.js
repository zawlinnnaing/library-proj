// called when categories is changed
$('#categories').on('change', function () {
    switch ($(this).val()) {
        case "Others":
            $("#major").attr("disabled", "disabled").val(null);
            $("#year").prop("disabled", true).val(null);
            break;
        case "Reference":
            $("#year").prop("disabled", true).val(" ");
            $("#major").prop("disabled", false);
            break;
        default:
            $("#major,#year").prop("disabled", false);
    }
});


$("a.is-danger").on("click", function (e) {
    e.preventDefault();
    var targetUrl = $(this).attr('href');
    if (confirm("Are you sure ?")) {
        window.location.href = targetUrl;
    }
});

// AutoComplete search
$('#q')
    .autocomplete({
        source: '/user_search',
        select: function (event, ui) {
            if (ui.item.id === 0) {
                return false;
            }
            userResult(ui);
        },
        close: function (event, ui) {
            if (!ui.item) {
                $(".ui-menu-item").hide();
            }
        }
    });

$('.book').autocomplete({
    source: '/book_search',
    minLength: 3,
    select: function (event, ui) {
        if (ui.item.id === 0) {
            return false;
        }
        bookResult(ui);
    },
    close: function (event, ui) {
        if (!ui.item) {
            $(".ui-menu-item").hide();
        }
    }
});

$('#explore-icon').click(function (e) {
    e.preventDefault();
    $('body').css('overflow', 'scroll');
    // body...
    $('body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 500, function () {
        $('.welcome').hide();
    });
    return false;
});





