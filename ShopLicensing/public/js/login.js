document.getElementById("togglePassword").addEventListener("click", function() {
    var passwordInput = document.getElementById("passwordInput");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.classList.remove("fa-eye-slash");
        this.classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        this.classList.remove("fa-eye");
        this.classList.add("fa-eye-slash");
    }
});