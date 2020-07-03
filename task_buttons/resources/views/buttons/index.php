<?php
include(app_path().'/../resources/views/includes/header.php');
?>

        <input type="hidden" id="title" name="pageName" value="buttons" />

        <div>&nbsp;</div>
        <h2>Buttons</h2>
        <div>&nbsp;</div>

        <table class="table mc-table-striped">
            <col width="10%">
            <col width="20%">
            <col width="20%">
            <col width="40%">
            <col width="10%">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Button</th>
                    <th scope="col">Title</th>
                    <th scope="col">Link</th>
                    <th scope="col" colspan="2">Action Buttons</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $row = 0;
                    foreach($buttons as $key => $button){
                        $row++;
                        $title = $button['title'];
                        $url = $button['link'];
                        $navigation = 'window.open(\''.$url.'\',\'_self\',\'resizable=yes\')';
                        $color = $button['color'];

                    echo'
                        <tr>
                            <td>'.$row.'</td>
                            <td>
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
                            <td>'.$title.'</td>
                            <td>'.$url.'</td>
                            <td>
                                <form name="form-btn-'.$button['id'].'" method="post" action="'.action('ButtonsController@edit', $button['id']).'" >
                                    <input name="_token" type="hidden" value="'.csrf_token().'">
                                    <input name="_method" type="hidden" value="get">
                                    <input name="btn_id" type="hidden" value="'.$button['id'].'">

                                    <input type="submit" class="btn btn-primary mc-btn-size" value="Modify">
                                </form>
                            </td>
                            <td>
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