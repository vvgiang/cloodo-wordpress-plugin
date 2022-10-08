jQuery(document).ready(function($) {
    let siteUrl = script_object.getSiteUrl ? script_object.getSiteUrl : "";
    window.addEventListener('click', function(e){
        const ele = document.querySelectorAll(".show-action");
        for (const value of ele) {
            value.classList.remove('showHide');
        }
        if(e.target.classList.contains('btn-action')) {
            const currentId = (e.target.getAttribute('data'));
            var element = document.getElementById(currentId);
            element.classList.toggle("showHide");
        }
    });
    $(document).on('click',".js-getoken",sendData);
        function sendData(e) {
            try {
                        // e.preventDefault();
                        var valselect = $('select[name=accountselect] option').filter(':selected').val();
                        // console.log(valselect);
                        var myIfr = window.frames['iframeclws'].contentWindow;
                        // popup = window.open("http://localhost/scroll-parallax/", 'window-2');
                        var val = myIfr.postMessage(valselect,'http://localhost:3006/check-login');
                        // window.location.href = 'http://localhost/svtest/wp-admin/admin.php?page=lead';
            } catch (e) {
                console.log('Error: ' + e.message);
            }
        }
    window.addEventListener("message", (e) => {
        if (typeof e.data === "object") return;
            if (e.data == "send successfuly") {
                console.log(e.data);
                window.location.href = siteUrl +'/wp-admin/admin.php?page=lead';
            }
    }, false);
});
