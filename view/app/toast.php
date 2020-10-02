<?php 
if(isset($_SESSION['msg'])) {
        session_destroy();

        if (isset($_SESSION['status'])) {
          if($_SESSION['status'] == 'bg-success'){
            $text ='<i class="fas fa-check-circle"></i><span class="mr-3"> Cadastrado com sucesso </span>';
          }else {
            $text ='<i class="fas fa-exclamation-triangle"></i><span class="mr-3"> Erro ao cadastrar </span>';
          }
        }
        echo'
          <div class="toast" data-delay="31500" style="position: absolute; top: 80px; right: 26px;">
            <div class="toast-header '.$_SESSION['status'].'">
              <span class="mr-auto text-light">'.$text.'</span>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true" class="text-light">&times;</span>
              </button>
            </div>
            <div class="toast-body">
             '.$_SESSION['msg'].'
            </div>
          </div>';
      }
?>