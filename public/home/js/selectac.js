

// selete



function cus_dropmenu_set(select, id) {
    var item = $("#" + $("#" + select).data("menu")).find("a[sid='" + id + "']");
    item.addClass("sel");
    if (item.parent().is("p")) {
        item.closest(".cus-dropmenu-menu").find("a[fid='" + item.parent().attr("parentId") + "']").click();
    }

}


$.fn.select= function (settings) {
    var elements = this;
    var defaultSettings = {
        css: "",
    }
    function init() {
        elements.hide();
        $div = $("<div class='cus-select'>" + elements.find("option:selected").text()+ "</div>");
        elements.after($div);
        var s = "<div class='cus-select-list-box' oid='"+elements.attr("id")+"'><div class='cus-select-list'>";
        elements.find("option").each(function(){
            s += "<a href='javascript:;' title='" + $(this).val() + "'>" + $(this).text() + "</a>";
        })
        s += "</div><div class='mask'></div></div>";
        $list = $(s);
        elements.after($list);
        $list.find("a").click(function(){
            sel($(this));
        })
        
        $list.find("a[title='" + elements.val() + "']").addClass("sel");
        $div.click(function () {
            show(this);
        })
    }

    function show(e) {
        var wrap = $(e).prev();
        var o = wrap.find(".cus-select-list");
        if (o.hasClass("cus-select-lis-toggle ")) {
            wrap.find(".mask").fadeOut();
            o.removeClass("cus-select-lis-toggle ");
        } else {
            wrap.show();
            var mask = wrap.find(".mask");
            mask.show();
            mask.on('click', function () {
                hide();
            });
            o.addClass("cus-select-lis-toggle");
            function hide() {
                mask.fadeOut();
                o.removeClass("cus-select-lis-toggle ");
            }
        }

    }

    function sel(e) {
        $select = $("#" + e.closest(".cus-select-list-box").attr("oid"));
        var val = e.attr("title");
        $select.val(val);
        e.closest(".cus-select-list").removeClass("cus-select-lis-toggle ");
        e.closest(".cus-select-list-box").find(".mask").fadeOut();
        e.closest(".cus-select-list-box").next().html(e.text());
        e.closest(".cus-select-list").find("a").removeClass("sel");
        e.addClass("sel");
       
    }


    init();
}



//function killerrors() {
//    return true;
//}
//window.onerror = killerrors;