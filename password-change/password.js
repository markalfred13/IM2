const userIcon = document.querySelector('.user-icon');
const userDropdownContent = document.querySelector('.user-dropdown-content');
const dropdownItems = document.querySelectorAll('.dropdown-item');

// Initially hide the dropdown content
userDropdownContent.classList.add('hidden');

userIcon.addEventListener('click', function() {
  userDropdownContent.classList.toggle('hidden'); // Toggle visibility between 'hidden' and 'show' classes
});

// Handle click on dropdown items
dropdownItems.forEach(item => {
  item.addEventListener('click', function(event) {
    const action = event.target.dataset.action; // Get action from data-attribute
    console.log(`Clicked on: ${action}`); // Replace with your desired action logic (e.g., redirect to a page)
    // You can add logic here to perform specific actions based on the clicked item's data-action value
  });
});

// Optional: Close dropdown on click outside user icon and dropdown
document.addEventListener('click', function(event) {
  if (!userIcon.contains(event.target) && !userDropdownContent.contains(event.target)) {
    userDropdownContent.classList.add('hidden'); // Hide dropdown on outside click
  }
});

window.addEventListener("load", () => {
    document.querySelector(".bg").classList.add("bg--hidden")
});