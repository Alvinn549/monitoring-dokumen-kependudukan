window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const kartuMonitoringTable = document.getElementById('kartuMonitoringTable');
    if (kartuMonitoringTable) {
        new simpleDatatables.DataTable(kartuMonitoringTable);
    }
});
