// init Masonry
var grid = document.querySelector('#child-pages');

var msnry = new Masonry(grid, {
    itemSelector: '#child-pages article',
    columnWidth: '#child-pages .grid-sizer',
    percentPosition: true,
    horizontalOrder: true,
    gutter:10
});

imagesLoaded(grid).on('progress', function () {
    // layout Masonry after each image loads
    msnry.layout();
});
