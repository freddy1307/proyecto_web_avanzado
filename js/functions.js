$("button[data-dismiss='alert']").click(function(){

    $('#alert').removeClass('d-none');
    $('.alert').alert('close');

})


$("#addEmployee").click(function(){
    $('#addEmployeeModal').addClass('show');

})