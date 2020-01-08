const PluginManager = window.PluginManager;

var xhr = new XMLHttpRequest();
xhr.open('GET', '/partviewedproducts/get');
xhr.send(null);
xhr.onreadystatechange = function () {
    var DONE = 4; // readyState 4 means the request is done.
    var OK = 200; // status 200 is a successful return.
    if (xhr.readyState === DONE) {
        //console.log(xhr.status);
        if (xhr.status === OK && !(xhr.response == 204)) {
            //console.log(xhr.response);
            const elem = document.getElementById( 'ViewedProductsContainer' );
            elem.innerHTML = elem.innerHTML + xhr.response;
            elem.style.removeProperty('display');
            PluginManager.initializePlugins();
        } else if(xhr.response == 204){
            console.log('No viewed products'); // Endpoint returned Empty Content
        }
        else {
            console.log('Error: ' + xhr.status); // An error occurred during the request.
        }
    }
};




