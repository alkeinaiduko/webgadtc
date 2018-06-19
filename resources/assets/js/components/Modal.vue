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

              <div class="uk-margin">
                <h4>Announcement Cover</h4>
                <div uk-form-custom="target: true">
                    <input type="file" name="announcement_image">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Edit Photo" disabled>
                </div>
              </div>
              <div class="uk-margin">
                
                <img width="200px" :src="annimagesrc">
              </div>
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              <div>
              
            </div>
            <button class="btn btn-success" @click="saveEdit" :disabled="isDisabled">Save</button> | 
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
    props: ['anntitle', 'anndesc', 'annimagesrc'],

    data() {
      return {
        title: '',
        desc: '',
        isDisabled: true
      }
    },
    methods: {
      changeDesc(event) {
        this.isDisabled = false;
        this.desc = event.target.value;
      },
      changeTitle(event) {
        this.isDisabled = false;
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