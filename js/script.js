new Vue({
  el: "#login-app",
  data: {
    loading: false,

    modal: {
      otp: false,
    },
    phone: null,
    otp: null,
    countdownTimer: 59,
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
    handleOnComplete(value) {
      console.log("OTP completed: ", value);
      this.loading = true
    },
    handleOnChange(value) {
      console.log("OTP changed: ", value);
    },
    handleClearInput(ref) {
      this.$refs[ref].clearInput();
    },
    login: function () {
      if (!this.phone) {
        alert("input phone number");
        return;
      }
      // reset
      this.loading = false
      // open modal otp
      this.modal.otp = true;
      this.runTimer()

    },
  },
});
