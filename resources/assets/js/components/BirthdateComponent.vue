<template>
  <div>
        <datepicker format="MMMM dd, yyyy" name="birthdate" placeholder="Select Birthdate" autocomplete="off"></datepicker>
      </div>
</template>

<script type="text/javascript">
    import Datepicker from 'vuejs-datepicker';

    export default {
      components: {
        Datepicker
      },
      mounted() {
        var input = this.$el.querySelector('input');
            //Add class
            input.className = 'uk-input';
      }
    }
</script>
