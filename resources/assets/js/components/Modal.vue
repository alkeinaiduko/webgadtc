<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">
          <h2>Edit Announcement</h2>
          
          <div class="modal-body">
            <div><h4>Title</h4></div>
            <slot name="header">
              <!-- {{ title}} -->
              <input class="uk-input" :value="anntitle" @input="changeTitle"></input>
            </slot>
          </div>

          <div class="modal-body">
            <h4>Description</h4>
            <slot name="body">
              <textarea class="uk-textarea" name="description" :value="anndesc" @input="changeDesc"></textarea>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <div>
              
            </div>
            <button class="btn btn-success" @click="saveEdit">Save</button> | 
              <button class="btn btn-danger" @click="$emit('close')">
                Close
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script type="text/javascript">

  export default {
    props: ['anntitle', 'anndesc'],

    data() {
      return {
        title: '',
        desc: ''
      }
    },
    methods: {
      changeDesc(event) {
        this.desc = event.target.value;
      },
      changeTitle(event) {
        this.title = event.target.value;
      },
      saveEdit() {
        this.$emit('descChanged', this.desc);
        this.$emit('titleChanged', this.title);
        this.$emit('close');
      }
    }

  }
</script>