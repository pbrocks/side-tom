!(function() {
  "use strict";
    var pageheader = new Headroom(document.querySelector("#content-header"), {
        tolerance: 5,
        offset : 75,
        classes: {
          initial: "animated",
          // pinned: "flipInX",
          // unpinned: "flipOutX"
          pinned: "swingInX",
          unpinned: "swingOutX"
        }
    });
    pageheader.init();
}());