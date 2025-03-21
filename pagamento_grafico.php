<?php
include 'conexao.php';
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tipo de Pagamento', 'Total'],
          <?php
            // Monta a query para buscar pagamentos e suas relações com fornecedores e tipos de pagamento
            $sql2 = "SELECT tipo_pagamentos.descricao_tipo, SUM(valor) AS total 
                     FROM pagamentos 
                     INNER JOIN tipo_pagamentos ON pagamentos.id_tipo_pagto = tipo_pagamentos.id_tipo_pagto 
                     GROUP BY tipo_pagamentos.id_tipo_pagto";
            
            // Prepara a consulta para evitar SQL Injection
            $stmt = $pdo->prepare($sql2);
            
            // Executa a consulta
            $stmt->execute();      
            
            // Gera os dados do gráfico dinamicamente
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo "['" . htmlspecialchars($row["descricao_tipo"]) . "', " . $row["total"] . "],";
            }
          ?>
        ]);

        var options = {
          title: 'Gráfico de Pagamentos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div class="" id="piechart_3d" style="width: 550px; height: 250px;"></div>
  </body>
</html>
