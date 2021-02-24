$(document).ready(function(){

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('actives');
    });

    var path = window.location.href;

    if(path.indexOf("?") > -1){
        var path = path.split("?");
        path = path[0]
    }

    $('ul li a').each(function() {
        if (this.href === path) { 
            $(this).parent(".sidebar-submenu").addClass('active-link');
        }
    });


})