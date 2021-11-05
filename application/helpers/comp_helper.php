<?php
if (!function_exists('compStatus')) {
    function compStatus($val, $alasan = "Tidak Ada Alasan")
    {
        if ($val == "Aktif") {
            return '<input type="button" class=" badge-success rounded " value="Aktif" data-content=""/>';
        } else return '<input type="button" style="cursor:pointer;" class="badge-danger rounded  text-light popStatus" data-content="' . $alasan . '" value="Tidak Aktif"/>';
    }
}
