(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(function (){
            return factory(root, $);
        });
    } else if (typeof exports === 'object') {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = factory(root, $);
    } else {
        factory(root, $);
    }
}(this, function (root, $, undefined) {
    'use strict';

    $(document).ready(function(){
        $('#btn-volume-down').click(function(event){
            $.ajax({
                url: '/api/v1/volume/down',
                type: 'GET',
                success: function (response) {
                    if (response && response.status && response.status == 200) {
                        console.log('response', response);
                    }
                }
            });
        });

        $('#btn-volume-up').click(function(event){
            $.ajax({
                url: '/api/v1/volume/up',
                type: 'GET',
                success: function (response) {
                    if (response && response.status && response.status == 200) {
                        console.log('response', response);
                    }
                }
            });
        });
    });

    return root;
}));
