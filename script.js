function validateForm() {
const name = document.getElementById("name").value.trim();
const subject = document.getElementById("subject").value.trim();
const professor = document.getElementById("professor").value.trim();
const grade = document.getElementById("grade").value.trim();

if (name === "" || subject === "" || professor === "" || grade ===) {
alert("Please fill in both fields.");
return false;
}

return true;
}

