<template>
  <div>
        <datepicker v-model="dateNow" format="MMMM dd, yyyy" name="when" placeholder="Select Date"></datepicker>
      </div>
</template>

<script type="text/javascript">
    import Datepicker from 'vuejs-datepicker';

    

    export default {
      components: {
        Datepicker
      },
      data() {
        let currentDate = new Date();
        return {
          dateNow: currentDate
        }
      },
      mounted() {
        var input = this.$el.querySelector('input');
            //Add class
            input.className = 'uk-input';
      }
    }
</script>
