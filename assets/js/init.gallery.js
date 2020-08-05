/**
 * mod_directorygallery
 * Copyright 2020 Tom F. Vanbrabant
 * Licensed under: SEE LICENSE IN https://github.com/TVBZ/mod_directorygallery/blob/master/LICENSE
 */


"use strict";

// Get module params
var dgModuleSettings = Joomla.getOptions('mod_directorygallery');

jQuery(document).ready(function () {
    
    // Loop over each module
    var dgmodules = Object.keys(dgModuleSettings);
    for (var _i = 0, _dgmodules = dgmodules; _i < _dgmodules.length; _i++) {
        var id = _dgmodules[_i];
        var params = dgModuleSettings[id];
        var target = "#light-gallery-" + id; 
        
        // Initialize gallery
        var output = {
            selector: ".lg-img-container",
            mode: params.transition,
            getCaptionFromTitleOrAlt: params.caption == 1,
            thumbnail: params.thumbnails == 1,
            animateThumb: true,
            thumbMargin: params.thumbnails_margin,
            showThumbByDefault: params.thumbnails_show == 1,
            toogleThumb: params.thumbnails_toggle == 1,
            counter: params.counter == 1,
            download: params.download == 1,
            fullScreen: params.fullscreen == 1,
            zoom: params.zoom == 1,
            actualSize: params.actualsize == 1,
            scale: params.scale,
            share: params.share == 1,
            hash: params.hash == 1,
            autoplay: params.autoplay == 1,
            autoplayControls: params.autoplaycontrols == 1,
            speed: params.speed,
            pause: params.pauze,
            loop: params.loop == 1,
            hideControlOnEnd: true,
            progressBar: params.progressbar == 1,
            mouseWheel: params.mousewheel == 1,
            pager: params.pager == 1
        }; 
        
        //console.log(output);
        jQuery(target).lightGallery(output);
        console.log(target + " initialized.");
    }

    ;
});