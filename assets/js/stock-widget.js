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
    elementorFrontend.hooks.addAction('frontend/element_ready/stock_widget.default', ($scope) => {
        const svgOpenIcon = $scope[0].querySelector('#mastockinfo-icon-open');
        const svgCloseIcon = $scope[0].querySelector('#mastockinfo-icon-close');
        const sidebar = document.querySelector('.mastockinfo_sidebar');

        if (svgOpenIcon && svgCloseIcon && sidebar) {
            if (!svgOpenIcon.classList.contains('event-attached')) {
                svgOpenIcon.addEventListener('click', function () {
                    // Toggle the 'show' class to show/hide the sidebar with animation
                    sidebar.classList.toggle('show');

                    // Check if the sidebar is shown and toggle icons
                    if (sidebar.classList.contains('show')) {
                        svgOpenIcon.style.display = 'none';  // Hide "i" icon
                        svgCloseIcon.style.display = 'inline';  // Show "x" icon
                    } else {
                        svgOpenIcon.style.display = 'inline';  // Show "i" icon
                        svgCloseIcon.style.display = 'none';  // Hide "x" icon
                    }
                });

                svgCloseIcon.addEventListener('click', function () {
                    sidebar.classList.toggle('show');
                    
                    // Check if the sidebar is hidden and toggle icons
                    if (!sidebar.classList.contains('show')) {
                        svgOpenIcon.style.display = 'inline';  // Show "i" icon
                        svgCloseIcon.style.display = 'none';  // Hide "x" icon
                    }
                });

                svgOpenIcon.classList.add('event-attached');
            }
        }
    });
});
