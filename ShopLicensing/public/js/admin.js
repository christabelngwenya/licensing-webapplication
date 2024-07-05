//TOOGLING  DISPLAY OF DIV CONTENTS UNDER THE MAIN SECTION
document.addEventListener("DOMContentLoaded", function() {
  const sidebarOptions = document.querySelectorAll('.sidebar button');
  const mainSections = document.querySelectorAll('.main-content > div');

  sidebarOptions.forEach((option, index) => {
    option.addEventListener('click', function() {
      // Hide all main sections
      mainSections.forEach(section => section.style.display = 'none');

      // Show the selected main section
      mainSections[index].style.display = 'block';
    });
  });
});

const addUserBtn = document.getElementById('addUserBtn');
  const addUserDialog = document.getElementById('addUserDialog');
  const addUserSubmit = document.getElementById('addUserSubmit');

  const adminPrivilegesBtn = document.getElementById('adminPrivilegesBtn');
  const adminPrivilegesDialog = document.getElementById('adminPrivilegesDialog');
  const makeAdminBtn = document.getElementById('makeAdminBtn');
  const removeAdminBtn = document.getElementById('removeAdminBtn');

  addUserBtn.addEventListener('click', () => {
    addUserDialog.style.display = 'flex';
  });

  addUserSubmit.addEventListener('click', () => {
    const name = document.getElementById('nameInput').value;
    const email = document.getElementById('emailInput').value;
    const password = document.getElementById('passwordInput').value;
    // Add user logic here
    console.log('New user:', { name, email, password });
    addUserDialog.style.display = 'none';
  });

  adminPrivilegesBtn.addEventListener('click', () => {
    adminPrivilegesDialog.style.display = 'flex';
  });

  makeAdminBtn.addEventListener('click', () => {
    const name = document.getElementById('adminNameInput').value;
    // Make admin logic here
    console.log('Make admin:', name);
    adminPrivilegesDialog.style.display = 'none';
  });

  removeAdminBtn.addEventListener('click', () => {
    const name = document.getElementById('adminNameInput').value;
    // Remove admin logic here
    console.log('Remove admin:', name);
    adminPrivilegesDialog.style.display = 'none';
  });




  const closeAddUserBtn = document.getElementById('closeAddUserBtn');
  const closeAdminPrivilegesBtn = document.getElementById('closeAdminPrivilegesBtn');

  closeAddUserBtn.addEventListener('click', () => {
    addUserDialog.style.display = 'none';
  });

  closeAdminPrivilegesBtn.addEventListener('click', () => {
    adminPrivilegesDialog.style.display = 'none';
  });


