$(document).ready(function() {
  // 🧩 Validation for Full Name (No numbers allowed)
  $("#full_name").on("input", function() {
    this.value = this.value.replace(/[0-9]/g, '');
  });

  // 🧩 Validation for Contact Number (only digits, max 10)
  $("#contact").on("input", function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 10) {
      alert("Phone number cannot be more than 10 digits!");
      this.value = this.value.slice(0, 10);
    }
  });

  // 🧩 Preview Popup Feature
  $("#previewBtn").click(function() {
    let name = $("input[name='full_name']").val();
    let email = $("input[name='email']").val();
    let gender = $("input[name='gender']:checked").val();
    let branch = $("select[name='branch']").val();
    let degree = $("select[name='degree_course']").val();
    let college = $("input[name='college']").val();
    let contact = $("input[name='contact']").val();
    let linkedin = $("input[name='linkedin']").val();

    if (name === "" || email === "" || contact === "") {
      alert("Please fill out required fields before preview!");
      return;
    }

    let previewHTML = `
      <p><b>Full Name:</b> ${name}</p>
      <p><b>Email:</b> ${email}</p>
      <p><b>Gender:</b> ${gender}</p>
      <p><b>Branch:</b> ${branch}</p>
      <p><b>Degree:</b> ${degree}</p>
      <p><b>College:</b> ${college}</p>
      <p><b>Contact:</b> ${contact}</p>
      <p><b>LinkedIn:</b> ${linkedin}</p>
    `;

    $("#previewDetails").html(previewHTML);
    $("#previewPopup").fadeIn();
  });

  // 🧩 Close Preview
  $("#closePopup").click(function() {
    $("#previewPopup").fadeOut();
  });
});
