$(document).ready(function() {
    var divs = $('.single-card');
    for (var i = 0; i < divs.length; i += 4) {
            divs.slice(i, i + 4).wrapAll('<div class="card-deck"></div>');
    }
});


$(document).ready(function() {
    var divs = $('.single-card2');
    for (var i = 0; i < divs.length; i += 4) {
            divs.slice(i, i + 4).wrapAll('<div class="card-deck"></div>');
    }
});
