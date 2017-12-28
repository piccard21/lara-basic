
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});





// import {tools_utils} from '../js/lib/utils';

/* Filter & Datatable*/
$(document).ready(function () {
    $('#modal-confirm-delete').on('shown.bs.modal', function(e) {
        // GET
        // $(this).find('#btn-confirm-ok').attr('href', $(e.relatedTarget).data('href'));

        // DELETE
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(this).first('#btn-confirm-ok').on('click', function() {
            $.ajax({
                url: $(e.relatedTarget).data('href'),
                data: {_method: "DELETE"},
                type: "DELETE",
                dataType : "json",
            })
            .done(function( json ) {
                console.info("trigger reload ... server umleiten geht?!?!?!");
                $('#modal-confirm-delete').modal('hide')
                location.reload(true);
            })
            .fail(function( xhr, status, errorThrown ) {
                alert( "Sorry, there was a problem!" );
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                console.dir( xhr );
            })
            // Code to run regardless of success or failure;
            .always(function( xhr, status ) {
                // alert( "The request is complete!" );
            });
        });
    });
});