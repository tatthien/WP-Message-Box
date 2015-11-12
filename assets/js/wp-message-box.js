(function($) {
    $(document).ready(function() {
        $('.wp-message-box-header').on('click', function(){
           if($('.wp-message-box-body').is(':hidden')) {
               $('.wp-message-box-body').show();
               $('.wp-message-box-header i').attr('class', 'fa fa-minus');
           } else {
               $('.wp-message-box-body').hide();
               $('.wp-message-box-header i').attr('class', 'fa fa-expand');
           }
        });
    });
})(jQuery);