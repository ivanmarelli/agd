
$(function() {

    $('a.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
});
/*
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash;
})
*/