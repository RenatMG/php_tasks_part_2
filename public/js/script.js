(function ($) {

    var table = $(".task-2");

    $(document).ready(function () {

        table.hide('fast', function () {

            setTimeout(function () {

                table.show();
            }, 1000);

        });

        $('.task-2 tr').eq(1).css({
            'background-color': 'red'
        });

        var click = 1;
        $('.task-2 tr td').click(function () {
            if (click) {
                $(this).append('+');
                click = 0;
            }

            else {
                $(this).text($(this).text().replace(/\+/g,''));
                click =1;
            }
        });


        $('.task-2 tr').dblclick(function () {
            $(this).clone().insertAfter($(this));
        })


    });

})(jQuery);