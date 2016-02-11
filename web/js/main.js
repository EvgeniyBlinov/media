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
        var request = function (url, method, params){
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    if (response && response.status && response.status == 200) {
                        console.log('response', response);
                    }
                }
            });
        };
        $('#btn-volume-down').click(function(event){
            request('/api/v1/volume/down');
        });

        $('#btn-volume-up').click(function(event){
            request('/api/v1/volume/down');
        });

        $('#btn-key-space').click(function(event){ request('/api/v1/key/space'); });
        $('#btn-key-left').click(function(event){ request('/api/v1/key/left'); });
        $('#btn-key-right').click(function(event){ request('/api/v1/key/right'); });
    });

    return root;
}));
