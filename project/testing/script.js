function showForm(formId) {
    document.querySelectorAll(".form-box").forEach(form=> form.classList.remove("active"))
    document.getElementById(formId).classList.add("active");
}


document.addEventListener('DOMContentLoaded', function() {
    const radioGroups = document.querySelectorAll('.radio-group div');

    radioGroups.forEach(group => {
        group.addEventListener('click', function() {
            // Remove 'checked' class from all divs in the radio group
            radioGroups.forEach(g => g.classList.remove('checked'));
            // Add 'checked' class to the clicked div
            group.classList.add('checked');
            // Check the corresponding radio button
            const radio = group.querySelector('input[type="radio"]');
            radio.checked = true;
        });
    });
});

