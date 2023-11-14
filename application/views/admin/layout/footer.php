        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>


    <!-- Mainly scripts -->
    <script src="<?= base_url()?>asset/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url()?>asset/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Flot -->
    <script src="<?= base_url()?>asset/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?= base_url()?>asset/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url()?>asset/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url()?>asset/js/inspinia.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url()?>asset/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?= base_url()?>asset/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?= base_url()?>asset/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?= base_url()?>asset/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?= base_url()?>asset/js/plugins/chart/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?= base_url()?>asset/js/plugins/toastr/toastr.min.js"></script>

    <script src="<?= base_url()?>asset/js/plugins/dataTables/datatables.min.js"></script>


    <!-- Jasny -->
    <script src="<?= base_url()?>asset/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- DROPZONE -->
    <script src="<?= base_url()?>asset/js/plugins/dropzone/dropzone.js"></script>

    <!-- CodeMirror -->
    <script src="<?= base_url()?>asset/js/plugins/codemirror/codemirror.js"></script>
    <script src="<?= base_url()?>asset/js/plugins/codemirror/mode/xml/xml.js"></script>



    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>


    <script>
        $(document).ready(function() {
            // setTimeout(function() {
            //     toastr.options = {
            //         closeButton: true,
            //         progressBar: true,
            //         showMethod: 'slideDown',
            //         timeOut: 4000
            //     };
            //     toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            // }, 1300);


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
</body>
</html>
