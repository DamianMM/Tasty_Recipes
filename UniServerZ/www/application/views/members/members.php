<div id="Sign-In">
        <fieldset style="width:30%"><legend>LOG-IN HERE</legend>
                <?php echo validation_errors(); ?>
                <?php echo form_open('index.php/Members/get_members');?>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"/>
                <br/>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"/>
                <br/>
                <input type="submit" value="Login"/>
                <?php echo form_close();?>
        </fieldset>
</div>