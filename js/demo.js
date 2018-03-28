$(function () {
    skinChanger();
    activateNotificationAndTasksScroll();

    setSkinListHeightAndScroll(true);
    setSettingListHeightAndScroll(true);
    $(window).resize(function () {
        setSkinListHeightAndScroll(false);
        setSettingListHeightAndScroll(false);
    });
});

//Skin changer
function skinChanger() {
    $('.right-sidebar .demo-choose-skin li').on('click', function () {
        var $body = $('body');
        var $this = $(this);

        var existTheme = $('.right-sidebar .demo-choose-skin li.active').data('theme');
        $('.right-sidebar .demo-choose-skin li').removeClass('active');
        $body.removeClass('theme-' + existTheme);
        $this.addClass('active');

        $body.addClass('theme-' + $this.data('theme'));
    });
}

//Skin tab content set height and show scroll
function setSkinListHeightAndScroll(isFirstTime) {
    var height = $(window).height() - ($('.navbar').innerHeight() + $('.right-sidebar .nav-tabs').outerHeight());
    var $el = $('.demo-choose-skin');

    if (!isFirstTime) {
        $el.slimScroll({destroy: true}).height('auto');
        $el.parent().find('.slimScrollBar, .slimScrollRail').remove();
    }

    $el.slimscroll({
        height: height + 'px',
        color: 'rgba(0,0,0,0.5)',
        size: '6px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}

//Setting tab content set height and show scroll
function setSettingListHeightAndScroll(isFirstTime) {
    var height = $(window).height() - ($('.navbar').innerHeight() + $('.right-sidebar .nav-tabs').outerHeight());
    var $el = $('.right-sidebar .demo-settings');

    if (!isFirstTime) {
        $el.slimScroll({destroy: true}).height('auto');
        $el.parent().find('.slimScrollBar, .slimScrollRail').remove();
    }

    $el.slimscroll({
        height: height + 'px',
        color: 'rgba(0,0,0,0.5)',
        size: '6px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}

//Activate notification and task dropdown on top right menu
function activateNotificationAndTasksScroll() {
    $('.navbar-right .dropdown-menu .body .menu').slimscroll({
        height: '254px',
        color: 'rgba(0,0,0,0.5)',
        size: '4px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}

//Google Analiytics ======================================================================================
addLoadEvent(loadTracking);
var trackingId = 'UA-30038099-6';

function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
        window.onload = func;
    } else {
        window.onload = function () {
            oldonload();
            func();
        }
    }
}

function loadTracking() {
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', trackingId, 'auto');
    ga('send', 'pageview');
}
//========================================================================================================
var Call_Service = function () {

    this.GetJSON = function (URL, FN, _data, blockUI_open, callback) {

        var i = 0;
        var _array_param = "";

        if (_data.length > 0) {
            for (i; i < _data.length; i++) {
                if (i == 0) {
                    _array_param += _data[i];
                } else {
                    _array_param += "|" + _data[i];
                }
            }
        }

        $.ajax({
            type: 'POST',
            url: URL,
            data: {FN: FN, PARM: _array_param},
            beforeSend: function () {
                if (blockUI_open) {

                }
            },
            success: function (data) {
                if (blockUI_open) {
                }
                callback(data);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("พบข้อผิดพลาดบางอย่างในการรับส่งข้อมูล กรุณาตรวจสอบการเชื่อมต่ออินเตอร์เน็ต หรือแจ้งผู้ดูแลระบบ");
                console.log("พบข้อผิดพลาดบางอย่างในการรับส่งข้อมูล");
                return false;
            }
        });

    }

    this.Check_Before_POST = function (_data) {
        var i = 0;

        if (_data.length > 0) {
            for (i; i < _data.length; i++) {
                if (_data[i] == "" || _data[i] == "null") {
                    alert('กรุณาใส่ข้อมูลให้ครบถ้วน');
                    return false;
                }
            }
        }
        return true;
    }

    this.Check_Null_Json = function (length_number) {
        if (length_number == 0) {
            Warning('ไม่พบข้อมูลที่ต้องการ');
            return false;
        }
    }

}

function formatDateDB(date) {
    var newdate = date.split("/").reverse().join("-");
    return newdate;
}

function DateThai(date) {
    var strDate = new Date(date);
    var dd = strDate.getDate();
    var mm = strDate.getMonth() + 1; //January is 0!
    var yyyy = strDate.getFullYear() + 543;
    var strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษภาคม", "ธันวาคม");
    var strMonthThai = strMonthCut[mm];
    return dd + " " + strMonthThai + " พ.ศ. " + yyyy;
}

function formatDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    var curr_hour = today.getHours();
    var curr_min = today.getMinutes();
    var curr_sec = today.getSeconds();
    var strTime = curr_hour + ':' + curr_min + ':' + curr_sec;
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    return today + ' ' + strTime;
}