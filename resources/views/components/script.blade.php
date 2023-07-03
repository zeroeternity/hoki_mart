<!-- jQuery -->
<script src="{{asset ('template/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset ('template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset ('template/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset ('template/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset ('template/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset ('template/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset ('template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset ('template/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset ('template/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset ('template/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset ('template/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset ('template/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset ('template/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset ('template/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset ('template/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset ('template/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset ('template/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset ('template/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset ('template/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset ('template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset ('template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset ('template/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset ('template/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset ('template/build/js/custom.min.js')}}"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<!-- Datatables -->
<script src="{{asset ('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset ('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset ('template/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset ('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset ('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

{{-- Purchase Appendchild JS --}}
<script>
    // Appandchild Purchase
    var i = 1;
    function addItemPurchase() {
        var itemlist = document.getElementById("itemListPurchase");
        // make element
        var row = document.createElement("tr");
        var code = document.createElement("td");
        var name = document.createElement("td");
        var unit = document.createElement("td");
        var ppn = document.createElement("td");
        var qty = document.createElement("td");
        var total = document.createElement("td");
        var purchase_price = document.createElement("td");
        var action = document.createElement("td");
        // make append element
        itemlist.appendChild(row);
        row.appendChild(code);
        row.appendChild(name);
        row.appendChild(unit);
        row.appendChild(ppn);
        row.appendChild(qty);
        row.appendChild(total);
        row.appendChild(purchase_price);
        row.appendChild(action);
        // make element input code
        var input_code = document.createElement("input");
        input_code.setAttribute("name", "items[" + i + "][code]");
        input_code.setAttribute("class", "form-control");
        // make element input name
        var input_name = document.createElement("input");
        input_name.setAttribute("name", "items[" + i + "][name]");
        input_name.setAttribute("class", "form-control");
        // make element input unit
        var input_unit = document.createElement("input");
        input_unit.setAttribute("name", "items[" + i + "][unit]");
        input_unit.setAttribute("class", "form-control");
        // make element input ppn
        var input_ppn = document.createElement("input");
        input_ppn.setAttribute("name", "items[" + i + "][ppn]");
        input_ppn.setAttribute("class", "form-control");
        // make element input qty
        var input_qty = document.createElement("input");
        input_qty.setAttribute("type", "number");
        input_qty.setAttribute("name", "items[" + i + "][qty]");
        input_qty.setAttribute("class", "form-control");
        // make element input total
        var input_total = document.createElement("input");
        input_total.setAttribute("type", "number");
        input_total.setAttribute("name", "items[" + i + "][total]");
        input_total.setAttribute("class", "form-control");
        // make element input number
        var input_purchase_price = document.createElement("input");
        input_purchase_price.setAttribute("type", "number");
        input_purchase_price.setAttribute("name", "items[" + i + "][purchase_price]");
        input_purchase_price.setAttribute("class", "form-control");
        // make element hapus
        var hapus = document.createElement("a");
        // function appendchild
        code.appendChild(input_code);
        name.appendChild(input_name);
        unit.appendChild(input_unit);
        ppn.appendChild(input_ppn);
        qty.appendChild(input_qty);
        total.appendChild(input_total);
        purchase_price.appendChild(input_purchase_price);
        action.appendChild(hapus);
        //hapus inner html 
        hapus.innerHTML =
        '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
        // Action hapus
        hapus.onclick = function () {
            row.parentNode.removeChild(row);
        };
        i++;
    }
</script>