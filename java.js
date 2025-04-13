document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const responseMessage = document.getElementById("responseMessage");

    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

          
            const fname = document.getElementById("fname").value.trim();
            const lname = document.getElementById("lname").value.trim();
            const email = document.getElementById("email").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const enquiries = document.getElementById("info").value.trim();

           
            if (!fname || !lname || !email || !phone) {
                responseMessage.innerText = "Please fill in all required fields.";
                responseMessage.style.color = "red";
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                responseMessage.innerText = "Please enter a valid email address.";
                responseMessage.style.color = "red";
                return;
            }

            const formData = new FormData(form);

            fetch("process.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                responseMessage.innerText = data;
                responseMessage.style.color = "green";
                form.reset();
            })
            .catch(error => {
                responseMessage.innerText = "An error occurred. Please try again.";
                responseMessage.style.color = "red";
                console.error("Error:", error);
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {

    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        card.addEventListener('click', function() {
            this.classList.toggle('expanded');
        });
    });
})