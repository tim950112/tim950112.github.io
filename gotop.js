//回到頂端按鈕 start 
// JavaScript Document
//<![CDATA[
(function() {
    $("body").append("<img id='goTopButton' style='display: none; z-index: 5; cursor: pointer;transition: opacity 0.5s ease 0s;' title='回到頂端'/>");
    var img = "/images/upload.png",
        locatioin = 4 / 5, // 按鈕出現在螢幕的高度比例
        right = 30, // 距離右邊 px 值
        opacity = 0.6, // 透明度
        speed = 100, // 捲動延遲速度
        $button = $("#goTopButton"),
        $body = $(document),
        $win = $(window);
    $button.attr("src", img);
    $button.on({
        mouseover: function() { $button.css("opacity", 1); },
        mouseout: function() { $button.css("opacity", opacity); },
        click: function() { $("html, body").animate({ scrollTop: 0 }, speed); }
    });
    window.goTopMove = function() {
        var scrollH = $body.scrollTop(),
            winH = $win.height(),
            css = { "top": winH * locatioin + "px", "position": "fixed", "right": right, "opacity": opacity, "width": "75px" };
        if (scrollH > 20) {
            $button.css(css);
            $button.fadeIn("slow");
        } else {
            $button.fadeOut("slow");
        }
    };
    $win.on({
        scroll: function() { goTopMove(); },
        resize: function() { goTopMove(); }
    });
})();
//]]>
//回到頂端按鈕 end