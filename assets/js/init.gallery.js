/**
 * mod_directorygallery
 * Copyright 2020 Tom F. Vanbrabant
 * Licensed under: SEE LICENSE IN https://github.com/TVBZ/mod_directorygallery/blob/master/LICENSE
 */


// Get module params
const dgModuleSettings = Joomla.getOptions('mod_directorygallery');

jQuery(document).ready(function () {

    // Loop over each module
    const dgmodules = Object.keys(dgModuleSettings);
    for (const id of dgmodules) {

        const params = dgModuleSettings[id];
        const target = "#light-gallery-" + id;

        // Callback to evaluate true/false params
        function check(parameter) {
            return params[parameter] === "1";
        };

        // Initialize carousel
        const output = {
            selector: ".lg-img-container",
            mode: params.transition,
            getCaptionFromTitleOrAlt: check("caption"),
            currentPagerPosition: "middle",
            thumbnail: check("thumbnails"),
            animateThumb: false,
            thumbMargin: 10,
            showThumbByDefault: check("gallery_thumbnails_show"),
            toogleThumb: check("gallery_thumbnails_toggle"),
            counter: check("counter"),
            download: check("download"),
            fullScreen: check("fullscreen"),
            zoom: check("zoom"),
            actualSize: false,
            scale: 1,
            share: check("share"),
            hash: check("hash"),
            autoplay: check("autoplay"),
            fourceAutoplay: false,
            autoplayControls: true,
            pause: 5000,
            progressBar: true,
            pager: check("pager")
        };

        console.log(output);
        jQuery(target).lightGallery(output);
        console.log(target + " initialized.")

    };

});