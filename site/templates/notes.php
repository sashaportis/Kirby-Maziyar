<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`.
 * This template lists all all the subpages of the `notes` page with their title date sorted by date and links to each subpage.
 * Snippets like the header, footer and intro contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header-notes') ?>

<main>
 
   <a class="button" href="http://localhost:8888/maziyar-starterkit-master/about">About</a>
       <a class="home" href="http://localhost:8888/maziyar-starterkit-master">Home</a>

  <table id="myTable">
    <thead>
    

    
    
  
  <tr>
   <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
    <th id="img"></th>
    <th id="project" onclick="sortTable(0)">Project</th>
    <th id="client" onclick="sortTable(1)">Cient</th>
    <th id="year" onclick="sortTable(2)">Year</th>
  </tr>
 </thead>       
        
        
        <tbody>
            
        <?php foreach ($page->children()->listed()->sortBy('date', 'desc') as $note): ?>

        
  
    <tr>
    
  <td>  <a href="<?= $note->url() ?>"><?php if ($thumbnail = $note->thumbnail()->toFile()): ?>
   <img class="<?= $thumbnail->orientation() ?>" src="<?= $thumbnail->url() ?>">
<?php endif ?></a> </td>
    <td><a href="<?= $note->url() ?>"><?= $note->title() ?></a></td>
    <td><a href="<?= $note->url() ?>"><?= $note->client() ?></a></td>
    <td><a href="<?= $note->url() ?>"><?= $note->year() ?></a></td>
  </tr>

    <?php endforeach ?>
      </tbody>
</table>
    
    
    

</main>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
    
    
    <script>
    
        $('table th').click(function(e) {
        e.preventDefault();
        $('th').removeClass('active');
        $(this).addClass('active');
    });
    </script>

