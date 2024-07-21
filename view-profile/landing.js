const redirectToOtherFile = function(elementId, targetFile) {
    const element = document.getElementById(elementId);
    if (element) {
      element.addEventListener('click', () => {
        window.location.href = targetFile;
      });
    } else {
      console.error(`Element with ID "${elementId}" not found.`);
    }
  };
  
  redirectToOtherFile('glass-div', '../searchpage/search.php');

  const userIcon = document.querySelector('.user-icon');
const userDropdownContent = document.querySelector('.user-dropdown-content');
const dropdownItems = document.querySelectorAll('.dropdown-item');


userDropdownContent.classList.add('hidden');

userIcon.addEventListener('click', function() {
  userDropdownContent.classList.toggle('hidden');
});


dropdownItems.forEach(item => {
  item.addEventListener('click', function(event) {
    const action = event.target.dataset.action; 
    console.log(`Clicked on: ${action}`); 
    
  });
});


document.addEventListener('click', function(event) {
  if (!userIcon.contains(event.target) && !userDropdownContent.contains(event.target)) {
    userDropdownContent.classList.add('hidden'); 
  }
});
 
const changePasswordLink = document.querySelector('.dropdown-item[data-action="settings"]');
const managePasswordForm = document.querySelector('.manage-password');
const cancelPasswordForm = document.querySelector('.cancel');

changePasswordLink.addEventListener('click', () => {
    managePasswordForm.classList.remove('manage-password');
    managePasswordForm.classList.add('manage-password--shown');

    const userDropdown = document.querySelector('.user-dropdown-content');
    userDropdown.style.display = 'none'; 
});

cancelPasswordForm.addEventListener('click', (event) => {
    event.preventDefault();
    hidePasswordForm(managePasswordForm);

 
    const userDropdown = document.querySelector('.user-dropdown-content');
    userDropdown.style.display = 'block'; 
});

function hidePasswordForm(formElement) {
    if (formElement) {
        formElement.classList.remove('manage-password--shown');
        formElement.classList.add('manage-password');
    }
}
// ---------






// landing.js
document.addEventListener('DOMContentLoaded', function () {
  const userIcon = document.querySelector('.user-icon');
  const dropdownContent = document.querySelector('.user-dropdown-content');
  const displayedEmail = document.getElementById('displayedEmail');
  const displayedUsername = document.getElementById('displayedUsername');

  // Immediately fetch and display user info on page load
  fetchUserInfo(); 

  userIcon.addEventListener('click', () => {
    dropdownContent.classList.toggle('show'); // Toggle dropdown
  });

  function fetchUserInfo() {
    fetch('fetch_user_info.php')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok.');
        }
        return response.json();
      })
      .then(data => {
        if (data.error) {
          console.error(data.error);
          return;
        }

        // Display user information in the dropdown
        displayedEmail.textContent = "Email: " + data.email;
        displayedUsername.textContent = "Username: " + data.username;
      })
      .catch(error => {
        console.error('Error fetching user data:', error);
        // Handle errors (e.g., display an error message)
      });
  }
});

window.addEventListener("load", () => {
  document.querySelector(".bg").classList.add("bg--hidden")
});





