// public/js/adminScript.js
// Script for admin page modals and edit functionality

function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.showModal();
        modal.style.display = "flex";
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.close();
        setTimeout(() => {
            modal.style.display = "none";
        }, 200); // pastikan display none setelah close
    }
}

function editMajalah(id) {
    fetch(`/admin/majalah/${id}/edit`)
        .then((res) => res.json())
        .then((data) => {
            document.getElementById(
                "editMajalahForm"
            ).action = `/admin/majalah/${id}`;
            document.getElementById("editJudul").value = data.judul;
            document.getElementById("editDeskripsi").value = data.deskripsi;
            document.getElementById("editMajalahCarousel").innerHTML = `
                <div class='flex gap-4'>
                    <img src='/asset/majalah/cover/${data.cover}' class='h-20 w-auto rounded shadow' alt='cover'>
                    <a href='/asset/majalah/pdf/${data.file_pdf}' target='_blank' class='text-blue-700 underline'>Lihat PDF</a>
                </div>
            `;
            openModal("modalEditMajalah");
        });
}

document.addEventListener("DOMContentLoaded", function () {
    // Ganti semua pemanggilan .showModal() pada tombol tambah baru
    document.querySelectorAll('[onclick*="modalMajalah"]').forEach((btn) => {
        btn.setAttribute("onclick", "openModal('modalMajalah')");
    });
    document.querySelectorAll('[onclick*="modalCarousel"]').forEach((btn) => {
        btn.setAttribute("onclick", "openModal('modalCarousel')");
    });
    // Tambahkan event listener untuk semua tombol batal modal
    document.querySelectorAll(".close-modal-btn").forEach((btn) => {
        btn.addEventListener("click", function () {
            closeModal(this.getAttribute("data-modal"));
        });
    });
});
