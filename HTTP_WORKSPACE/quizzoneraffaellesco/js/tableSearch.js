/* script per la ricerca degli username nella tabella */
var searchIn = 0;

function ricercaNomi() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search-box");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabella");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[searchIn];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}



