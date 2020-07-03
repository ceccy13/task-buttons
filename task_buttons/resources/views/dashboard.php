<?php
include(app_path().'/../resources/views/includes/header.php');
?>

        <input type="hidden" id="title" name="pageName" value="dashboard" />

        <div>&nbsp;</div>
        <h2>Buttons Dashboard</h2>
        <div>&nbsp;</div>
        <table class="table">

            <tbody>
            <tr >
            <?php
            $cell = 0;
            while($cell < 9){
                $cell++;
                $title ='custimize button';
                $color = null;
                $navigation = '$(this).closest(\'td\').find(\'form\').submit()';

                foreach($buttons as $key => $button){
                    if($cell == $button['id']){
                        $title = $button['title'];
                        $url = $button['link'];
                        $navigation = 'window.open(\''.$url.'\',\'_self\',\'resizable=yes\')';
                        $color = $button['color'];
                    }
                }

                echo'
                    <td class="col-md-3 mc-td-responsive-style" >
                    <!--form-->
                    <form name="form-btn-'.$cell.'" method="post" action="'.action('ButtonsController@create').'" >
                        <input name="_token" type="hidden" value="'.csrf_token().'">
                        <input name="_method" type="hidden" value="get">
                        <input name="btn_id" type="hidden" value="'.$cell.'">
                    </form>
                    <!--button-->
                    <button
                    name="btn_'.$cell.'"
                    title="'.$title.'"
                    onclick="'.$navigation.'"
                    style="background-color: '.$color.'"
                    class="btn pmd-btn-fab pmd-ripple-effect btn-light pmd-btn-raised mc-add-button-style "
                    type="button">
                    <i class="material-icons pmd-sm">add</i>
                    </button>

                    </td>';

            }
            ?>
            </tr>
            </tbody>
        </table>
    </div>

<?php
include(app_path().'/../resources/views/includes/footer.php');
?>