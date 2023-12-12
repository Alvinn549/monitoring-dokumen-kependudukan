window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const usersTable = document.getElementById('usersTable');
    if (usersTable) {
        new simpleDatatables.DataTable(usersTable);
    }
});
