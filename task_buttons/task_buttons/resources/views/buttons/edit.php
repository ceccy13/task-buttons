<?php
include(app_path().'/../resources/views/includes/header.php');
?>

    <input type="hidden" id="title" name="pageName" value="edit_button" />

    <div class="container">
        <div>&nbsp;</div>
        <h2>Edit Button</h2>
        <div>&nbsp;</div>
        <table class="table">

            <tbody>
            <tr >
                <td>
                    <!--form-->
                    <form id="form-btn" method="post" action="<?= action('ButtonsController@update', $button[0]['id']); ?>" >
                        <input name="_token" type="hidden" value="<?= csrf_token(); ?>">
                        <input name="_method" type="hidden" value="put">

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="titles">Title</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control mc-input-size" name="title" type="text" value="<?= old('title', $button[0]['title']); ?>">
                                <div class="invalid-feedback">
                                    <?= $errors->first('title'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="links">Link</label>
                            </div>
                            <div class="form-group col-md-4">
                                <input class="form-control mc-input-size" name="link" type="text" value="<?= old('link', $button[0]['link']); ?>">
                                <div class="invalid-feedback">
                                    <?= $errors->first('link'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="colors">Colors List</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select id="select-color" name="color_id" class="form-control mc mc-select-size" >
                                    <option value="">Choose</option>
                                    <?php
                                    foreach($colors as $key => $value){
                                        $selected = '';
                                        if(old('color_id', $button[0]['color_id']) == $value['id']) $selected = 'selected';
                                        echo '<option value="'.$value['id'].'" color="'.$value['color'].'" style="color:'.$value['color'].'" '.$selected.'>'.$value['name'].'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $errors->first('color_id'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="submit" class="btn btn-primary mc-btn-size" value="Set">
                            </div>
                        </div>

                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

<?php
include(app_path().'/../resources/views/includes/footer.php');
?>