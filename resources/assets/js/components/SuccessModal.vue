<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="success-modal-container">
          <div class="modal-body text-center">
            <slot name="body">
              
            </slot>
          </div>

          <div class="modal-footer text-center">
            <slot name="footer">
              <div>
              
            </div>
              <button class="btn btn-danger" @click="$emit('close')">
                okay
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

  }
</script>