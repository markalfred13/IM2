// profile.js

// Simulate retrieving user data (replace with your actual logic)
const loggedInUser = {
    firstName: "John",
    lastName: "Doe",
    email: "johndoe@example.com",
    mobileNumber: "123-456-7890",
    address: "123 Main Street"
};

// Get references to the form elements
const firstNameInput = document.querySelector('input[placeholder="First name"]');
const lastNameInput = document.querySelector('input[placeholder="Last name"]');
const emailInput = document.querySelector('input[placeholder="Enter email"]');
const mobileNumberInput = document.querySelector('input[placeholder="Enter phone number"]');
const addressInput = document.querySelector('input[placeholder="Enter address"]');

// Pre-fill the form with user data
firstNameInput.value = loggedInUser.firstName;
lastNameInput.value = loggedInUser.lastName;
emailInput.value = loggedInUser.email;
mobileNumberInput.value = loggedInUser.mobileNumber;
addressInput.value = loggedInUser.address;

// Get references to the name and email display elements
const userNameElement = document.querySelector('.font-weight-bold');
const userEmailElement = document.querySelector('.text-black-50');

// Set the name and email display
userNameElement.textContent = `${loggedInUser.firstName} ${loggedInUser.lastName}`;
userEmailElement.textContent = loggedInUser.email;

// Get reference to the save button
const profileButton = document.querySelector('.profile-button');

// Save Profile button click event
profileButton.addEventListener('click', () => {
    // Gather updated profile data
    const updatedProfile = {
        firstName: firstNameInput.value,
        lastName: lastNameInput.value,
        email: emailInput.value,
        mobileNumber: mobileNumberInput.value,
        address: addressInput.value
    };

    // You would typically send this 'updatedProfile' to your server-side code to update the database.

    // Update the name and email display
    userNameElement.textContent = `${updatedProfile.firstName} ${updatedProfile.lastName}`;
    userEmailElement.textContent = updatedProfile.email;

    alert("Profile saved!"); // Just a notification for now
});
