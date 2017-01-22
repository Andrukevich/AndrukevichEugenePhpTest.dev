(function ($) {

    $(document).ready(function () {

            var height_content = $(".center").innerHeight(),
                center_content = (window.innerHeight - height_content)/2;

            $(".center").css("padding-top", center_content);



            $(window).on("resize", function () {

                var height_content = $(".center").innerHeight(),
                    center_content = (window.innerHeight - height_content)/2;

                $(".center").css("padding-top", center_content);

            });




        }
    );

})(jQuery);
