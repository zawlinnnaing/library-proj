// called when categories is changed
$('#categories').on('change', function () {
    switch ($(this).val()) {
        case "Others":
            $("#major").attr("disabled", "disabled").val('');
            $("#year").prop("disabled", true).val('');
            break;
        case "Reference":
            $("#year").prop("disabled", true);
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
        // window.location.href = "/admin/edit_user/" + ui.item.id;
        userResult(ui);
    },
        close: function (event,ui) {
        if(!ui.item){
            $(".ui-menu-item").hide();
        }
        }
    });

$('#book').autocomplete({
    source: '/book_search',
    minLength: 3,
    select: function (event ,ui) {
        bookResult(ui);
    },
    close: function (event,ui) {
        if(!ui.item){
            $(".ui-menu-item").hide();
        }
    }
});
// document.addEventListener('DOMContentLoaded', function () {
//
//     // Get all "navbar-burger" elements
//     var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
//
//     // Check if there are any navbar burgers
//     if ($navbarBurgers.length > 0) {
//
//         // Add a click event on each of them
//         $navbarBurgers.forEach(function ($el) {
//             $el.addEventListener('click', function () {
//
//                 // Get the target from the "data-target" attribute
//                 var target = $el.dataset.target;
//                 var $target = document.getElementById(target);
//
//                 // Toggle the class on both the "navbar-burger" and the "navbar-menu"
//                 $el.classList.toggle('is-active');
//                 $target.classList.toggle('is-active');
//
//             });
//         });
//     }
//
// });




