<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Capa.xls");

?>

<table>
    <tr>
        <td>No</td>
        <td>TEMUAN / PENYIMPANGAN
            (Non-compliance)</td>
        <td>KT</td>
        <td>KONDISI SAAT INI</td>
        <td>GAP</td>
        <td>Rootcause Analysis</td>
        <td>Corrective Action (CA)</td>
        <td>Deadtime</td>
        <td>PIC</td>
        <td>Status</td>
        <td>Preventive Action (PA)</td>
        <td>Deadtime</td>
        <td>PIC</td>
        <td>Status</td>
        <td>No Dok Hasil Perbaikan</td>
    </tr>
    <?= $i = 1; ?>
    <?php foreach ($capa as $c) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $c['temuan']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>