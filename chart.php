<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(fetchData);

      <?php
        include 'search_chart.php'
      ?>

      function fetchData() {
        fetch('search_chart.php')  // Substitua pelo caminho do seu backend
          .then(console.log('tesets'))
    
          .catch(alert('Erro ao carregar dados:'));
      }

      function drawSeriesChart(dbData) {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'ID');
        data.addColumn('number', 'Life Expectancy');
        data.addColumn('number', 'Fertility Rate');
        data.addColumn('string', 'Region');
        data.addColumn('number', 'Population');

        dbData.forEach(row => {
          data.addRow([row.nome_fornecedor]);
        });

        var options = {
          title: 'Fertility rate vs life expectancy in selected countries',
          hAxis: { title: 'Life Expectancy' },
          vAxis: { title: 'Fertility Rate' },
          bubble: { textStyle: { fontSize: 11 } }
        };

        var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="series_chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
