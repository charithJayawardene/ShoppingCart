<?php

echo '<script>
    howMany = 15;
listButton = $("button.list-view");
gridButton = $("button.grid-view");
wrapper = $("div.wrapper");

div = "<div class="item">\n\
<a href="javascript:void(0);">\n\
<img src="../images/product/product_1_1.jpg" alt=""/></a>\n\
<div class="details">\n\
<h2>Gretsch Catalina Club Jazz</h2>\n\
<span>Yours for only <span class="price">$599.99</span></span>\n\
<p>What a classic kit! Available in several great colors, including Natural (shown), Walnut Glaze, White Marine, Copper Sparkle, and Black Galaxy. Every drummer needs one of these.</p>\n\
</div>\n\
</div>";

// Set up divs
for (i = 0; i < howMany; i++) {
    if (window.CP.shouldStopExecution(1)) {
        break;
    }
    $(".wrapper").append(div);
}
window.CP.exitedLoop(1);


listButton.on("click", function () {

    gridButton.removeClass("on");
    listButton.addClass("on");
    wrapper.removeClass("grid").addClass("list");

});

gridButton.on("click", function () {

    listButton.removeClass("on");
    gridButton.addClass("on");
    wrapper.removeClass("list").addClass("grid");

});



//# sourceURL=pen.js



</script>';
