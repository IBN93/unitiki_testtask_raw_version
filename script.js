$(document).ready(function() {
    let ajaxInProgress = false;
    let startFrom = 10;
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 90 && !ajaxInProgress) {
            ajaxInProgress = true;
            let xhr = new XMLHttpRequest();
            let strGET = Number(window.location.search.replace('?', '').replace('tag_id=', '')); 
            xhr.open("POST", "../controllers/load_more_news.php");
            let data = { startfrom: startFrom, tag_id: strGET };
            data = JSON.stringify(data);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(data);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4) {
                    return false;
                }
                if (xhr.status != 200) {
                    console.log('Ошибка');
                } else {
                    $('.content').append(xhr.responseText);
                    startFrom += 10;
                    ajaxInProgress = false;
                }
            };
        }
    });
});
