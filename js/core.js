jQuery(document).ready(function($) {
    $(function() {

        var $fixedwidgets = $("#text-9, .sharedaddy"),
                $window = $(window),
                offset = $fixedwidgets.offset(),
                topPadding = 15;

        if (offset) {
            $window.scroll(function() {
                if ($window.scrollTop() > offset.top) {
                    $fixedwidgets.stop().animate({
                        marginTop: $window.scrollTop() - offset.top + topPadding
                    });
                } else {
                    $fixedwidgets.stop().animate({
                        marginTop: 0
                    });
                }
            });
        }
    });
});