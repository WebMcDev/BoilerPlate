jQuery(document).ready(function ($) {

//    AJAX EXAMPLE
//    $(document).on("click", ".openClickToColor", function () {
//        $.ajax({
//            type: 'POST',
//            url: '/wp-admin/admin-ajax.php',
//            dataType: 'json',
//            data: {
//                action: 'openClickToColor',
//                version: $(this).data('version'),
//            },
//            success: function (res) {
//                $('#modalContent').html(res.html);
//            },
//        });
//    });

    $(document).ready( function() {
        $('a:not(.not-outbound)[href^="http"]').not('a[href^="http://' + $(location).attr('hostname') + '"]').addClass('outbound').attr('target', '_blank');
        $('a:not(.not-outbound)[href^="https"]').not('a[href^="https://' + $(location).attr('hostname') + '"]').addClass('outbound').attr('target', '_blank');
	});
});