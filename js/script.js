window.vmLogin = new Vue({
  el: "#login-app",
  data: {
    loading: false,
    modal: {
      otp: false,
      login: false,
    },
    phone: null,
    countdownTimer: 59,
    authId: getAuthId() || null,
    token: getToken() || null,
    loginRequest: false,
    validateOtpRequest: false,
  },
  mounted() {
    setTimeout(() => {
      // this.modal.otp = true;
    }, 1000);
  },
  methods: {
    runTimer() {
      if(this.countdownTimer > 0) {
        setTimeout(() => {
          this.countdownTimer -= 1
          this.runTimer()
        }, 1000)
      }
    },
    async handleOnComplete(value) {
      // console.log("OTP completed: ", value);
      try {
        if(!value) {
          throw 'Something went wrong';
          return;
        }
        
        setTimeout(async() => {
          this.loading = true
          const response = await validateOtp(value)
          // console.log('response validate otp', response)
          this.loading = false
    
          if(response.status == 200) {
            this.closeModal()
            new Toast({
              message: 'Berhasil login',
              type: 'success',
            })
          }
          else{
            throw 'Something went wrong';
          }
        }, 100);
        
      } catch (error) {
        new Toast({
          message: error,
          type: 'danger',
        })
      }

    },
    handleOnChange(value) {
      // console.log("OTP changed: ", value);
    },
    handleClearInput(ref) {
      this.$refs[ref].clearInput();
    },
    openModalLogin() {
      this.modal.login = true;
    },
    closeModalLogin() {
      this.modal.login = false;
    },
    openModal() {
      this.modal.otp = true;
    },
    closeModal() {
      this.modal.otp = false;
    },
    login: async function () {
      // +xx6288233501905
      try {
        if (!this.phone) {
          throw "input phone number";
        }

        // reset
        this.loading = false

        this.loginRequest = true
        // request
        const response = await login(this.phone)
        this.phone = null
        this.loginRequest = false

        // console.log('response login', response)
        if(response.status == 200) {
          this.authId = response.data.authId
          setAuthId(this.authId)
          // open modal otp
          this.openModal()
          this.runTimer()
        }
        else{
          throw response.message ? response.message : "Error";
        }
      } catch (error) {
        new Toast({
          message: error,
          type: 'danger',
        })
      }
    },
  },
});
