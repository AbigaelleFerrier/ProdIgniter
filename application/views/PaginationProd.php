<?php
$a   = $i;
$srt = true;

echo '<div class="container">';
  echo '<div class="row>">';
    echo '<div class="col s12">';
// ------------------------ //
          echo '<ul class="pagination right-align">';
            while ($a <= $i+5 && $srt) {
                switch ($where) {
                  case '0':
                    $produits = Produits::where('activerP', 0)->skip(($a*$nbVoulu)-$nbVoulu)->take($nbVoulu)->get();
                    break;

                  case '1':
                    $produits = Produits::where('activerP', 1)->skip(($a*$nbVoulu)-$nbVoulu)->take($nbVoulu)->get();
                    break;

                  case '2':
                    $produits = Produits::where([['activerP', 1],['idTypeProd', $type]])->skip(($a*$nbVoulu)-$nbVoulu)->take($nbVoulu)->get();
                    break;

                  case '3':
                    $produits = Categoriesous::find($categ)->Produits()->skip(($a*$nbVoulu)-$nbVoulu)->take($nbVoulu)->get();
                    break;

                  default:
                    $produits = Produits::where($where)->skip(($a*$nbVoulu)-$nbVoulu)->take($nbVoulu)->get();
                    break;
                }


                if (count($produits) < 1) {
                    $srt = false;
                    echo '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
                }
                else {
                    if ($i == $a) {
                        if ($a == 1) {
                          echo '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
                        }
                        else {
                          echo '<li class="disabled">    <a href="'. base_url($to .'/'. ($a - 1)) .'"><i class="material-icons">chevron_left</i></a></li>';
                          echo '<li class="waves-effect"><a href="'. base_url($to .'/'. ($a - 1)) .'">'. ($a - 1) .'</a></li>';
                        }
                        echo '<li class="active"><a href="#!">'. $a .'</a></li>';
                    }
                    else {
                        echo '<li class="waves-effect"><a href="'. base_url($to .'/'. $a) .'">'. $a .'</a></li>';
                    }
                    $a++;
                }
            }
            if ($srt) {
              echo '<li class="waves-effect"><a href="'. base_url($to .'/'. $a+1) .'"><i class="material-icons">chevron_right</i></a></li>';
            }
          echo "</ul>";
// ------------------------ //
    echo "</div>";
  echo "</div>";
echo "</div>";


?>
