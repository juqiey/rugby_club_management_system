document.addEventListener("DOMContentLoaded", function () {

    // Auto Calculate Age
    const dob = document.getElementById('date_of_birth');
    const age = document.getElementById('age');

    dob.addEventListener('change', function () {

        if (!this.value) {
            age.value = '';
            return;
        }

        const birthDate = new Date(this.value);
        const today = new Date();

        let years = today.getFullYear() - birthDate.getFullYear();

        const monthDiff = today.getMonth() - birthDate.getMonth();

        if (
            monthDiff < 0 ||
            (monthDiff === 0 && today.getDate() < birthDate.getDate())
        ) {
            years--;
        }

        age.value = years;

    });

    // Image Preview
    const imageInput = document.getElementById('profile_image');
    const preview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            preview.classList.add('hidden');
            preview.src = '';
            return;
        }

        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');

    });

    document.querySelectorAll(".position-card").forEach(function(card){

        card.addEventListener("click", function(){

            const checkbox = card.querySelector(".position-checkbox");
            const icon = card.querySelector(".position-check");

            checkbox.checked = !checkbox.checked;

            if(checkbox.checked){

                card.classList.add("active");
                icon.classList.remove("hidden");

            }else{

                card.classList.remove("active");
                icon.classList.add("hidden");

            }

        });

    });

});