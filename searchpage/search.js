window.addEventListener("load", () => {
    document.querySelector(".bg").classList.add("bg--hidden")
});

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

