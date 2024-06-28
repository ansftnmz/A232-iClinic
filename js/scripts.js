window.addEventListener('DOMContentLoaded', event => {

    // Activate Bootstrap scrollspy on the main nav element
    const sideNav = document.body.querySelector('#sideNav');
    if (sideNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#sideNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

document.addEventListener('DOMContentLoaded', function() {
    $('[data-toggle="modal"]').on('click', function(event) {
        var button = $(event.currentTarget); // Button that triggered the modal
        var serviceName = button.data('service-name'); // Extract info from data-* attributes
        var serviceDescription = button.data('service-description');
        var servicePrice = button.data('service-price');
        var categoryId = button.data('target').replace('#serviceModal', ''); // Extract category ID from data-target
            var modal = $('#serviceModal' + categoryId);

        var modal = $('#serviceModal' + categoryId);
        modal.find('.modal-title').text(serviceName);
        modal.find('#serviceDescription' + categoryId).text(serviceDescription);
        modal.find('#servicePrice' + categoryId).text(servicePrice);
    });
});