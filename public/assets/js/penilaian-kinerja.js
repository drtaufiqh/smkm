/* Search Bar */
    const searchInput = document.getElementById('searchInput');
    const penilaianTable = document.getElementById('penilaianTable');
    const tableRows = penilaianTable.querySelectorAll('tr');

    searchInput.addEventListener('input', function() {
      const searchText = searchInput.value.toLowerCase();

      tableRows.forEach((row, index) => {
        if (index === 0) {
          return; // Skip the first row (header row)
        }

        const cells = row.getElementsByTagName('td');
        let rowText = '';

        for (let i = 0; i < cells.length; i++) {
          rowText += cells[i].textContent.trim().toLowerCase() + ' ';
        }

        if (rowText.includes(searchText)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
