
$(document).ready(function() {
    // Initialize DataTables
    $('#applicantListTable').DataTable({
        "paging": true, // Enable pagination
        "lengthChange": true, // Enable "number of entries" dropdown
        "searching": true, // Enable search
        "info": true, // Show information about the table
        "language": {
            "paginate": {
                "previous": "&lt;", // Custom pagination previous button
                "next": "&gt;" // Custom pagination next button
            }
        }
    });
});

