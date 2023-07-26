function activateTab(targetTabId) {
    // Get the pagination and tabs elements
    const pagination = document.getElementById('borderedTabJustifiedPagination');
    const tabs = document.getElementById('borderedTabJustified');

    // Get the target tab and its trigger element
    const targetTab = document.querySelector(targetTabId);
    const tabTrigger = tabs.querySelector(`[data-bs-target="${targetTabId}"]`);

    // Remove 'active' class from all tab trigger elements
    const tabTriggers = tabs.getElementsByClassName('nav-link');
    for (let i = 0; i < tabTriggers.length; i++) {
        tabTriggers[i].classList.remove('active');
    }

    // Add 'active' class to the target tab trigger
    tabTrigger.classList.add('active');

    // Show the target tab and hide other tabs
    const tabContents = document.getElementsByClassName('tab-pane');
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove('show', 'active');
    }
    targetTab.classList.add('show', 'active');
}

// Add click event listeners to pagination links
const paginationLinks = pagination.getElementsByTagName('a');
for (let i = 0; i < paginationLinks.length; i++) {
    paginationLinks[i].addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        // Get the target tab ID from the href attribute
        const targetTabId = this.getAttribute('href');

        // Activate the target tab
        activateTab(targetTabId);
    });
}
