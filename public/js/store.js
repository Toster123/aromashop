function $_getIsset(key) {
    var url = new URL(window.location.href);
    return url.searchParams.get(key) === null ? false : true;
}


function removeURLParameter(url, parameter) {

    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        if(pars.length > 0) {
            url= urlparts[0]+'?'+pars.join('&');
        } else {
            url= urlparts[0];
        }
        return url;
    } else {
        return url;
    }
}


function serializeGet(obj) {
    var str = [];
    for(var p in obj)
        if (obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    return str.join("&");
}


function addGet(url, get) {

    if (typeof(get) === 'object') {
        get = serializeGet(get);
    }

    if (url.match(/\?/)) {
        return url + '&' + get;
    }

    if (!url.match(/\.\w{3,4}$/) && url.substr(-1, 1) !== '/') {
        url += '/';
    }

    return url + '?' + get;
}

function checkSlashInPath () {if (window.location.pathname.charAt(window.location.pathname.length - 1) == '/') {return '';} else {return '/';}}

function insertAfter(referenceNode, newNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}



function getItems () {
    $.ajax({
        url: getItemsUrl + window.location.search,
        type: 'get',
        datatype: 'html',
        success: function (items) {
            document.getElementById('items').innerHTML = items;
        },
        error: function (msg) {
            console.log(msg);
        }

    })
}



function sortBy() {
    var selectBox = document.getElementById("sort");

    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    if(selectedValue !== 'pop') {
        history.pushState({}, '', addGet(removeURLParameter(window.location.href, 'sortby'), 'sortby=' + selectedValue));
    } else {
        history.pushState({}, '', removeURLParameter(window.location.href, 'sortby'));
    }
    getItems ();
}

var route = searchItemsUrl;
$('#search').typeahead({
    source: function (term, process) {
        return $.get(route, { term: term }, function (data) {
            return process(data);
        });
    }
});
