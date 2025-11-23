const fileInput = document.getElementById("fileInput");
const profileImage = document.getElementById("profileImage");

fileInput.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById("saveBtn").addEventListener("click", () => {
    alert("Data profil berhasil disimpan (simulasi)");
});

document.getElementById("logoutBtn").addEventListener("click", () => {
    alert("Anda telah logout (simulasi)");
});
