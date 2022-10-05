/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('slider', require('./components/slider.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //root
new Vue({
    el: '#app',
    data() {

      // Vue data for attribute with increment and decrement method
        return {

          dismissSecs: 10,
          dismissCountDown: 0,

          totatt: 10, //real data 180
          pass: 0,
          defend: 0,
          physical:0,
          dribbling:0,
          pace:0,
          shooting:0,
          total: 0
        };
      },
      methods: {
    
        increment(type) {       //increment untuk attribute
          if (this.totatt === 0) return
    
          if (type == "pass")
            this.pass += 1;
    
          if (type == "defend")
            this.defend += 1;

          if (type == "physical")
            this.physical += 1;
    
          if (type == "dribbling")
            this.dribbling += 1;
          
          if (type == "pace")
            this.pace += 1;

          if (type == "shooting")
            this.shooting += 1;
          
            this.totatt -= 1;
        },
        
        decrement(type) {                 //decrement untuk attribute
    
    
          if (type == "pass") {
            if (this.pass === 0) return
            this.pass -= 1;
          } 
          
          if (type == "defend") {
            if (this.defend === 0) return
            this.defend -= 1;
          }
    
          if (type == "physical") {
            if (this.physical === 0) return
            this.physical -= 1;
          }
          
          if (type == "dribbling") {
            if (this.dribbling === 0) return
            this.dribbling -= 1;
          }

          if (type == "pace") {
            if (this.pace === 0) return
            this.pace -= 1;
          }

          if (type == "shooting") {
            if (this.shooting === 0) return
            this.shooting -= 1;
          }
          
          this.totatt += 1;
        }
    
      },

      countDownChanged(dismissCountDown) {      //Ni bootstrap vue , countdown
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {                           //bootstrap vue, countdown
        this.dismissCountDown = this.dismissSecs
      }
    
    });
    // mounted(){
    //     //plugin bootstrap minus and plus
    //     //http://jsfiddle.net/laelitenetwork/puJ6G/
    
    // $('.btn-number').click(function(e){
    //     e.preventDefault();


    //     fieldName = $(this).attr('data-field');
    //     type      = $(this).attr('data-type');
    //     var input = $("input[name='"+fieldName+"']");
    //     var currentVal = parseInt(input.val());
    //     if (!isNaN(currentVal)) {
    //         if(type == 'minus') {
                
    //             if(currentVal > input.attr('min')) {
    //                 input.val(currentVal - 1).change();
    //             } 
    //             if(parseInt(input.val()) == input.attr('min')) {
    //                 $(this).attr('disabled', true);
    //             }
    
    //         } else if(type == 'plus') {
    
    //             if(currentVal < input.attr('max')) {
    //                 input.val(currentVal + 1).change();
    //             }
    //             if(parseInt(input.val()) == input.attr('max')) {
    //                 $(this).attr('disabled', true);
    //             }
    
    //         }
    //     } else {
    //         input.val(0);
    //     }
    // });
    // $('.input-number').focusin(function(){
    //    $(this).data('oldValue', $(this).val());
    // });
    // $('.input-number').change(function() {
        
    //     minValue =  parseInt($(this).attr('min'));
    //     maxValue =  parseInt($(this).attr('max'));
    //     valueCurrent = parseInt($(this).val());
        
    //     name = $(this).attr('name');
    //     if(valueCurrent >= minValue) {
    //         $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    //     } else {
    //         alert('Sorry, the minimum value was reached');
    //         $(this).val($(this).data('oldValue'));
    //     }
    //     if(valueCurrent <= maxValue) {
    //         $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    //     } else {
    //         alert('Sorry, the maximum value was reached');
    //         $(this).val($(this).data('oldValue'));
    //     }
        
        
    // });
    
    // // Hotkey function
    // $(".input-number").keydown(function (e) {
    //         // Allow: backspace, delete, tab, escape, enter and .
    //         if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
    //              // Allow: Ctrl+A
    //             (e.keyCode == 65 && e.ctrlKey === true) || 
    //              // Allow: home, end, left, right
    //             (e.keyCode >= 35 && e.keyCode <= 39)) {
    //                  // let it happen, don't do anything
    //                  return;
    //         }
    //         // Ensure that it is a number and stop the keypress
    //         if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
    //             e.preventDefault();
    //         }
    //     });
    // }