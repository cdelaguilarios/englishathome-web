jQuery(function($) {

    var forms = document.getElementsByTagName('form');

    for (var i = 0; i < forms.length; i++) {

        $('select.wpcf7-select.post-image', forms[i]).each(function() {
            var post_image = $(this);

            // Set allowClear only when include_blank is set
            var allow_clear = (post_image.attr('allow-clear') == 'true') ? true : false;

            // Showing/Hiding the search box
            var search_box = (post_image.attr('search-box') == 'true') ? 2 : Infinity;

            post_image.select2({
                language                : wpcf7_post_image_select_obj.locale,
                placeholder             : wpcf7_post_image_select_obj.placeholder,
                allowClear              : allow_clear,
                minimumResultsForSearch : search_box,
                escapeMarkup            : function (markup) { return markup; },
                templateResult          : formatPost,
                templateSelection       : formatPostSelection
            });
        });
    }

    /*
     * Customize the display of this placholder for showing the post title, thumbnail and excerpt
     * Code from https://select2.github.io/examples.html#data-ajax
     */
    function formatPost(selection)
    {
        if (!selection.id) {
            return selection.text;
        }

        var thumbnail;
        var image = $(selection.element).data('image');
        var excerpt = $(selection.element).data('excerpt');
        var width = $(selection.element).data('width');

        if (image) {
            thumbnail = "<img src='" + image + "' />";
        } else {
            thumbnail = "<div style='width: " + width + "px; height: " + width + "px; font-size: " + width + "px;' class='dashicons dashicons-format-image'></div>";
        }

        var markup = "<div class='wpcf7-select2-post-image clearfix'>" +
            "<div class='wpcf7-select2-post-image__thumbnail' style='width:" + width + "px;'>" + thumbnail +"</div>" +
            "<div class='wpcf7-select2-post-image__meta'>" +
                "<div class='wpcf7-select2-post-image__title'>" + selection.text + "</div>";

        if (excerpt) {
            markup += "<div class='wpcf7-select2-post-image__description'>" + excerpt + "</div>";
        }

        // Add custom meta data
        if($(selection.element).attr('data-meta')) {

            var meta_data = $(selection.element).data('meta').split('|')

            if(meta_data.length > 0) {
                markup += "<div class='wpcf7-select2-post-image__meta_data'>";

                $.each(meta_data, function( index, value ) {
                    markup += "<span class='wpcf7-select2-post-image__meta'>" + value + "</span>";
                });

                markup += "</div>";
            }
        }

        markup += "</div>" +
            "</div>";

        return markup;
    }

    /*
     * Customize the display of the selection
     */
    function formatPostSelection (selection) {
        return selection.text;
    }

});