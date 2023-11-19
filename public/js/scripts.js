// Tangani perubahan pada radio button
var radioButtons = document.querySelectorAll('input[name="recommended_category"]');
radioButtons.forEach(function (radioButton) {
  radioButton.addEventListener('change', function () {
    if (this.checked) {
      document.getElementById('name_category').value = this.value;
    }
  });
});

// Inisialisasi DataTables
$(document).ready(function () {
  $('#dataTable').DataTable();
});