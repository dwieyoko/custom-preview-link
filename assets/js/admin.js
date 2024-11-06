/**
 * Admin JS
 */
;( function ( $ ) {
    'use strict';

    /**
     * Document ready fucntion
     */
    $( document ).ready( function () {
        $( '.ht_help_icon' ).click(function() {
            $( "#ht_dialog" ).dialog({
                modal: true,
                minWidth: 1000,
                buttons: {}
            });
        });

        // link preview
        if($('.ht pre span').length){
            // on input
            var $el_input = $('.ht .csf-fieldset input'),
                $el_select = $('.ht .csf-fieldset select');
            $el_input.on('input', function(){
                if(this.value == ''){
                    $('.ht pre span').html(''); 
                } else {
                    $('.ht pre span').html(this.value + '/');
                }
            });

            // on change
            $el_select.on('change', function(){
                if(this.value == 'custom'){
                    $('.ht pre span').html(current_input_val + '/');
                } else {
                    $('.ht pre span').html(''); 
                }
            });

            // on realod set option value
            var selected_val = $el_select.find(":selected").text(),
                current_input_val = $el_input.val();
            if(selected_val == 'Use Custom Slug' && current_input_val){
                $('.ht pre span').html(current_input_val + '/');
            }
        }
    });

} )( jQuery );