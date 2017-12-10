<template>

    <div class="alert alert-success flash-message" role="alert" v-show="show">
        <strong>Success!</strong> {{ body }}.
    </div>

</template>

<script>
    export default {
       
       props:['message'],
       
       data() {
           return {
               body: '',
               show: false
           }
       },

       created() {
         if (this.message) {
                this.flash();
            }
            window.events.$on(
                'flash', data => this.flash(data)
            );
       },

       methods:{
           flash(message) {
               this.body = message;
               this.show = true;

               this.hide();
           },

           hide(){
               setTimeout(() => {
                   this.show = false;
               },3000);
               
           }
       }
    };
</script>

<style>
    .flash-message {
        position: fixed;
        right:0;
        bottom:0;
    }

</style>
