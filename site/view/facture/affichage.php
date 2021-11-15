<?php

    $pdf = new FPDF();
    $pdf->AddPage();

    // Logo
    $pdf->Image(File::build_path(array("css","template","img","logo.jpg")),10,6,30);
    // Police Arial gras 15
    $pdf->SetFont('Arial','B',15);
    // Décalage à droite
    $pdf->Cell(80);
    // Titre
    $date=date_format(new DateTime($date),'F-Y');
    $pdf->Cell(80,10,"Facture du $date",1,0,'C');
    // Saut de ligne
    $pdf->Ln(20);
    $pdf->SetFont('Arial','',12);

    // Largeurs des colonnes
    $w = array(80, 80);
    // En-tête
    $header=array("produit","quantite");
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Données
    foreach ($pag as $cle => $valeur) {
        $produit=ModelProduit::select($valeur->get("idProduit"));

        $pdf->Cell($w[0],6,$produit->get("idProduit")."-".$produit->get("nomProduit"),'L');
        $pdf->Cell($w[1],6,number_format($valeur->get("quantite"),0,',',' '),'R',0,'R');
        $pdf->Ln();
    
    }

    // Trait de terminaison
    $pdf->Cell(array_sum($w),0,'','T');
    $pdf->Ln();
    $pdf->Cell($w[0],6,"Total ",'L');
    $pdf->Cell($w[1],6,"$total euros",'R',0,'R');
    $pdf->Ln();
    // Trait de terminaison
    $pdf->Cell(array_sum($w),0,'','T');

    $pdf->Output();
?>
