document.addEventListener('DOMContentLoaded', function() {
    var logo = document.getElementById('profileLogo');
    var dropdown = document.getElementById('profileDropdown');
    if (logo && dropdown) {
        logo.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            if (!dropdown.contains(event.target) && event.target !== logo) {
                dropdown.style.display = 'none';
            }
        });
    }
});