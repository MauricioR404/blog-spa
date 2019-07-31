<template>
  <div class="col-lg-9">
    <transition name="fade" mode="out-in">
      <p
        v-if="sent"
        style="font-size: 25px; padding: 50px;"
      >Tu mensaje ha sido recibido, te contactaremos pronto.</p>

      <form v-else id="contact-form" @submit.prevent="submit">
        <div class="row contact-form-wrap justify-content-center">
          <div class="col-md-6 contact-name form-col">
            <input
              v-model="form.name"
              :class="['form-control', isEmpty('name')]"
              type="text"
              placeholder="Name*"
              onfocus="this.placeholder=''"
              onblur="this.placeholder='Name*'"
            />
          </div>
          <div class="col-md-6 contact-email form-col">
            <input
              v-model="form.email"
              :class="['form-control', isEmpty('email')]"
              type="email"
              placeholder="E-mail*"
              onfocus="this.placeholder=''"
              onblur="this.placeholder='Email*'"
            />
          </div>
          <div class="col-lg-12">
            <textarea
              v-model="form.content"
              :class="['form-control', isEmpty('content')]"
              rows="8"
              placeholder="Message"
              onfocus="this.placeholder=''"
              onblur="this.placeholder='Message*'"
            ></textarea>
          </div>
          <button type="submit" class="primary-btn" :disabled="working">
            <span v-if="working">Send...</span>
            <span v-else>Send Message</span>
          </button>
          <!-- <input type="submit" class="primary-btn" value="Send Message" id="submit-message"> -->
          <div id="msg" class="message"></div>
        </div>
      </form>
    </transition>
  </div>
</template>

<script>
export default {
  data() {
    return {
      sent: false,
      working: false,
      errors: [],
      form: {
        name: '',
        email: '',
        content: '',
      }
    }
  },
  methods: {
    submit() {
      this.working = true;
      axios.post('/api/mensajes', this.form)
        .then(res => {
          this.sent = true;
          this.working = false;
        })
        .catch(err => {
          this.errors = err.response.data.errors;
          this.sent = false;
          this.working = false;
        });
    },
    isEmpty(error){
      // if(error == 'name'){
      //   return ['form-control', this.errors.name && this.form.name.length == 0  ? 'errors' : ''];
      // }
      switch (error) {
        case 'name':
          return ['form-control', this.errors.name && this.form.name.length == 0  ? 'errors' : ''];          
          break;
      
        case 'email':
          return ['form-control', this.errors.email && this.form.email.length == 0  ? 'errors' : ''];
          break;
        case 'content':
          return ['form-control', this.errors.content && this.form.content.length == 0  ? 'errors' : ''];
          break;
      }
    },
  },
  
}
</script>
<style>
  .fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }
  .errors{
    border-color: red;
  }
</style>