function openAddContactModal() {
    $('#addEmployeeModal').addClass('show');
    $('#addEmployeeModal').css('display', 'block');
}

function closeAddContactModal() {
    $('#addEmployeeModal').removeClass('show');
    $('#addEmployeeModal').css('display', 'none');
}


function openEditContactModal(id, name, email, address, phone) {
    $('#edit-contact').val(id)
    $('#edit-name').val(name)
    $('#edit-email').val(email)
    $('#edit-address').val(address)
    $('#edit-phone').val(phone)
    $('#editEmployeeModal').addClass('show');
    $('#editEmployeeModal').css('display', 'block');
}

function closeEditContactModal() {
    $('#editEmployeeModal').removeClass('show');
    $('#editEmployeeModal').css('display', 'none');
}

function openDeleteContactModal(id) {
    $('#delete-contact').val(id)
    $('#deleteEmployeeModal').addClass('show');
    $('#deleteEmployeeModal').css('display', 'block');
}

function closeDeleteContactModal() {
    $('#deleteEmployeeModal').removeClass('show');
    $('#deleteEmployeeModal').css('display', 'none');
}