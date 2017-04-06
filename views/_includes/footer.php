<?php if ( ! defined('ABSPATH')) exit; ?>

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                © 2017 iGrana - Todos os direitos reservados.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">Sobre</a>
                                    </li>
                                    <li>
                                        <a href="#">Ajuda</a>
                                    </li>
                                    <li>
                                        <a href="#">Suporte</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
        </div>

        <!-- jQuery  -->
        <script src="<?php echo HOME_URI; ?>/views/assets/js/detect.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/fastclick.js"></script>

        <script src="<?php echo HOME_URI; ?>/views/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/waves.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/wow.min.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/counterup/jquery.counterup.min.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/plugins/datatables/responsive.bootstrap.min.js"></script>

        <script src="<?php echo HOME_URI; ?>/views/assets/js/jquery.core.js"></script>
        <script src="<?php echo HOME_URI; ?>/views/assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable-responsive').DataTable();
            });
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

    </body>
</html>