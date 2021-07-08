// global js file

//subselector
$('.subselector').subSelectBox();

// fancy file inputs
$('.file-upload .input-elem').each(function () {
    var $input = $(this);
    var $label = $input.next();
    var labelVal = $label.find('.btn-text').html();

    $input.on('change', function (e) {
        var filename = '';

        if ($('li.empty').length < $input.prop('files').length) {
            $label.find('.btn-text').html(labelVal);
            $input.blur();

        } else {

            if ($input.prop('files') && $input.prop('files').length > 1) {
                // check if more than 3 files selected
                if ($input.prop('files').length <= $('li.empty').length && $('li.empty').length > 0) {
                    filename = ($input.data('multiple-caption') || '').replace('{count}', $input.prop('files').length);
                } else {
                    $input.val('');
                }
            } else {
                filename = e.target.value.split('\\').pop();
            }

            //$(this).closest("form").submit();
            
            if (filename) {
                $label.find('.btn-text').html(filename);
            } else {
                $label.find('.btn-text').html(labelVal);
            }

            $input.blur();

        }
    });
});