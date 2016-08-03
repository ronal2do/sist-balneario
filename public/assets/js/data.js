var json = (function () { 
    var json = null; 
    $.ajax({ 
        'async': false, 
        'global': false, 
        'url': "http://107.170.25.109/api/cadastros", 
        'dataType': "json", 
        'success': function (data) {
             json = data; 
         }
    });

    return json;
})();
