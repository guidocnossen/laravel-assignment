(function (factory) {
if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module depending on jQuery.
    define(['jquery'], factory);
} else {
    // No AMD. Register plugin with global jQuery object.
    factory(jQuery);
}
}(function ($) {

    var defaults = {};

    var subSelectBox = function($element, options) {
        this.settings = $.extend( {}, defaults, options );
        this.$element = $element;

        this.settings.resetOnChange = this.$element.data('subselect-reset');

        this.$subselectboxes = $(this.$element.data('subselect-target'));

        this.init = function() {
            
            this.$element.on('change', (e) => {
                
                $(this.settings.resetOnChange).hide();
                $(this.settings.resetOnChange)
                    .find('select')
                    .prop('disabled', true);

                this.showSelectbox(this.$element.val());
            });
            
        }

        this.showSelectbox = (select_id) => {

            this.$subselectboxes.each((i, e) => {
                var $this = $(e);
                var $select = $this.find('select');
                
                if($this.data('subselect-id') == select_id) {
                    $this.show();
                    $select.prop('disabled', false);
                }
                else {
                    $this.hide();
                    $select.prop('selectedIndex', null);
                    $select.prop('disabled', true);
                }
            });
        }

        this.init();
    }


    $.fn.subSelectBox = function (options) {
        return this.each( function() {
            if ( !$.data( this, 'subSelectBox') ) {
                $.data( this, 'subSelectBox', new subSelectBox( $(this), options ) );
            }
        });
    };  

}));