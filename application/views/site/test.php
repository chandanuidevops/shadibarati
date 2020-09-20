<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/materialize.min.css">
  <link rel="stylesheet"  href="https://unpkg.com/vue-pure-lightbox/dist/VuePureLightbox.css"></link>
  
</head>
<body>

  <div id="app">
<vue-pure-lightbox
  thumbnail="https://silentbox.silencesys.com/images/image002.jpg"
  :images="['https://silentbox.silencesys.com/images/image002.jpg', 'https://silentbox.silencesys.com/images/image005.jpg']"
>
</vue-pure-lightbox>
</div>

<script src="<?php echo base_url()?>assets/js/vue.min.js"></script>
<script src="https://unpkg.com/vue-pure-lightbox/dist/VuePureLightbox.umd.min.js"></script>



<script>
  Vue.component('vue-pure-lightbox', window.VuePureLightbox);
    var app = new Vue({
        el: '#app',
        data: {
        }

        });
</script>

  
</body>

</html>






