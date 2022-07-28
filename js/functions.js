const HOST = "https://api.stg.kuncie.com/"

function setAuthId(authId) {
  localStorage.setItem("_authId", authId);
}

function getAuthId() {
  return localStorage.getItem("_authId");
}

function setToken(token) {
  localStorage.setItem("_token", token);
}

function getToken() {
  return localStorage.getItem("_token");
}

function login(phoneNumber) {
  const formData = new URLSearchParams({
    phoneNumber: phoneNumber
  })

  return axios.post(HOST + "auth/request-authentication", formData, {
    headers: { 
      "Content-Type": "application/x-www-form-urlencoded"
    }
  });
}

function validateOtp(otp) {
  const formData = new URLSearchParams({
    authId: getAuthId(),
    otp: otp
  })

  return axios.post(HOST + "auth/validate-otp", formData, {
    headers: { 
      "Content-Type": "application/x-www-form-urlencoded"
    }
  });
}
