function mastockinfo_copyToClipboard(elementId) {
    const fullText = document.getElementById(elementId).innerText;
    const textToCopy = fullText.split(': ')[1]; // Get the text after the colon
    navigator.clipboard.writeText(textToCopy).then(() => {
        alert('Ticker copied to clipboard: ' + textToCopy);
    }).catch(err => {
        console.error('Could not copy text: ', err);
    });
}



// jQuery(document).ready(function($) {
//     // When the mastockinfo_main_icons is clicked
//     $('.mastockinfo_main_icons svg').on('click', function() {
//         // Toggle the 'show' class to show/hide the sidebar with animation
//         $('.mastockinfo_sidebar').toggleClass('show');
//     });
// });


window.addEventListener('elementor/frontend/init', () => {
    // Replace 'stock_widget.default' with the widget's specific name to target this widget only
    elementorFrontend.hooks.addAction('frontend/element_ready/stock_widget.default', ($scope) => {
        // Use $scope[0] to get the actual DOM element from the jQuery-like object
        const svgIcon = $scope[0].querySelector('.mastockinfo_main_icons svg');
        const sidebar = document.querySelector('.mastockinfo_sidebar');        

        if (svgIcon && sidebar) {
            // Check if the event listener has been already attached to avoid multiple listeners
            if (!svgIcon.classList.contains('event-attached')) {
                svgIcon.addEventListener('click', function () {
                    // Toggle the 'show' class to show/hide the sidebar with animation
                    sidebar.classList.toggle('show');
                });
                // Mark that the event has been attached
                svgIcon.classList.add('event-attached');
            }
        }
    });
});

