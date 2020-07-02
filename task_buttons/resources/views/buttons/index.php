<?php
include(app_path().'/../resources/views/includes/header.php');
?>

    <input type="hidden" id="title" name="pageName" value="buttons" />

    <div class="container">
        <div>&nbsp;</div>
        <h2>Buttons</h2>
        <div>&nbsp;</div>
        <table class="table">

            <tbody>
            <tr >

        <?php

            foreach($buttons as $key => $button){
                $title = $button['title'];
                $url = $button['link'];
                $navigation = 'window.open(\''.$url.'\',\'_self\',\'resizable=yes\')';
                $color = $button['color'];

            echo'
                <tr class="row">
                    <td class="col-md-2 " >
                        <!--form-->
                        <form name="form-btn-'.$button['id'].'" method="post" action="'.action('ButtonsController@create').'" >
                            <input name="_token" type="hidden" value="'.csrf_token().'">
                            <input name="_method" type="hidden" value="get">
                            <input name="btn_id" type="hidden" value="'.$button['id'].'">
                        </form>
                        <!--button-->
                        <button
                            name="btn_'.$button['id'].'"
                            title="'.$title.'"
                            onclick="'.$navigation.'"
                            style="background-color: '.$color.'"
                            class="btn pmd-btn-fab pmd-ripple-effect btn-light pmd-btn-raised mc-add-button-style "
                            type="button">
                            <i class="material-icons pmd-sm">add</i>
                        </button>

                     </td>

                      <td class="col-md-2 " >'.$title.'</td>

                      <td class="col-md-4 " >'.$url.'</td>

                     <td class="col-md-2 " >
                     <form name="form-btn-'.$button['id'].'" method="post" action="'.action('ButtonsController@edit', $button['id']).'" >
                        <input name="_token" type="hidden" value="'.csrf_token().'">
                        <input name="_method" type="hidden" value="get">
                        <input name="btn_id" type="hidden" value="'.$button['id'].'">
                        <input type="submit" class="btn btn-primary mc-btn-size" value="Modify">
                    </form>

                     </td>

                     <td class="col-md-2 " >
                     <form method="post" action="'.action('ButtonsController@destroy',$button['id']).'" >
                        <input name="_token" type="hidden" value="'.csrf_token().'">
                        <input name="_method" type="hidden" value="delete">
                        <input name="btn_delete" type="submit" class="btn btn-danger mc-btn-size" value="Remove">
                     </form>

                     </td>

                </tr>';
            }

        ?>

            </tbody>
        </table>
    </div>

<?php
include(app_path().'/../resources/views/includes/footer.php');
?>