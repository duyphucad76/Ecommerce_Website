
<div class="thongke">
    <div style=" width:50%;  float: left;" id="chart_div">Thong ke</div>
    <div style=" width:50%;  float: right" id="chart_div1"></div>
</div>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    
    google.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        //thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
        //Tao ra bang
        var data = new google.visualization.DataTable();
        var proNameArr = new Array();
        var qtySoldArr = new Array();
        var dataName = 0;
        var dataQty = 0;
        var rows = new Array();
        //+dong
        <?php
        $sta = new statistics();
        $result = $sta->getStatistics();
        while ($set = $result->fetch()) {
            $name = $set['name'];
            $quantity = $set['qty'];
            echo "proNameArr.push('$name');";
            echo "qtySoldArr.push('$quantity');";
        }
        ?>
        //tao ra dong
        for (var i = 0; i < proNameArr.length; i++) {
            dataName = proNameArr[i];
            dataQty = parseInt(qtySoldArr[i]);
            rows.push([dataName, dataQty]);
        }
        //+cot
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Quantity');
        data.addRows(rows);
        //option
        var options = {
            title: 'Sales statistics for the last quarter',
            'width': 600,
            'height': 400,
            'backgroundColor': '#ffffff',
            is3D: true
        };
        //tien hanh ve khi co datatable va option
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'))
        chart.draw(data, options)
        var chart = new google.visualization.BarChart(document.getElementById('chart_div1'))
        chart.draw(data, options)
    }
</script>