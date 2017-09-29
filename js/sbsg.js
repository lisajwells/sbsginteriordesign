(function($) {
// https://premium.wpmudev.org/blog/adding-jquery-scripts-wordpress/


$('a.nivo-control').click(function() {
    $('html, body').animate({
        scrollTop: $("#metaslider_container_31").offset().top
    }, 2000);
    // $('body').addClass( 'myClass yourClass' );
});
// $(".nivo-control").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#metaslider_container_31").offset().top
//     }, 2000);
// });
// https://stackoverflow.com/questions/19012495/smooth-scroll-to-div-id-jquery
// $("#button").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#myDiv").offset().top
//     }, 2000);
// });


})( jQuery );
