$(document).ready(function(){
$('#slide-toggler').click(

    function(e){
        e.preventDefault();
        $('.slide-bar').toggleClass('slide-bar-expanded');
        $('.body-waraper').toggleClass('body-waraper-expanded');

    }
);
}
);
